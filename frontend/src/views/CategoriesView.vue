<script setup>
import { watch, onMounted } from "vue";
import { useRoute } from "vue-router";
import useSearch from '../stores/Search'
import { storeToRefs } from "pinia";
import Filter from "../components/layouts/Filter.vue";
import Paginate from "../components/Paginate.vue";
import Sidebar from "../components/layouts/Sidebar.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';
import axios_C from "../services/axios";

const { responseData } = storeToRefs(useSearch());
const route = useRoute();

onMounted(() => {
    const queryFromLink = new URLSearchParams(route.query).toString();
    if (queryFromLink == '') {
        axios_C.get(route.path)
            .then(response => {
                responseData.value = response.data
                console.log(responseData.value, 'mounted');
            })
            .catch(error => {
                console.log(error);
            });
    }
})
watch(() => route.path,
    () => {
        axios_C.get(route.path)
            .then(response => {
                responseData.value = response.data;
                console.log('ok');
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
    <!-- Page Header End -->w
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
                    </template>
                    <Paginate></Paginate>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</template>
