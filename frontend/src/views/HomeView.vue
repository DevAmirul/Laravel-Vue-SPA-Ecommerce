<script setup>
import { RouterLink } from "vue-router";
import { Carousel, Navigation, Slide } from "vue3-carousel";
</script>
<template>
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a
                    class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse"
                    href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px"
                >
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav
                    class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical"
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
                            <RouterLink
                                style="text-decoration: none; color: inherit"
                                :to="{ name: 'home' }"
                                ><a class="nav-item nav-link"
                                    >Home</a
                                ></RouterLink
                            >
                            <RouterLink
                                style="text-decoration: none; color: inherit"
                                :to="{ name: 'shop' }"
                                ><a class="nav-item nav-link"
                                    >Shop</a
                                ></RouterLink
                            >
                            <RouterLink
                                style="text-decoration: none; color: inherit"
                                :to="{ name: 'contacts' }"
                                ><a class="nav-item nav-link active"
                                    >Flush Sale</a
                                ></RouterLink
                            >
                            <RouterLink
                                style="text-decoration: none; color: inherit"
                                :to="{ name: 'contacts' }"
                                ><a class="nav-item nav-link active"
                                    >Contacts</a
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
                                    <RouterLink
                                        style="
                                            text-decoration: none;
                                            color: inherit;
                                        "
                                        :to="{ name: 'profile' }"
                                        ><a class="nav-item nav-link"
                                            >My Profile</a
                                        ></RouterLink
                                    >
                                    <RouterLink
                                        style="
                                            text-decoration: none;
                                            color: inherit;
                                        "
                                        :to="{ name: 'orders' }"
                                        ><a class="nav-item nav-link"
                                            >My Orders</a
                                        ></RouterLink
                                    >

                                    <RouterLink
                                        style="
                                            text-decoration: none;
                                            color: inherit;
                                        "
                                        :to="{ name: 'wishList' }"
                                        ><a class="nav-item nav-link"
                                            >Wishlist</a
                                        ></RouterLink
                                    >
                                    <RouterLink
                                        style="
                                            text-decoration: none;
                                            color: inherit;
                                        "
                                        :to="{ name: 'cart' }"
                                        ><a class="nav-item nav-link"
                                            >Shopping Cart</a
                                        ></RouterLink
                                    >
                                    <RouterLink
                                        style="
                                            text-decoration: none;
                                            color: inherit;
                                        "
                                        :to="{ name: 'checkout' }"
                                        ><a class="nav-item nav-link"
                                            >Checkout</a
                                        ></RouterLink
                                    >
                                </div>
                            </div>
                            <RouterLink
                                style="text-decoration: none; color: inherit"
                                :to="{ name: 'login' }"
                                ><a class="nav-item nav-link"
                                    >Login</a
                                ></RouterLink
                            >
                            <RouterLink
                                style="text-decoration: none; color: inherit"
                                :to="{ name: 'register' }"
                                ><a class="nav-item nav-link"
                                    >Register</a
                                ></RouterLink
                            >
                        </div>
                    </div>
                </nav>
                <div
                    id="header-carousel"
                    class="carousel slide"
                    data-ride="carousel"
                >
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px">
                            <img
                                class="img-fluid"
                                src="img/carousel-1.jpg"
                                alt="Image"
                            />
                            <div
                                class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                            >
                                <div class="p-3" style="max-width: 700px">
                                    <h4
                                        class="text-light text-uppercase font-weight-medium mb-3"
                                    >
                                        10% Off Your First Order
                                    </h4>
                                    <h3
                                        class="display-4 text-white font-weight-semi-bold mb-4"
                                    >
                                        Fashionable Dress
                                    </h3>
                                    <a href="" class="btn btn-light py-2 px-3"
                                        >Shop Now</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px">
                            <img
                                class="img-fluid"
                                src="img/carousel-2.jpg"
                                alt="Image"
                            />
                            <div
                                class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                            >
                                <div class="p-3" style="max-width: 700px">
                                    <h4
                                        class="text-light text-uppercase font-weight-medium mb-3"
                                    >
                                        10% Off Your First Order
                                    </h4>
                                    <h3
                                        class="display-4 text-white font-weight-semi-bold mb-4"
                                    >
                                        Reasonable Price
                                    </h3>
                                    <a href="" class="btn btn-light py-2 px-3"
                                        >Shop Now</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#header-carousel"
                        data-slide="prev"
                    >
                        <div
                            class="btn btn-dark"
                            style="width: 45px; height: 45px"
                        >
                            <span
                                class="carousel-control-prev-icon mb-n2"
                            ></span>
                        </div>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#header-carousel"
                        data-slide="next"
                    >
                        <div
                            class="btn btn-dark"
                            style="width: 45px; height: 45px"
                        >
                            <span
                                class="carousel-control-next-icon mb-n2"
                            ></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
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
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-1.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-2.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-3.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-4.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Accerssories</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-5.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Bags</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-6.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Shoes</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->
    <!-- Offer Start -->
    <!-- Categories Start -->
    <Carousel :items-to-show="5" :wrap-around="true">
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
    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div
                    class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5"
                >
                    <img src="img/offer-1.png" alt="" />
                    <div class="position-relative" style="z-index: 1">
                        <h5 class="text-uppercase text-primary mb-3">
                            20% off the all order
                        </h5>
                        <h1 class="mb-4 font-weight-semi-bold">
                            Spring Collection
                        </h1>
                        <a
                            href=""
                            class="btn btn-outline-primary py-md-2 px-md-3"
                            >Shop Now</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div
                    class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5"
                >
                    <img src="img/offer-2.png" alt="" />
                    <div class="position-relative" style="z-index: 1">
                        <h5 class="text-uppercase text-primary mb-3">
                            20% off the all order
                        </h5>
                        <h1 class="mb-4 font-weight-semi-bold">
                            Winter Collection
                        </h1>
                        <a
                            href=""
                            class="btn btn-outline-primary py-md-2 px-md-3"
                            >Shop Now</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Trandy Products</span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-1.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-2.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-3.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-4.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-5.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-6.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-7.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-8.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3">
                        <span class="bg-secondary px-2">Stay Updated</span>
                    </h2>
                    <p>
                        Amet lorem at rebum amet dolores. Elitr lorem dolor sed
                        amet diam labore at justo ipsum eirmod duo labore
                        labore.
                    </p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control border-white p-4"
                            placeholder="Email Goes Here"
                        />
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Just Arrived</span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-1.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-2.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-3.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-4.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-5.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-6.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-7.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                    >
                        <img
                            class="img-fluid w-100"
                            src="img/product-8.jpg"
                            alt=""
                        />
                    </div>
                    <div
                        class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                    >
                        <h6 class="text-truncate mb-3">
                            Colorful Stylish Shirt
                        </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between bg-light border"
                    >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a
                        >
                        <a href="" class="btn btn-sm text-dark p-0"
                            ><i
                                class="fas fa-shopping-cart text-primary mr-1"
                            ></i
                            >Add To Cart</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <!-- Vendor Start -->
    <div class="container-fluid py-5">
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
    </div>
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
