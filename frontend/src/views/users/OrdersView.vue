<script setup>
import { ref, watchEffect } from "vue";
import { RouterLink, useRouter } from "vue-router";
import useAxios from "../../services/axios";
import PageHeader from "../../components/layouts/PageHeader.vue";
import useAlert from "../../services/alert";
import { storeToRefs } from "pinia";
import useAuth from "../../stores/Auth";
import useToken from "../../services/token";

const router = useRouter();
const { user, isAuthenticated } = storeToRefs(useAuth());

let responseData = ref();

// Fetch user orders.
watchEffect(() => {
    if (isAuthenticated.value) {
        useAxios
            .get("/users/orders/" + user.value.id, {
                headers: { Authorization: "Bearer " + useToken().getToken() },
            })
            .then((response) => {
                responseData.value = response.data;
                if (responseData.value.orders.length == 0){
                    useAlert().centerDialogAlert("info", "Your order list is empty")
                        .then((result) => {
                            router.back();
                        });
                }
            })
            .catch((error) => {
                router.push({name: 'serverError'});
            });
    }
});
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="SHOPPING CART"></PageHeader>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>#Order Id</th>
                            <th>place On</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <template v-if="responseData">
                            <template
                                v-for="(data, key) in responseData.orders"
                                :key="key"
                            >
                                <tr>
                                    <td class="align-middle">#{{ data.id }}</td>
                                    <td class="align-middle">
                                        {{ data.placeOn }}
                                    </td>
                                    <td class="align-middle">
                                        {{ data.quantity }}
                                    </td>
                                    <td class="align-middle">
                                        {{ data.total }}
                                    </td>
                                    <!-- check order status start -->
                                    <td
                                        v-if="data.orderStatus == 'Approved'"
                                        class="align-middle"
                                    >
                                        <span
                                            class="badge badge-pill badge-info rounded"
                                            >Approved</span
                                        >
                                    </td>
                                    <td
                                        v-else-if="
                                            data.orderStatus == 'Delivered'
                                        "
                                        class="align-middle"
                                    >
                                        <span
                                            class="badge badge-pill badge-success rounded"
                                            >Delivered</span
                                        >
                                    </td>
                                    <td
                                        v-else-if="
                                            data.orderStatus == 'Shipped'
                                        "
                                        class="align-middle"
                                    >
                                        <span
                                            class="badge badge-pill badge-primary rounded"
                                            >Shipped</span
                                        >
                                    </td>
                                    <td
                                        v-else-if="
                                            data.orderStatus == 'Pending'
                                        "
                                        class="align-middle"
                                    >
                                        <span
                                            class="badge badge-pill badge-info rounded"
                                            >Pending</span
                                        >
                                    </td>
                                    <td
                                        v-else-if="
                                            data.orderStatus == 'Canceled'
                                        "
                                        class="align-middle"
                                    >
                                        <span
                                            class="badge badge-pill badge-danger rounded"
                                            >Canceled</span
                                        >
                                    </td>
                                    <td v-else class="align-middle">
                                        <span
                                            class="badge badge-pill badge-dark rounded"
                                            >Returned</span
                                        >
                                    </td>
                                    <!-- check order status end -->
                                    <!-- check payment status start -->
                                    <td
                                        v-if="data.paymentStatus == 0"
                                        class="align-middle"
                                    >
                                        <span
                                            class="badge badge-pill badge-danger rounded"
                                            >Unpaid</span
                                        >
                                    </td>
                                    <td v-else class="align-middle">
                                        <span
                                            class="badge badge-pill badge-success rounded"
                                            >Paid</span
                                        >
                                    </td>
                                    <!-- check payment status end -->
                                    <td class="align-middle">
                                        <RouterLink
                                            :to="{
                                                name: 'orderItems',
                                                params: { id: data.id },
                                            }"
                                            style="
                                                text-decoration: none;
                                                color: inherit;
                                            "
                                        >
                                            <button
                                                class="btn btn-sm btn-primary"
                                            >
                                                Details
                                            </button>
                                        </RouterLink>
                                    </td>
                                </tr>
                            </template>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
</template>
