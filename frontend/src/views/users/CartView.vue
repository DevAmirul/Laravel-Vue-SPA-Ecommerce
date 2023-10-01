<script setup>
import { ref, watch, watchEffect } from 'vue'
import PageHeader from '../../components/layouts/PageHeader.vue'
import useRefresh from '../../stores/Refresh';
import useCart from '../../services/cart';
import { storeToRefs } from "pinia";
import useAuth from "../../stores/Auth";
import useAlert from "../../services/alert";
import { useRouter } from 'vue-router';

const router = useRouter();
const { isAuthenticated } = storeToRefs(useAuth());
const { refreshCartPage } = storeToRefs(useRefresh());
const responseData = ref();
let discount;
let subtotal;

// Fetch user cart's items.
watchEffect(() => {
    if (isAuthenticated.value) {
        useCart().getCartItems().then((response) => {
            if (response.carts.length === 0) {
                useAlert().centerDialogAlert("info", "Your cart list is empty")
                    .then((result) => {
                        router.back();
                    });
            }
            responseData.value = response
        } );
    }
} )

// Re-fetch cart items when user updates or deletes cart items.
watch(refreshCartPage, () => {
    if (isAuthenticated.value) {
        useCart().getCartItems().then((response) => {
            if (response.carts.length === 0) {
                useAlert().centerDialogAlert("info", "Your cart list is empty")
                    .then((result) => {
                        router.back();
                    });
            }
            responseData.value = response
        });
    }
} )

// Discounts will be calculated on cart items.
watch(responseData, () => {
    discount = responseData.value.carts.reduce((accumulator, currentValue) => {
        if (currentValue['discount'] !== null && currentValue['status'] !== 0 && currentValue['expire_date'] > new Date().toISOString()) {
            if (currentValue['type'] == 'Percentage') {
                return accumulator + Math.floor(((Number(currentValue['discount']) / 100) * Number(currentValue['sale_price'])) * Number(currentValue['qty']));
            }
            else {
                return accumulator + Math.floor(Number(currentValue['discount'] * currentValue['qty']));
            }
        }
        else return accumulator + 0
    }, 0)
    subtotal = responseData.value.carts.reduce((accumulator, currentValue) => {
        return accumulator + Number(currentValue['sale_price'] * currentValue['qty']);
    }, 0)
})

</script>
<template>
<!-- Page Header Start -->
    <PageHeader pageName="SHOPPING CART" ></PageHeader>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark ">
                        <tr>
                            <th>Image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody v-if="responseData" class="align-middle">
                        <template v-for="(data, key) in responseData.carts" :key="key">
                            <tr>
                                <td class="align-middle"><img :src="data.image" alt="image" style="width: 50px;"></td>
                                <td class="align-middle">{{ data.name }}</td>

                                <td class="align-middle">{{ Number(data.sale_price) }}</td>

                                <td v-if="data.discount !== null && data.status !== 0 && data.expire_date > new Date().toISOString()" class="align-middle">
                                    <template v-if="data.type == 'Percentage'">
                                        {{ Number(data.discount) }}%
                                    </template>
                                    <template v-else>
                                        ${{ Number(data.discount) }}
                                    </template>
                                </td>
                                <td v-else>
                                    0
                                </td>

                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button @click="useCart().productQuantityDecrement(data.id, data.p_id, data.qty )" class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>

                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" :value="data.qty">

                                        <div class="input-group-btn">
                                            <button @click="useCart().productQuantityIncrement(data.id, data.p_id, data.qty )" class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle"><button @click="useCart().deleteCartItems(data.item_id)" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6  class="font-weight-medium">${{ discount }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ subtotal }}</h6>
                        </div>


                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{ subtotal - discount }}</h5>
                        </div>

                        <RouterLink
                                    style="text-decoration: none; color: inherit"
                                    :to="{ name: 'checkout' }"
                                    ><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                        </RouterLink>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
</template>
