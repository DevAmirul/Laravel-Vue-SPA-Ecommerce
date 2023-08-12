<script setup>
import { reactive,ref,toRaw,watch } from 'vue'
import axios_C from '../../services/axios';
import PageHeader from '../../components/layouts/PageHeader.vue'


let shippingMethod = ref();
let discount;
let subtotal;
let total;
let couponCode;
let coupon = ref(0);

let formData = reactive({
    phone: '',
    address: '',
    address_2: '',
    city: '',
    state: '',
    zipCode: '',
    discount: discount,
    subtotal: subtotal,
    total: total,
    shippingMethod: shippingMethod,
    coupon: coupon,
});


let responseData = ref();

axios_C.get('/users/checkout/' + 2)
    .then(response => {
        responseData.value = response.data;
    })
    .catch(error => {
        console.log(error);
    });


watch(responseData, () => {
discount = responseData.value.carts.reduce((accumulator, currentValue) => {
    return accumulator + Number(currentValue['discount']);
}, 0)
subtotal = responseData.value.carts.reduce((accumulator, currentValue) => {
    return accumulator + Number(currentValue['sale_price']);
}, 0)


})

function save() {
    axios_C.post('/users/checkout/', {
        data: {
            "billingDetails": {
                "city": formData.city,
                "phone": formData.phone,
                "address": formData.address,
                "address_2": formData.address_2,
                "state": formData.state,
                "zip_code": formData.zipCode,
            },
            "order": {
                "user_id":2,
                "discount": discount,
                "subtotal": subtotal,
                "total": total,
                "shipping_method_id": shippingMethod.value,
                "coupon_id": coupon.value.coupon[0].id
            }
        }
    })
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        });
}




function getCoupon(code) {
    if (code) {
        axios_C.get('/users/cart/coupon/' + code)
            .then(response => {
                coupon.value = response.data;
                console.log(coupon.value);
            })
            .catch(error => {
                console.log(error);
            });
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
                        </div>
                        <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" v-model="formData.city" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" v-model="formData.state" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" v-model="formData.zipCode" type="text" placeholder="123">
                            </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" v-model="formData.address" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" v-model="formData.address_2" type="text" placeholder="123 Street">
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div> -->
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
                                <p v-if="data.discount > 0"><del class="mx-2">${{ data.sale_price }}</del>${{ Number(data.sale_price) - Number(data.discount) }}</p>
                                <p v-else>${{ Number(data.sale_price) }}</p>
                            </div>
                        </template>

                        <hr class="mt-0">
                        <div v-if="coupon" class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Coupon</h6>
                            <h6 v-if="coupon.coupon.length == 1" class="font-weight-medium">${{ Number(coupon.coupon[0].discount) }}</h6>
                            <h6 v-else class="font-weight-medium">$0</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6  class="font-weight-medium">${{ discount }}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ subtotal }}</h6>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 v-if="coupon" class="font-weight-bold">${{ total = Number(subtotal) - (Number(coupon.coupon[0].discount) + Number(discount)) }}</h5>
                                <h5 v-else class="font-weight-bold">${{ total = Number(subtotal) - Number(discount) }}</h5>
                            </div>
                    </div>
                </div>

                <div v-if="responseData" class="card border-secondary mb-5">
                    <div  class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Shipping method</h4>
                    </div>
                    <div  class="card-body">
                        <template v-for="(data, key) in responseData.methods" :key="key">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" :id="key" :value="key" v-model="shippingMethod"
                                    >
                                    <label class="custom-control-label" :for="key">{{ data.name }}</label>
                                </div>
                            </div>
                        </template>

                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button @click="save()" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

</template>
