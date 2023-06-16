<script setup>
import { RouterLink, RouterView } from 'vue-router'
import AppLayoutView from './views/AppLayoutView.vue';
import GuestLayoutView from './views/GuestLayoutView.vue';
let Dashboard = 1;
</script>

<template>
    <div v-if="Dashboard">
        <AppLayoutView></AppLayoutView>
    </div>

    <div v-else>
        <GuestLayoutView></GuestLayoutView>
    </div>
</template>
