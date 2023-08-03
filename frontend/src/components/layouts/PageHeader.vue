<script setup>
import { RouterLink, useRouter } from "vue-router";
const router = useRouter();
const routerName = router.currentRoute.value.path;
const pageName = routerName.slice(1).toUpperCase();
</script>
<template>
    <div class="container-fluid bg-secondary mb-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            style="min-height: 150px"
        >
            <h1 class="font-weight-semi-bold text-uppercase mb-3">
                Contact Us
            </h1>
            <div class="d-inline-flex">
                <RouterLink :to="{ name: 'home' }"
                    ><p class="m-0"><a class="li-color">HOME</a></p></RouterLink
                >
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{ pageName }}</p>
            </div>
        </div>
    </div>
</template>