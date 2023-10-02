<script setup>
import { onBeforeMount, onMounted, ref, provide, watch } from 'vue'
import { RouterView, useRouter } from "vue-router";
import useAxios from './services/axios';
import Navbar from "./components/layouts/Navbar.vue";
import Footer from "./components/layouts/Footer.vue";
import Topbar from "./components/layouts/Topbar.vue";
import useAuth from './stores/Auth';

const router = useRouter();
const responseData = ref();

onBeforeMount(() => {
    useAuth();
} )

onMounted(() => {
    useAxios.get('/site-settings')
        .then(response => {
            responseData.value = response.data
        })
        .catch(error => {
            // console.log(error);
        });

} )
</script>
<template>
    <!-- Topbar Start -->
    <template v-if="responseData">
        <Topbar :logo="responseData.settings.logo"></Topbar>
    </template>
    <!-- Topbar End -->

    <div v-if="router.currentRoute.value.path == '/'">
        <RouterView />
    </div>
    <div v-else>
        <!-- Navbar Start -->
        <Navbar></Navbar>

        <RouterView />
    </div>
    <!-- Footer Start -->
    <template v-if="responseData">
        <Footer :settings="responseData.settings"></Footer>
    </template>
    <!-- Footer End -->
</template>
