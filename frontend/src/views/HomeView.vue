<script setup>
import { ref } from 'vue'
import { RouterLink } from "vue-router";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import axios_C from '../services/axios';
import ProductsCard from '../components/ProductsCard.vue';

let responseData = ref();

axios_C.get('/home')
    .then(response => {
        responseData.value = response.data
    })
    .catch(error => {
        console.log(error);
    });

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
    <div v-if="responseData">
        <Carousel :items-to-show="5" :wrap-around="true">
        <Slide v-for="(data, key) in responseData.categories" :key="key">
            <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
