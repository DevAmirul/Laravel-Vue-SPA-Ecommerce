<script setup>
import { ref, watch } from 'vue'
import { RouterLink } from "vue-router";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import axios_C from '../services/axios';
import ProductsCard from '../components/ProductsCard.vue';
import HomeNavbar from '../components/layouts/HomeNavbar.vue';

import pro1 from '../assets/img/vendor-1.jpg'

let responseData = ref();

axios_C.get('/home')
    .then(response => {
        responseData.value = response.data
    })
    .catch(error => {
        console.log(error);
    });

let responseCateData = ref();
let responseOfferData = ref();

axios_C.get('home/categories')
    .then(response => {
        responseCateData.value = response.data
    })
    .catch(error => {
        console.log(error);
    });

axios_C.get('/home/offers')
    .then(response => {
        responseOfferData.value = response.data
        console.log(responseOfferData.value);
    })
    .catch(error => {
        console.log(error);
    });

</script>
<template>
    <!-- Navbar Start -->
    <HomeNavbar></HomeNavbar>
    <!-- Navbar End -->
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div
                    class="d-flex align-items-center border mb-4"
                    style="padding: 30px"
                >
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div
                    class="d-flex align-items-center border mb-4"
                    style="padding: 30px"
                >
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div
                    class="d-flex align-items-center border mb-4"
                    style="padding: 30px"
                >
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div
                    class="d-flex align-items-center border mb-4"
                    style="padding: 30px"
                >
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    <!-- Categories Start -->
    <div v-if="responseCateData">
        <Carousel :items-to-show="5" :wrap-around="true">
        <Slide v-for="(data, key) in responseCateData.categories" :key="key">
            <div class="card" style="width: 10rem;">
                <img :src="pro1" class="card-img-top" alt="image">
                <div class="card-body">
                    <RouterLink :to="{ name: 'category', params: { slug: data.slug } }">
                        <h6 class="card-text text-primary" style="cursor: pointer;">{{ data.name }}</h6>
                    </RouterLink>

                </div>
            </div>
        </Slide>
            <template #addons>
                <Navigation />
            </template>
        </Carousel>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Top Sales</span>
            </h2>
        </div>
        <template v-if="responseData">
        <ProductsCard :products="responseData.topSales"></ProductsCard>
        </template>
    </div>
    <!-- Products End -->
    <!-- Offer Start -->
    <div v-if="responseOfferData" class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <template v-for="(data, key) in responseOfferData.offers" :key="key">
                <div :class="[(responseOfferData.offers.length == 3 ? 'col-md-4' : 'col-md-6'), 'pb-4', 'm-auto']">
                    <div
                        class="position-relative bg-secondary text-center text-white mb-2 py-5 px-5"
                    >
                        <img :src="data.image" alt="image" />
                        <div class="position-relative" style="z-index: 1">
                            <h5 class="text-uppercase text-primary mb-3">
                                {{ data.title }}
                            </h5>
                            <h1 class="mb-4 font-weight-semi-bold">
                                {{ data.name }}
                            </h1>
                            <RouterLink :to="{ name: 'offers', params: { name: data.name } }">
                            <a class="btn btn-outline-primary py-md-2 px-md-3"
                                    >Shop Now
                            </a>
                            </RouterLink>

                        </div>
                    </div>
                </div>
            </template>
            <!-- <template v-if="responseOfferData.offers.length > 1">
                <div class="col-md-6 pb-4">
                    <div
                        class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5"
                    >
                        <img :src="responseOfferData.offers[1].image" alt="image"  />
                        <div class="position-relative" style="z-index: 1">
                            <h5 class="text-uppercase text-primary mb-3">
                                {{ responseOfferData.offers[1].title }}
                            </h5>
                            <h1 class="mb-4 font-weight-semi-bold">
                                {{ responseOfferData.offers[1].name }}
                            </h1>
                            <RouterLink :to="{ name: 'offers', params: { name: responseOfferData.offers[1].name } }">
                                <a class="btn btn-outline-primary py-md-2 px-md-3"
                                        >Shop Now
                                </a>
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </template> -->
        </div>
    </div>
        <!-- Offer End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Top ratings</span>
            </h2>
        </div>
        <template v-if="responseData">
        <ProductsCard :products="responseData.topRatings"></ProductsCard>
        </template>
    </div>
    <!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Just Arrived</span>
            </h2>
        </div>
        <template v-if="responseData">
        <ProductsCard :products="responseData.newArrivals"></ProductsCard>
        </template>
    </div>
    <!-- Products End -->
    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->
</template>

<style scoped>
.carousel__slide {
  padding: 5px;
}

.carousel__viewport {
  perspective: 2000px;
}

.carousel__track {
  transform-style: preserve-3d;
}

.carousel__slide--sliding {
  transition: 0.5s;
}

.carousel__slide {
  opacity: 0.9;
  transform: rotateY(-20deg) scale(0.9);
}

.carousel__slide--active ~ .carousel__slide {
  transform: rotateY(20deg) scale(0.9);
}

.carousel__slide--prev {
  opacity: 1;
  transform: rotateY(-10deg) scale(0.95);
}

.carousel__slide--next {
  opacity: 1;
  transform: rotateY(10deg) scale(0.95);
}

.carousel__slide--active {
  opacity: 1;
  transform: rotateY(0) scale(1.1);
}
</style>
