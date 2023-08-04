<script setup>
import PageHeader from "../components/layouts/PageHeader.vue";

import { Carousel, Navigation, Slide } from "vue3-carousel";

</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="PRODUCTS DETAIL"></PageHeader>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
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
            </div>
            <div class="col-lg-7 pb-5">
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
                <p class="mb-4">
                    Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr
                    erat diam stet sit clita ea. Sanc invidunt ipsum et, labore
                    clita lorem magna lorem ut. Erat lorem duo dolor no sea
                    nonumy. Accus labore stet, est lorem sit diam sea et justo,
                    amet at lorem et eirmod ipsum diam et rebum kasd rebum.
                </p>
                <div class="d-flex mb-3 mt-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="size-1"
                                name="size"
                            />
                            <label class="custom-control-label" for="size-1"
                                >XS</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="size-2"
                                name="size"
                            />
                            <label class="custom-control-label" for="size-2"
                                >S</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="size-3"
                                name="size"
                            />
                            <label class="custom-control-label" for="size-3"
                                >M</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="size-4"
                                name="size"
                            />
                            <label class="custom-control-label" for="size-4"
                                >L</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="size-5"
                                name="size"
                            />
                            <label class="custom-control-label" for="size-5"
                                >XL</label
                            >
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-3 mt-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">
                        Colors:
                    </p>
                    <form>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="color-1"
                                name="color"
                            />
                            <label class="custom-control-label" for="color-1"
                                >Black</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="color-2"
                                name="color"
                            />
                            <label class="custom-control-label" for="color-2"
                                >White</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="color-3"
                                name="color"
                            />
                            <label class="custom-control-label" for="color-3"
                                >Red</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="color-4"
                                name="color"
                            />
                            <label class="custom-control-label" for="color-4"
                                >Blue</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                                type="radio"
                                class="custom-control-input"
                                id="color-5"
                                name="color"
                            />
                            <label class="custom-control-label" for="color-5"
                                >Green</label
                            >
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2 ex-m">
                    <div class="input-group quantity mr-3" style="width: 130px">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input
                            type="text"
                            class="form-control bg-secondary text-center"
                            value="1"
                        />
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">
                        Share on:
                    </p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
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
                            Eos no lorem eirmod diam diam, eos elitr et
                            gubergren diam sea. Consetetur vero aliquyam
                            invidunt duo dolores et duo sit. Vero diam ea vero
                            et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr,
                            sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum
                            accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor
                            aliquyam eirmod nonumy rebum dolor accusam, ipsum
                            kasd eos consetetur at sit rebum, diam kasd invidunt
                            tempor lorem, ipsum lorem elitr sanctus eirmod
                            takimata dolor ea invidunt.
                        </p>
                        <p>
                            Dolore magna est eirmod sanctus dolor, amet diam et
                            eirmod et ipsum. Amet dolore tempor consetetur sed
                            lorem dolor sit lorem tempor. Gubergren amet amet
                            labore sadipscing clita clita diam clita. Sea amet
                            et sed ipsum lorem elitr et, amet et labore voluptua
                            sit rebum. Ea erat sed et diam takimata sed justo.
                            Magna takimata justo et amet magna et.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>
                            Eos no lorem eirmod diam diam, eos elitr et
                            gubergren diam sea. Consetetur vero aliquyam
                            invidunt duo dolores et duo sit. Vero diam ea vero
                            et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr,
                            sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum
                            accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor
                            aliquyam eirmod nonumy rebum dolor accusam, ipsum
                            kasd eos consetetur at sit rebum, diam kasd invidunt
                            tempor lorem, ipsum lorem elitr sanctus eirmod
                            takimata dolor ea invidunt.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et
                                        eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem
                                        eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et
                                        et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat
                                        justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et
                                        eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem
                                        eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et
                                        et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat
                                        justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">
                                    1 review for "Colorful Stylish Shirt"
                                </h4>
                                <div class="media mb-4">
                                    <img
                                        src="img/user.jpg"
                                        alt="Image"
                                        class="img-fluid mr-3 mt-1"
                                        style="width: 45px"
                                    />
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
                                    <div class="form-group mb-0">
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
