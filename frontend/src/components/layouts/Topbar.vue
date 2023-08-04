<script setup>
import { RouterLink } from "vue-router";
</script>
<template>
    <div class="container-fluid">
        <div class="row bg-secondary pt-2  px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <p>Phone (+1) 0000-000-000</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'home' }"
                    ><a class="text-decoration-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold">
                            <span
                                class="text-primary font-weight-bold border px-3 mr-1"
                                >E</span
                            >Shop
                        </h1>
                    </a></RouterLink
                >
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search for products"
                        />
                        <div class="input-group-append">
                            <span
                                class="input-group-text bg-transparent text-primary"
                            >
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'compare' }"
                    ><a class="btn border">
                        <i class="fas fa-balance-scale text-primary" aria-hidden="true"></i>
                        <span class="badge">0</span>
                    </a></RouterLink
                >
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'wishList' }"
                    ><a class="btn border">
                        <i class="fas fa-heart text-primary"></i>
                        <span class="badge">0</span>
                    </a></RouterLink
                >
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'cart' }"
                    ><a class="btn border">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <span class="badge">0</span>
                    </a></RouterLink
                >
            </div>
        </div>
    </div>
</template>
<style>

</style>