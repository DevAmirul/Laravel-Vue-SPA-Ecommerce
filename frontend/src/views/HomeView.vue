<script setup>
import { onMounted, ref } from "vue";
import { RouterLink } from "vue-router";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import useAxios from "../services/axios";
import ProductsCard from "../components/ProductsCard.vue";
import HomeNavbar from "../components/layouts/HomeNavbar.vue";

let responseData = ref();
let responseCateData = ref();
let responseOfferData = ref();

// Fetch useful json data for home page.
onMounted(() => {
    useAxios.get("/home").then((response) => {
        responseData.value = response.data;
    });

    useAxios.get("home/categories").then((response) => {
        responseCateData.value = response.data;
    });

    useAxios.get("/home/offers").then((response) => {
        responseOfferData.value = response.data;
    });
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
            <Slide
                v-for="(data, key) in responseCateData.categories"
                :key="key"
            >
                <div class="card" style="width: 10rem">
                    <img :src="data.image" class="card-img-top" alt="image" />
                    <div class="card-body">
                        <RouterLink
                            :to="{
                                name: 'categories',
                                params: { slug: data.slug },
                            }"
                        >
                            <h6
                                class="card-text text-primary"
                                style="cursor: pointer"
                            >
                                {{ data.name }}
                            </h6>
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

    <!-- Top Sales Start -->
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
    <!-- Top Sales End -->
    <!-- Offer Start -->
    <div v-if="responseOfferData" class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <template
                v-for="(data, key) in responseOfferData.offers"
                :key="key"
            >
                <div :class="[ responseOfferData.offers.length == 3 ? 'col-md-4' : 'col-md-6', 'pb-4', 'm-auto', ]"
                >
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
                            <RouterLink
                                :to="{ name: 'offers', params: { slug: data.slug } }"
                            >
                                <a
                                    class="btn btn-outline-primary py-md-2 px-md-3"
                                    >Shop Now
                                </a>
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </template>
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
