<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import axios_C from '../services/axios';
import { Carousel, Navigation, Slide } from "vue3-carousel";
import PageHeader from "../components/layouts/PageHeader.vue";

import pro1 from '../../src/assets/img/cat-1.jpg'
import pro2 from '../../src/assets/img/cat-2.jpg'
import pro3 from '../../src/assets/img/cat-3.jpg'

const router = useRoute();
let responseData = ref();
const attribute = ref({ color:{},size:{} });
let productQuantity = ref(1)


function productQuantityDecrement(){
    if (productQuantity.value > 1) { productQuantity.value-- }
}

function productQuantityIncrement(){
    productQuantity.value++
}

axios_C.get('/products/' + router.params.slug)
    .then(response => {
        responseData.value = response.data;
        // console.log((responseData.value.product[0].product_attribute[0].attribute_values.split(',')));
        console.log((responseData.value.product));
    })
    .catch(error => {
        console.log(error);
    });

function addToCart(productId) {
    axios_C.get('/users/cart/save/?productId=' + productId + '&user=2')
        .then(response => {
            console.log(response.data)
        })
        .catch(error => {
            console.log(error);
        });
}

</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="PRODUCTS DETAIL"></PageHeader>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div v-if="responseData" class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div
                    id="product-carousel"
                    class="carousel slide"
                    data-ride="carousel"
                >
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img
                                class="w-100 h-100"
                                :src="pro1"
                                alt="Image"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="w-100 h-100"
                                :src="pro2"
                                alt="Image"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="w-100 h-100"
                                :src="pro2"
                                alt="Image"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="w-100 h-100"
                                :src="pro3"
                                alt="Image"
                            />
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#product-carousel"
                        data-slide="prev"
                    >
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#product-carousel"
                        data-slide="next"
                    >
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ responseData.product[0].name }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <template v-for= "(number, key) in Math.floor(responseData.product[0].review_avg_rating_value)" :key="key">
                            <small class="fas fa-star"></small>
                        </template>
                        <template v-if="!Number.isInteger(responseData.product[0].review_avg_rating_value) && responseData.product[0].review_avg_rating_value !== null">
                            <small class="fas fa-star-half-alt"></small>
                        </template>
                        <template v-for= "(number, key) in Math.floor(5 - responseData.product[0].review_avg_rating_value)" :key="key">
                                <small class="far fa-star"></small>
                        </template>
                    </div>
                    <small class="pt-1">({{ responseData.product[0].review_count }})</small>
                </div>
                <template v-if="responseData.product[0].discount_price.discount > 0" >
                    <h3 class="font-weight-semi-bold mb-4">${{ responseData.product[0].sale_price - responseData.product[0].discount_price.discount }}.00</h3>

                    <h6 class="text-muted ml-2">
                        <del>${{ responseData.product[0].sale_price }}</del>
                    </h6>
                </template>
                <template v-else>
                    <h3 class="font-weight-semi-bold mb-4">${{ responseData.product[0].sale_price }}</h3>
                </template>
                <p class="mb-4">
                    {{ responseData.product[0].description.substring(0,300) }}....
                </p>

                    <div class="d-flex mb-3 mt-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">{{ responseData.product[0].product_attribute[0].attribute_name }}:</p>
                        <form>
                            <template v-for="(data, key) in responseData.product[0].product_attribute[0].attribute_values.split(',')" :key="key">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        class="custom-control-input"
                                        :id="key + data"
                                        :value="data"
                                        v-model="attribute.size"
                                    />
                                    <label class="custom-control-label" :for="key + data"
                                        >{{ data }}</label>
                                </div>
                            </template>
                        </form>
                    </div>
                    <div class="d-flex mb-3 mt-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">{{ responseData.product[0].product_attribute[1].attribute_name }}:</p>
                        <form>
                            <template v-for="(data, key) in responseData.product[0].product_attribute[1].attribute_values.split(',')" :key="key">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        class="custom-control-input"
                                        :id="key + data"
                                        :value="data"
                                        v-model="attribute.color"
                                    />
                                    <label class="custom-control-label" :for="key + data"
                                        >{{ data }}</label>
                                </div>
                            </template>
                        </form>
                    </div>

                <div class="d-flex align-items-center mb-4 pt-2 ex-m">
                    <div class="input-group quantity mr-3" style="width: 130px">
                        <div class="input-group-btn">
                            <button @click="productQuantityDecrement()" class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input
                            type="text"
                            class="form-control bg-secondary text-center"
                            v-model="productQuantity"
                        />
                        <div class="input-group-btn">
                            <button @click="productQuantityIncrement()" class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button @click="addToCart(responseData.product[0].id)" class="btn btn-primary px-3">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                </div>

            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div
                    class="nav nav-tabs justify-content-center border-secondary mb-4"
                >
                    <a
                        class="nav-item nav-link active"
                        data-toggle="tab"
                        href="#tab-pane-1"
                        >Description</a
                    >
                    <a
                        class="nav-item nav-link"
                        data-toggle="tab"
                        href="#tab-pane-2"
                        >Information</a
                    >
                    <a
                        class="nav-item nav-link"
                        data-toggle="tab"
                        href="#tab-pane-3"
                        >Reviews (0)</a
                    >
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>
                            {{ responseData.product[0].description }}
                        </p>

                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>
                            {{ responseData.product[0].specification }}
                        </p>

                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">
                                    {{ responseData.product[0].review_count }} review for {{ responseData.product[0].name }}
                                </h4>
                                <div class="media mb-4">

                                    <div class="media-body">
                                        <h6>
                                            John Doe<small>
                                                - <i>01 Jan 2045</i></small
                                            >
                                        </h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>
                                            Diam amet duo labore stet elitr ea
                                            clita ipsum, tempor labore accusam
                                            ipsum et no at. Kasd diam tempor
                                            rebum magna dolores sed sed eirmod
                                            ipsum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small
                                    >Your email address will not be published.
                                    Required fields are marked *</small
                                >
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message"
                                            >Your Review *</label
                                        >
                                        <textarea
                                            id="message"
                                            cols="30"
                                            rows="5"
                                            class="form-control"
                                        ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                        />
                                    </div>
                                    <div class="form-group mb-0 mb-4">
                                        <input
                                            type="submit"
                                            value="Leave Your Review"
                                            class="btn btn-primary px-3"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Categories Start -->
    <Carousel :items-to-show="6" :wrap-around="true">
    <Slide v-for="slide in 10" :key="slide">
        <div class="container-fluid pt-5 bg-dark">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1 ">
                <h6> category   </h6>
            </div>
        </div>
        </div>

    </Slide>

    <template #addons>
        <Navigation />
    </template>
    </Carousel>

    <!-- Categories End -->
    </div>
    <!-- Shop Detail End -->
</template>
