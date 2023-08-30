<script setup>
import { watch,onMounted } from "vue";
import { useRoute } from "vue-router";
import { storeToRefs } from "pinia";
import useSearch from '../stores/Search'
import Filter from "../components/layouts/Filter.vue";
import Paginate from "../components/Paginate.vue";
import Sidebar from "../components/layouts/Sidebar.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';
import useAxios from "../services/axios";
import useAlert from "../services/Sweetalert";

const { responseData } = storeToRefs(useSearch());
const route = useRoute();

onMounted(() => {
    const queryFromLink = new URLSearchParams(route.query).toString();
    if (queryFromLink == '') {
        useAxios.get(route.path)
            .then(response => {
                responseData.value = response.data
                if (responseData.value.products.data.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
            })
            .catch(error => {
                // console.log(error);
            });
    }
})

watch(() => route.path,
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
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <Sidebar></Sidebar>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <!-- filter start -->
                        <Filter></Filter>
                        <!-- filter end -->
                    </div>
                    <template v-if="responseData">
                        <ProductsCard :products="responseData.products"></ProductsCard>
                        <Paginate :links="responseData.products.links"></Paginate>
                    </template>
                    <Paginate></Paginate>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</template>
