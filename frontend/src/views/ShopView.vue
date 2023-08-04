<script setup>
import Filter from "../components/Filter.vue";
import Paginate from "../components/Paginate.vue";
import Sidebar from "../components/layouts/Sidebar.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="OUR SHOP"></PageHeader>
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <Sidebar></Sidebar>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <!-- filter start -->
                        <Filter></Filter>
                        <!-- filter end -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                                    <h6 class="text-muted ml-2">
                                        <del>$123.00</del>
                                    </h6>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex justify-content-between bg-light border"
                            >
                                <a href="" class="btn btn-sm text-dark p-0"
                                    ><i class="fas fa-eye text-primary mr-1"></i
                                    >View Detail</a
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
                    <!-- paginate start -->
                    <Paginate></Paginate>
                    <!-- paginate end -->
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</template>
