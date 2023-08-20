<script setup>
import { ref, watch } from 'vue'
import { useRoute } from "vue-router";
import axios_C from '../services/axios';
import Paginate from "../components/Paginate.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';

const route = useRoute();
const responseData = ref();

axios_C.get(route.path)
    .then(response => {
        responseData.value = response.data;
    })
    .catch(error => {
        console.log(error);
    });


watch( () => route.path,
    () => {
        axios_C.get(route.path)
            .then(response => {
                responseData.value = response.data;
            })
            .catch(error => {
                console.log(error);
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
