<script setup>
import { ref, watch, watchEffect } from "vue";
import { useRoute } from "vue-router";
import useAxios from "../../services/axios";
import useAlert from "../../services/alert";
import PageHeader from "../../components/layouts/PageHeader.vue";
import { storeToRefs } from "pinia";
import useAuth from "../../stores/Auth";
import useToken from "../../services/token";
import { useRouter } from 'vue-router';

const router = useRouter();
const { user, isAuthenticated } = storeToRefs(useAuth());

const route = useRoute();
const orderId = route.params.id;

let discount = ref(0);
let responseData = ref();
let confirmed;
let Shipped;
let Delivered;

// Fetch user order's items.
watchEffect(() => {
    if (isAuthenticated.value) {
        useAxios
            .get("/users/orders/" + orderId + "/items", {
                headers: { Authorization: "Bearer " + useToken().getToken() },
            })
            .then((response) => {
                responseData.value = response.data;
                console.log(responseData.value);
                if (responseData.value.orderItems.length == 0)
                    useAlert().centerDialogAlert(
                        "info",
                        "Order item list is empty"
                    );
            })
            .catch((error) => {
                router.push({ name: 'serverError' });
            });
    }

});

watch(responseData, () => {
    if (responseData.value.orderItems[0].order_status == "Approved") {
        confirmed = true;
    } else if (responseData.value.orderItems[0].order_status == "Shipped") {
        confirmed = true;
        Shipped = true;
    } else if (responseData.value.orderItems[0].order_status == "Delivered") {
        confirmed = true;
        Shipped = true;
        Delivered = true;
    }
});

