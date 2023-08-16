<script setup>
import { ref, watch } from 'vue'
import axios_C from '../services/axios';
import Filter from "../components/layouts/Filter.vue";
import Paginate from "../components/Paginate.vue";
import Sidebar from "../components/layouts/Sidebar.vue";
import PageHeader from "../components/layouts/PageHeader.vue";
import ProductsCard from '../components/ProductsCard.vue';
import { useRoute } from 'vue-router'

const route = useRoute();
const queryFromLink = new URLSearchParams(route.query).toString();

let responseData = ref();

    if (queryFromLink !== '') {
        axios_C.get('/shop?' + queryFromLink)
            .then(response => {
                responseData.value = response.data
                console.log(responseData.value, 'with');
            })
            .catch(error => {
                console.log(error);
            });
    } else {
        axios_C.get('/shop')
            .then(response => {
                responseData.value = response.data
                console.log(responseData.value);
            })
            .catch(error => {
                console.log(error);
            });
    }

// axios_C.get('/shop')
//     .then(response => {
//         responseData.value = response.data
//         // console.log(responseData.value);
//     })
//     .catch(error => {
//         console.log(error);
//     });

// watch(query, () => {
//     console.log(query.value);
// } )




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
                    </template>
                    <Paginate></Paginate>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</template>
