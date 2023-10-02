<script setup>
import { onMounted, ref } from 'vue'
import useAxios from '../../services/axios';
import useSearch from '../../stores/Search'
import useAuth from '../../stores/Auth'
import { RouterLink, useRoute } from "vue-router";

const auth = useAuth();
const responseData = ref();
const route = useRoute();

// Fetch navbar.
onMounted(() => {
    useAxios.get('/home/navbar')
        .then(response => {
            responseData.value = response.data
        })
} )

</script>
<template>
        <div class="container-fluid mb-2 pt-2">
                <div class="row border-top px-xl-5">
                    <div v-if="responseData" class="col-lg-3 d-none d-lg-block">
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
                                <template v-for="(data, key) in responseData.allCategory" :key="key">
                                    <template v-if="data.category.length !== 0">
                                            <div class="nav-item dropdown">
                                                <a class="nav-link" data-toggle="dropdown"
                                                    >{{ data.name }}
                                                    <i class="fa fa-angle-down float-right mt-1"></i
                                                ></a>
                                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                                    <template v-for="(cateData, cateKey) in data.category" :key="cateKey">
                                                        <RouterLink
                                                            style="text-decoration: none; color: inherit"
                                                            :to="{ name: 'categories', params: { slug: cateData.slug } }"
                                                            ><a @click="useSearch().cleanRouteQuery()" class="dropdown-item"
                                                                >{{ cateData.name }}
                                                            </a >
                                                        </RouterLink>
                                                    </template>
                                                </div>
                                            </div>
                                    </template>
                                </template>
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
                                    ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'home' ? 'active' : '', 'nav-item', 'nav-link']"
                                        >Home</a
                                    ></RouterLink
                                >
                                <RouterLink
                                    style="text-decoration: none; color: inherit"
                                    :to="{ name: 'shop' }"
                                    ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'shop' ? 'active' : '', 'nav-item', 'nav-link']"
                                        >Shop</a
                                    ></RouterLink
                                >
                                <RouterLink
                                    style="text-decoration: none; color: inherit"
                                    :to="{ name: 'sales' }"
                                    ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'sales' ? 'active' : '', 'nav-item', 'nav-link']"
                                        >Sale</a
                                    ></RouterLink
                                >

                                <RouterLink
                                    style="text-decoration: none; color: inherit"
                                    :to="{ name: 'contactUs' }"
                                    ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'contactUs' ? 'active' : '', 'nav-item', 'nav-link']"
                                        >Contact Us
                                        </a
                                    ></RouterLink
                                >
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <template v-if="auth.isAuthenticated">
                                    <div class="nav-item dropdown">
                                            <a  @click="useSearch().cleanRouteQuery()"
                                                class="nav-link dropdown-toggle " style="cursor: pointer;"
                                                data-toggle="dropdown"
                                                >{{ auth.user.name }}</a
                                            >

                                        <div class="dropdown-menu rounded-0 m-0">
                                            <RouterLink
                                                style="
                                                text-decoration: none;
                                                color: inherit;
                                            "
                                                :to="{ name: 'profile' }"
                                                ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'profile' ? 'active' : '', 'nav-item', 'nav-link']"
                                                    >My Profile</a
                                                ></RouterLink
                                            >
                                            <RouterLink
                                                style="
                                                text-decoration: none;
                                                color: inherit;
                                            "
                                                :to="{ name: 'orders' }"
                                                ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'orders' ? 'active' : '', 'nav-item', 'nav-link']"
                                                    >My Orders</a
                                                ></RouterLink
                                            >

                                            <RouterLink
                                                style="
                                                text-decoration: none;
                                                color: inherit;
                                            "
                                                :to="{ name: 'wishList' }"
                                                ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'wishList' ? 'active' : '', 'nav-item', 'nav-link']"
                                                    >Wishlist</a
                                                ></RouterLink
                                            >
                                            <RouterLink
                                                style="
                                                text-decoration: none;
                                                color: inherit;
                                            "
                                                :to="{ name: 'cart' }"
                                                ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'cart' ? 'active' : '', 'nav-item', 'nav-link']"
                                                    >Cart</a
                                                ></RouterLink
                                            >
                                            <a style=" text-decoration: none; color: inherit; cursor: pointer;"
                                                @click="useSearch().cleanRouteQuery(), auth.logout()" :class="[route.name == 'cart' ? 'active' : '', 'nav-item', 'nav-link']"
                                                    >Logout</a>

                                        </div>
                                    </div>
                                </template>

                                <template v-else>
                                    <RouterLink
                                        style="text-decoration: none; color: inherit"
                                        :to="{ name: 'login' }"
                                        ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'login' ? 'active' : '', 'nav-item', 'nav-link']"
                                            >Login</a
                                        ></RouterLink
                                    >
                                    <RouterLink
                                        style="text-decoration: none; color: inherit"
                                        :to="{ name: 'register' }"
                                        ><a @click="useSearch().cleanRouteQuery()" :class="[route.name == 'register' ? 'active' : '', 'nav-item', 'nav-link']"
                                            >Register</a
                                        ></RouterLink
                                    >
                                </template>
                            </div>
                        </div>
                        </nav>
                        <div
                            id="header-carousel"
                            class="carousel slide"
                            data-ride="carousel"
                        >
                            <div class="carousel-inner">
                            <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="http://127.0.0.1:8000/storage/img/banner.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                <RouterLink :to="{ name: 'shop' }">
                                        <a @click="useSearch().cleanRouteQuery()" href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </RouterLink>

                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</template>