// Pay order's payments.
function payOrder(orderId) {
    useAxios
        .get("/users/orders/" + orderId + "/pay", {
            headers: { Authorization: "Bearer " + useToken().getToken() },
        })
        .then((response) => {
            if (response.data.stripeUrl) {
                window.location.href = response.data.stripeUrl;
            }
        })
        .catch((error) => {
            useAlert().topAlert("error", error.response.data.message);
        });
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="ORDERS ITEMS"></PageHeader>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div class="container">
        <article class="card">
            <template v-if="responseData">
                <div class="card-body">
                    <div class="d-lg-flex justify-content-between">
                        <h6>Order ID: #{{ orderId }}</h6>
                        <h6>
                            Order Status:
                            {{ responseData.orderItems[0].order_status }}
                        </h6>
                        <h6
                            v-if="
                                responseData.orderItems[0].payment_status == '0'
                            "
                        >
                            Payment Status: Unpaid
                        </h6>
                        <h6 v-else>Payment Status: Paid</h6>
                    </div>
                    <article class="card">
                        <div class="card-body row">
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Name:</strong
                                >
                                <br />{{ responseData.orderItems[0].user_name }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Phone:</strong
                                >
                                <br />{{ responseData.orderItems[0].phone }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Email:</strong
                                >
                                <br />{{ responseData.orderItems[0].email }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >City:</strong
                                >
                                <br />{{ responseData.orderItems[0].city }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >State:</strong
                                >
                                <br />{{ responseData.orderItems[0].state }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Address:</strong
                                >
                                <br />{{ responseData.orderItems[0].address }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Zip Code:</strong
                                >
                                <br />{{ responseData.orderItems[0].zip_code }}
                            </div>
                        </div>
                    </article>
                    <!-- <template v-if="responseData.orderItems[0].order_status !== 'Returned'"> -->
                    <div class="track">
                        <div :class="[confirmed ? 'active' : '', 'step']">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Order confirmed</span>
                        </div>
                        <div :class="[Shipped ? 'active' : '', 'step']">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text">Picked by courier</span>
                        </div>
                        <div :class="[Delivered ? 'active' : '', 'step']">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Delivered</span>
                        </div>
                    </div>
                    <!-- </template> -->
                    <hr />

                    <ul class="row">
                        <template
                            v-for="(data, key) in responseData.orderItems"
                            :key="key"
                        >
                            <li class="col-md-4">
                                <figure class="itemside mb-3">
                                    <div class="aside">
                                        <img
                                            :src="data.image"
                                            class="img-sm border"
                                        />
                                    </div>
                                    <figcaption class="info align-self-center">
                                        <p class="title">
                                            {{ data.name }}
                                        </p>
                                        <h6 class="text-muted">
                                            ${{ data.sale_price }}
                                        </h6>
                                        <h6 class="text-muted">
                                            ${{ data.discount_price }}
                                        </h6>
                                    </figcaption>
                                </figure>
                            </li>
                        </template>
                    </ul>

                    <hr />
                    <article class="card">
                        <div class="card-body row">
                            <div
                                v-if="responseData.orderItems[0].c_discount"
                                class="col-lg"
                            >
                                <strong style="color: #1c1c1c !important"
                                    >Coupon:</strong
                                >
                                <br />${{
                                    Math.ceil(
                                        responseData.orderItems[0].c_discount
                                    )
                                }}
                            </div>
                            <div
                                v-if="responseData.orderItems[0].discount_price"
                                class="col-lg"
                            >
                                <strong style="color: #1c1c1c !important"
                                    >Total Discount:</strong
                                >
                                <br />
                                <template
                                    v-if="responseData.orderItems[0].c_discount"
                                >
                                    ${{
                                        (discount =
                                            parseInt(
                                                responseData.orderItems[0]
                                                    .discount_price
                                            ) +
                                            parseInt(
                                                responseData.orderItems[0]
                                                    .c_discount
                                            ))
                                    }}
                                </template>
                                <template v-else
                                    >${{
                                        (discount = Math.ceil(
                                            responseData.orderItems[0]
                                                .discount_price
                                        ))
                                    }}</template
                                >
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Subtotal:</strong
                                >
                                <br />${{
                                    Math.ceil(
                                        responseData.orderItems[0].subtotal
                                    )
                                }}
                            </div>
                            <div class="col-lg">
                                <strong style="color: #1c1c1c !important"
                                    >Total:</strong
                                >
                                <br />${{
                                    responseData.orderItems[0].total - discount
                                }}
                            </div>
                        </div>
                    </article>
                    <div class="d-flex justify-content-between">
                        <button
                            class="btn btn-sm btn-outline-primary mt-3"
                            @click="$router.go(-1)"
                        >
                            Back to Order
                        </button>
                        <button
                            v-if="
                                responseData.orderItems[0].payment_status == '0'
                            "
                            @click="payOrder(orderId)"
                            class="btn btn-sm btn-primary mt-3"
                        >
                            Pay Now
                        </button>
                    </div>
                </div>
            </template>
        </article>
    </div>
    <!-- Cart End -->
</template>
<style scoped>
body {
    background-color: #eeeeee;
    font-family: "Open Sans", serif;
}
.container {
    margin-top: 50px;
    margin-bottom: 50px;
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.1rem;
}
.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
}
.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px;
}
.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative;
}
.track .step.active:before {
    background: #e67e22;
}
.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px;
}
.track .step.active .icon {
    background: #e67e22;
    color: #fff;
}
.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
}
.track .step.active .text {
    font-weight: 400;
    color: #000;
}
.track .text {
    display: block;
    margin-top: 7px;
}
.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}
.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0;
}
.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px;
}
ul.row,
ul.row-sm {
    list-style: none;
    padding: 0;
}
.itemside .info {
    padding-left: 15px;
    padding-right: 7px;
}
.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.btn-warning {
    color: #ffffff;
    background-color: #e67e22;
    border-color: #e67e22;
    border-radius: 1px;
}
.btn-warning:hover {
    color: #ffffff;
    background-color: #e67e22;
    border-color: #e67e22;
    border-radius: 1px;
}
</style>