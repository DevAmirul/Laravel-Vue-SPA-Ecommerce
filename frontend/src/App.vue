<script setup>
import Header from './components/layouts/Header.vue'
import Footer from './components/layouts/Footer.vue'
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <Header/>
  <RouterView />
  <Footer/>
</template>
