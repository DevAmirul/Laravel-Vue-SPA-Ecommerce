<script setup>
import { onMounted, ref, watch } from 'vue'
import { useRoute } from "vue-router";
import useAxios from '../services/axios';
import Paginate from "../components/Paginate.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';
import useAlert from "../services/Sweetalert";

const route = useRoute();
const responseData = ref();

onMounted(() => {
    useAxios.get(route.path)
        .then(response => {
            responseData.value = response.data;
            if (responseData.value.products.length === 0) useAlert().centerDialogAlert('info', 'Shop is empty')
        })
        .catch(error => {
            // console.log(error);
        });
} )

watch( () => route.path,
    () => {
        useAxios.get(route.path)
            .then(response => {
                responseData.value = response.data;
                if (responseData.value.products.length === 0) useAlert().centerDialogAlert('info', 'Shop is empty')
            })
            .catch(error => {
                // console.log(error);
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
