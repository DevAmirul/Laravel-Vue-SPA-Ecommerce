<script setup>
import { onMounted, ref, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import useAxios from "../services/axios";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from "../components/ProductsCard.vue";
import useAlert from "../services/alert";

const route = useRoute();
const router = useRouter();
const responseData = ref();

// Fetch products based on the search keyword.
onMounted(() => {
    useAxios.get(route.path).then((response) => {
        responseData.value = response.data;
        if (responseData.value.products.data.length === 0){
            useAlert().centerDialogAlert("info", "Items not found")
            .then((result) => {
                router.back();
            });
        }
    });
});

// Keep track of the URL path, when the path changes the data will be fetched based on the re-path.
watch( () => route.path, () => {
        useAxios.get(route.path).then((response) => {
            responseData.value = response.data;
            if (responseData.value.products.data.length === 0)
                useAlert().centerDialogAlert("info", "Items not found");
        });
    }
);
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
