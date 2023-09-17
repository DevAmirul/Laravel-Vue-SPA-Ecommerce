<script setup>
import { onMounted, ref, watch } from 'vue'
import { useRoute } from "vue-router";
import useAxios from '../services/axios';
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';
import useAlert from "../services/alert";

const route = useRoute();
const responseData = ref();

onMounted(() => {
    useAxios.get(route.path)
        .then(response => {
            responseData.value = response.data;
            if (responseData.value.products.data.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
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
                if (responseData.value.products.data.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
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
            <ProductsCard :products="responseData.products.data"></ProductsCard>
            </template>
        </div>
    <!-- Shop End -->
</template>
