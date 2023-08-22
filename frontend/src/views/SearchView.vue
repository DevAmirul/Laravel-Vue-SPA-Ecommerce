<script setup>
import { ref, watch } from 'vue'
import { useRoute } from "vue-router";
import useAxios from '../services/axios';
import Paginate from "../components/Paginate.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';
import useAlert from "../services/Sweetalert";

const route = useRoute();
const responseData = ref();

useAxios.get(route.path)
    .then(response => {
        responseData.value = response.data;
    })
    .catch(error => {
        useAlert().topAlert('error', error.response.data.message, 'bottom-end')
    });


watch( () => route.path,
    () => {
        useAxios.get(route.path)
            .then(response => {
                responseData.value = response.data;
            })
            .catch(error => {
                useAlert().topAlert('error', error.response.data.message, 'bottom-end')
            });
    }
)
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="OUR SHOP"></PageHeader>
    <!-- Page Header End -->
    <!-- Shop Start -->
        <div class="container-fluid pt-5">
            <template v-if="responseData">
            <ProductsCard :products="responseData.topSales"></ProductsCard>
            </template>
        </div>
    <!-- Shop End -->
</template>
