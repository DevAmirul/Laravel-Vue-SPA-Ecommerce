<script setup>
import { onMounted, ref, watch } from 'vue'
import useAxios from '../../services/axios';
import PageHeader from '../../components/layouts/PageHeader.vue'
import useRefresh from '../../stores/Refresh';
import { storeToRefs } from "pinia";
import useAlert  from "../../services/Sweetalert";

const { refreshCartItemsNumber, refreshCartPage } = storeToRefs(useRefresh());

const responseData = ref();
let discount;
let subtotal;

onMounted(() => {
    useAxios.get('/users/cart/' + 2)
        .then(response => {
            responseData.value = response.data;
            if (responseData.value.carts.length === 0) useAlert().centerDialogAlert('info', 'Your cart list is empty')
        })
        .catch(error => {
            // console.log(error);
        });
} )

watch(refreshCartPage, () => {
    useAxios.get('/users/cart/' + 2)
        .then(response => {
            responseData.value = response.data;
            if (responseData.value.carts.length === 0) useAlert().centerDialogAlert('info', 'Your cart list is empty')
        })
        .catch(error => {
            // console.log(error);
        });
} )

function deleteCartItems(itemid){
    useAxios.delete('/users/cart/' + itemid)
        .then(response => {
            response.data;
            refreshCartPage.value = !refreshCartPage.value
            refreshCartItemsNumber.value = !refreshCartItemsNumber.value
            useAlert().centerMessageAlert('success', 'Successfully deleted cart item')
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}

watch(responseData, () => {
    discount = responseData.value.carts.reduce((accumulator, currentValue) => {
        return accumulator + Number(currentValue['discount']);
    },0 )
    subtotal = responseData.value.carts.reduce((accumulator, currentValue) => {
        return accumulator + Number(currentValue['sale_price']);
    },0 )
} )

function productQuantityIncrement(cartId, productId, qty) {
    useAxios.put('/users/cart/' + cartId + '/' + productId + '/' + ++qty)
        .then(response => {
            console.log(response.data);
            refreshCartPage.value = !refreshCartPage.value
            refreshCartItemsNumber.value = !refreshCartItemsNumber.value
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}

function productQuantityDecrement(cartId, productId, qty) {
    if (qty > 1) {
        useAxios.put('/users/cart/' + cartId + '/' + productId + '/' + --qty)
            .then(response => {
                console.log(response.data);
                refreshCartPage.value = !refreshCartPage.value
                refreshCartItemsNumber.value = !refreshCartItemsNumber.value
            })
            .catch(error => {
                useAlert().topAlert('error', error.response.data.message, 'bottom-end')
            });
    }
}

</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="SHOPPING CART"></PageHeader>
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
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody v-if="responseData" class="align-middle">
                        <template v-for="(data, key) in responseData.carts" :key="key">
                            <tr>
                                <td class="align-middle"><img :src="data.image" alt="image" style="width: 50px;"></td>
                                <td class="align-middle">{{ data.name }}</td>
                                <td v-if="data.discount > 0" class="align-middle"><del>{{ Number(data.sale_price) }}</del> {{ Number(data.sale_price) - Number(data.discount) }}</td>

                                <td v-else class="align-middle">{{ Number(data.sale_price) }}</td>

                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button @click="productQuantityDecrement(data.cart_id, data.p_id, data.qty )" class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>

                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" :value="data.qty">

                                        <div class="input-group-btn">
                                            <button @click="productQuantityIncrement(data.cart_id, data.p_id, data.qty )" class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle"><button @click="deleteCartItems(data.item_id)" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
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
