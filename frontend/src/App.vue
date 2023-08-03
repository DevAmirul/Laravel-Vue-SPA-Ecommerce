<script setup>
import { RouterView, useRouter } from "vue-router";
import PageHeader from "./components/layouts/PageHeader.vue";
import Navbar from "./components/layouts/Navbar.vue";
import Footer from "./components/layouts/Footer.vue";
import Topbar from "./components/layouts/Topbar.vue";

const router = useRouter();
const routerName = router.currentRoute.value.path;

</script>
<template>
    <!-- Topbar Start -->
    <Topbar></Topbar>
    <!-- Topbar End -->

    <div v-if="router.currentRoute.value.path == '/'">
        <RouterView />
    </div>
    <div v-else>
        <!-- Navbar Start -->
        <Navbar></Navbar>
        <!-- Navbar End -->
        <!-- Page Header Start -->
        <!-- <PageHeader :pageName="router.currentRoute.value.path"></PageHeader> -->
        <!-- Page Header End -->

        <RouterView />
    </div>
    <!-- Footer Start -->
    <Footer></Footer>
    <!-- Footer End -->
</template>
