<script setup>
import PageHeader from "../components/layouts/PageHeader.vue";
let a = [1, 2,3];
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="COMPARE PRODUCTS"></PageHeader>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <template v-for="n in a" :key="n">
            <div class="col-lg-4 mb-5">
                <div
                    id="product-carousel"
                    class="carousel slide mb-3"
                    data-ride="carousel"
                >
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img
                                class="w-100 h-100"
                                src="img/product-1.jpg"
                                alt="Image"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="w-100 h-100"
                                src="img/product-2.jpg"
                                alt="Image"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="w-100 h-100"
                                src="img/product-3.jpg"
                                alt="Image"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="w-100 h-100"
                                src="img/product-4.jpg"
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

                <h3 class="font-weight-semi-bold">Colorful Stylish Shirt</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">$150.00</h3>
                <h6 class="text-muted ml-2">
                    <del>$123.00</del>
                </h6>
            </div>
            </template>
        </div>
    </div>
    <!-- Contact End -->
</template>
