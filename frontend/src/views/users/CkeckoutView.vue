<script setup>
import { onMounted, reactive,ref, watch, watchEffect } from 'vue'
import useAxios from '../../services/axios';
import useAlert from "../../services/alert";
import PageHeader from '../../components/layouts/PageHeader.vue'
import { storeToRefs } from "pinia";
import useAuth from '../../stores/Auth';
import useToken from "../../services/token";
import { useRouter } from 'vue-router';

const router = useRouter();
const { user, isAuthenticated } = storeToRefs(useAuth());

const paymentMethod = ref();
const shippingMethodCost = ref(null);
const shippingMethod = ref();
const couponCode = ref();
const responseCoupon = ref();
const responseData = ref();
const errorData = ref();
const formData = reactive({
    phone: '',
    address: '',
    address_2: '',
    city: '',
    state: '',
    zip_code: '',
});
let discount;
let subtotal;
let total;

// Fetch user cart's items and user billing details.
watchEffect(() => {
    if (isAuthenticated.value) {
        useAxios.get('/users/checkout/' + user.value.id, {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                responseData.value = response.data;

                if (responseData.value.carts.length === 0) router.push({name: 'shop'});

                if (responseData.value.billingDetails !== null) {
                    formData.phone = responseData.value.billingDetails.phone
                    formData.address = responseData.value.billingDetails.address
                    formData.address_2 = responseData.value.billingDetails.address_2
                    formData.city = responseData.value.billingDetails.city
                    formData.state = responseData.value.billingDetails.state
                    formData.zip_code = responseData.value.billingDetails.zip_code
                }
            })
            .catch((error) => {
                router.push({ name: 'serverError' });
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

// Store user orders.
function placeOrder() {
    useAxios.post('/users/checkout/' + user.value.id, {
            "city": formData.city,
            "phone": formData.phone,
            "address": formData.address,
            "address_2": formData.address_2,
            "state": formData.state,
            "zip_code": formData.zip_code,
            "discount": discount,
            "subtotal": subtotal,
            "total": total,
            "shipping_method_id": shippingMethod.value,
            "shipping": shippingMethodCost.value,
            "payment": paymentMethod.value,
            "coupon": (responseCoupon.value) ? ((responseCoupon.value.coupon) ? responseCoupon.value.coupon.discount : null) : null,
            "coupon_id": (responseCoupon.value) ? ((responseCoupon.value.coupon) ? responseCoupon.value.coupon.id : null) : null,
    }, {
        headers: { Authorization: 'Bearer ' + useToken().getToken() }
    })
        .then(response => {
            errorData.value = null

            if (response.data.stripeUrl) {
                window.location.href = response.data.stripeUrl;
            }else{
                router.push({name: 'orderSuccess' })
            }
        })
        .catch(error => {
            console.log(error.response);
            errorData.value = error.response.data.errors
        });
}

// Fetch valid coupon.
function getCoupon(code) {
    if (code) {
        useAxios.get('/users/cart/coupon/' + code, {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                responseCoupon.value = response.data;
                if (responseCoupon.value.coupon == null) useAlert().centerDialogAlert('info', 'Code not valid')
            })
    }
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="CHECKOUT"></PageHeader>
    <!-- Page Header End -->
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Phone No</label>
                            <input class="form-control" v-model="formData.phone" type="text" placeholder="+123 456 789">
                            <template v-if="errorData">
                            <template v-if="errorData['phone']">
                                <small v-if="errorData['phone'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['phone'][0] }}</small>
                            </template>
                            </template>
                        </div>
                        <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" v-model="formData.city" type="text" placeholder="New York">
                                <template v-if="errorData">
                                    <template v-if="errorData['city']">
                                        <small v-if="errorData['city'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['city'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" v-model="formData.state" type="text" placeholder="New York">
                                <template v-if="errorData">
                                    <template v-if="errorData['state']">
                                        <small v-if="errorData['state'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['state'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" v-model="formData.zip_code" type="text" placeholder="123">
                                <template v-if="errorData">
                                    <template v-if="errorData['zip_code']">
                                        <small v-if="errorData['zip_code'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['zip_code'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" v-model="formData.address" type="text" placeholder="123 Street">
                            <template v-if="errorData">
                                <template v-if="errorData['address']">
                                    <small v-if="errorData['address'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['address'][0] }}</small>
                                </template>
                            </template>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" v-model="formData.address_2" type="text" placeholder="123 Street">
                            <template v-if="errorData">
                                <template v-if="errorData['address_2']">
                                    <small v-if="errorData['address_2'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['address_2'][0] }}</small>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>

            </div>
            <div v-if="responseData" class="col-lg-4">
                <form @submit.prevent="getCoupon(couponCode)" class="mb-5" action="">
                    <div class="input-group">
                        <input v-model="couponCode" type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <template v-for="(data, key) in responseData.carts" :key="key">
                            <div class="d-flex justify-content-between">
                                <p>{{ data.name }}</p>
                                <p>{{ data.qty }}</p>
                                <p >${{ data.sale_price }}</p>
                            </div>
                        </template>

                        <hr class="mt-0">
                        <div v-if="responseCoupon" class="d-flex justify-content-between mb-3 pt-1">
                            <template v-if="responseCoupon.coupon !== null ">
                                <h6 class="font-weight-medium">Coupon</h6>
                                <h6 class="font-weight-medium">${{ responseCoupon.coupon.discount }}</h6>
                            </template>
                        </div>
                        <div v-if="discount > 0 " class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6  class="font-weight-medium">${{ discount }}</h6>
                        </div>
                        <div v-if="shippingMethodCost !== null" class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6  class="font-weight-medium">${{ shippingMethodCost }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ subtotal.toFixed(2) }}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                            <div v-if="shippingMethodCost !== null" class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <template v-if="responseCoupon">
                                    <h5 v-if="responseCoupon.coupon !== null" class="font-weight-bold">${{ total = (Number(subtotal) - (Number(responseCoupon.coupon.discount) + Number(discount)  + Number(shippingMethodCost))).toFixed(2) }}</h5>
                                    <h5 v-else class="font-weight-bold">${{total = (Number(subtotal) - (Number(discount)  + Number(shippingMethodCost))).toFixed(2) }}
                                    </h5>
                                </template>
                                <template v-else>
                                    <h5 class="font-weight-bold">${{total = (Number(subtotal) - (Number(discount) + Number(shippingMethodCost))).toFixed(2) }}
                                    </h5>
                                </template>
                            </div>
                            <div v-else class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <template v-if="responseCoupon">
                                    <h5 v-if="responseCoupon.coupon !== null" class="font-weight-bold">${{ total = (Number(subtotal) - (Number(responseCoupon.coupon.discount) + Number(discount))).toFixed(2) }}</h5>
                                    <h5 v-else class="font-weight-bold">${{ total = (Number(subtotal) - Number(discount)).toFixed(2) }}
                                    </h5>
                                </template>
                                <template v-else>
                                    <h5  class="font-weight-bold">${{ total = (Number(subtotal) - Number(discount)).toFixed(2) }}
                                    </h5>
                                </template>
                            </div>
                    </div>
                </div>

                <div class="card border-secondary mb-5">
                    <div  class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Shipping method</h4>
                    </div>
                    <div  class="card-body">
                        <template v-for="(data, key) in responseData.shippingMethods" :key="key">
                            <div class="form-group">
                                <div class="custom-control custom-radio d-flex justify-content-between">
                                    <input type="radio" class="custom-control-input" :id="key" :value="data.cost" v-model="shippingMethodCost" @click="shippingMethod = data.id"
                                    >
                                    <label class="custom-control-label" :for="key">{{ data.name }}</label>
                                    <h6>${{ data.cost }}</h6>
                                </div>
                            </div>
                        </template>
                        <template v-if="errorData">
                            <template v-if="errorData['shipping']">
                                <small v-if="errorData['shipping'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['shipping'][0] }}</small>
                            </template>
                        </template>
                    </div>
                </div>
                <div  class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <template v-for="(data, key) in responseData.paymentMethods" :key="key">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" :value="data.type" :id="data.type" v-model="paymentMethod">
                                    <label class="custom-control-label" :for="data.type">{{ data.type }}</label>
                                </div>
                            </div>
                        </template>
                        <template v-if="errorData">
                            <template v-if="errorData['payment']">
                                <small v-if="errorData['payment'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['payment'][0] }}</small>
                            </template>
                        </template>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button @click="placeOrder()" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

</template>
