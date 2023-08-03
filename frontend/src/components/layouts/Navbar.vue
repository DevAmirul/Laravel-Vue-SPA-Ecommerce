<script setup>
import { RouterLink } from "vue-router";
</script>
<template>
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3">
                <a
                    class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 cate_color"
                    data-toggle="collapse"
                    href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px"
                >
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav
                    class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                    id="navbar-vertical"
                    style="width: calc(100% - 30px); z-index: 1"
                >

                    <div
                        class="navbar-nav w-100 overflow-hidden"
                        style="height: 410px"
                    >
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"
                                >Dresses
                                <i class="fa fa-angle-down float-right mt-1"></i
                            ></a>
                            <div
                                class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0"
                            >
                                <a href="" class="dropdown-item"
                                    >Men's Dresses</a
                                >
                                <a href="" class="dropdown-item"
                                    >Women's Dresses</a
                                >
                                <a href="" class="dropdown-item"
                                    >Baby's Dresses</a
                                >
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <!-- starts navbar -->
            <div class="col-lg-9">
                <nav
                    class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0"
                >
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold">
                            <span
                                class="text-primary font-weight-bold border px-3 mr-1"
                                >E</span
                            >Shopper
                        </h1>
                    </a>
                    <button
                        type="button"
                        class="navbar-toggler"
                        data-toggle="collapse"
                        data-target="#navbarCollapse"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse justify-content-between"
                        id="navbarCollapse"
                    >
                        <div class="navbar-nav mr-auto py-0">
                            <RouterLink :to="{ name: 'home' }"
                                ><a class="nav-item nav-link"
                                    >Home</a
                                ></RouterLink
                            >
                            <RouterLink :to="{ name: 'shop' }"
                                ><a class="nav-item nav-link"
                                    >Shop</a
                                ></RouterLink
                            >
                            <RouterLink :to="{ name: 'contact' }"
                                ><a class="nav-item nav-link active"
                                    >Flush Sale</a
                                ></RouterLink
                            >
                            <RouterLink :to="{ name: 'contact' }"
                                ><a class="nav-item nav-link active"
                                    >Contact</a
                                ></RouterLink
                            >
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <div class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    data-toggle="dropdown"
                                    >User</a
                                >
                                <div class="dropdown-menu rounded-0 m-0">
                                    <RouterLink :to="{ name: 'profile' }"
                                        ><a class="nav-item nav-link"
                                            >My Profile</a
                                        ></RouterLink
                                    >
                                    <RouterLink :to="{ name: 'orders' }"
                                        ><a class="nav-item nav-link"
                                            >My Orders</a
                                        ></RouterLink
                                    >

                                    <RouterLink :to="{ name: 'wishList' }"
                                        ><a class="nav-item nav-link"
                                            >Wishlist</a
                                        ></RouterLink
                                    >
                                    <RouterLink :to="{ name: 'cart' }"
                                        ><a class="nav-item nav-link"
                                            >Shopping Cart</a
                                        ></RouterLink
                                    >
                                    <RouterLink :to="{ name: 'checkout' }"
                                        ><a class="nav-item nav-link"
                                            >Checkout</a
                                        ></RouterLink
                                    >
                                </div>
                            </div>
                            <RouterLink :to="{ name: 'login' }"
                                ><a class="nav-item nav-link"
                                    >Login</a
                                ></RouterLink
                            >
                            <RouterLink :to="{ name: 'register' }"
                                ><a class="nav-item nav-link"
                                    >Register</a
                                ></RouterLink
                            >
                        </div>
                    </div>
                </nav>
            </div>
            <!-- End navbar -->

        </div>
    </div>
</template>
