<script setup>
import { RouterLink } from "vue-router";

const { settings } = defineProps(['settings'])
</script>
<template>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5 b-bg-color">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
                <RouterLink :to="{ name: 'home' }">
                    <!-- <img class="logo" :src="logo" alt=""> -->
                </RouterLink>
                <p>
                    {{ settings.slogan }}
                </p>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary mr-3"></i>{{ settings.address }}
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary mr-3"></i>{{ settings.email }}
                </p>
                <p class="mb-0">
                    <i class="fa fa-phone-alt text-primary mr-3"></i>+880{{ settings.phone }}
                </p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Quick Links
                        </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <RouterLink :to="{ name: 'home' }">
                                <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            </RouterLink>
                            <RouterLink :to="{ name: 'shop' }">
                                    <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                                    Shop</a>
                                </RouterLink>
                                <RouterLink :to="{ name: 'cart' }">
                                    <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Cart</a>
                                </RouterLink>
                                <RouterLink :to="{ name: 'checkout' }">
                                    <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                                </RouterLink>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Quick Links
                        </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <RouterLink :to="{ name: 'contactUs' }">
                                        <a class="text-dark"><i class="fa fa-angle-right mr-2"></i>Contact Us
                                        Us</a>
                                    </RouterLink>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-10 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy;
                    <a class="text-dark font-weight-semi-bold" href="#">{{ settings.name }}</a>. All Rights Reserved. Designed by
                    <a class="text-dark font-weight-semi-bold" href="https://www.facebook.com/fb.Amirul">DevAmirul</a>
                </p>
            </div>
            <div class="col-md-2 px-xl-0 text-center text-md-right">
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark px-2" :href="settings.facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" :href="settings.twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" :href="settings.instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-dark pl-2" :href="settings.youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
</template>