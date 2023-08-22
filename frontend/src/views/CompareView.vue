<script setup>
import { ref } from 'vue'
import useAxios from '../services/axios';
import useAlert from '../services/Sweetalert';
import PageHeader from "../components/layouts/PageHeader.vue";
import useRefresh from '../stores/Refresh';
import { storeToRefs } from "pinia";

const { refreshCompareItemsNumber, refreshComparePage } = storeToRefs(useRefresh());
const responseData = ref();
const compareList = ref();

compareList.value = JSON.parse(localStorage.getItem('compare'));

if (compareList.value) {
    useAxios.post('/compare', {
        data: {
            productIdArray: compareList.value
        }
    })
        .then(response => {
            responseData.value = response.data;
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}

function clearCompareList(){
    localStorage.removeItem('compare')
    responseData.value = null
    refreshCompareItemsNumber.value = !refreshCompareItemsNumber.value
    useAlert().topAlert('info', 'The comparison list is empty')
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="COMPARE PRODUCTS"></PageHeader>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div v-if="responseData" class="row px-xl-5">
                <template v-for="(data, key) in responseData.products" :key="key">
                    <div :class="[(compareList.length == 3) ? 'col-lg-4' : 'col-lg-6', 'mb-5']" >
                        <div
                            id="product-carousel"
                            class="carousel slide mb-3"
                            data-ride="carousel"
                        >
                            <div class="carousel-inner border">
                                <div class="carousel-item active">
                                    <img
                                        class="w-100 h-100"
                                        :src="data.image"
                                        alt="Image"
                                    />
                                </div>

                            </div>

                        </div>

                        <h3 class="font-weight-semi-bold">{{ data.name }}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <template v-for= "(number , key) in Math.floor(data.review_avg_rating_value)" :key="key">
                                    <small class="fas fa-star"></small>
                                </template>
                                <template v-if="!Number.isInteger(data.review_avg_rating_value) && data.review_avg_rating_value !== null && (data.review_avg_rating_value.charAt(data.review_avg_rating_value.length - 4) !== '0')">
                                    <small class="fas fa-star-half-alt"></small>
                                </template>
                                <template v-for= "(number, key) in Math.floor(5 - data.review_avg_rating_value)" :key="key">
                                        <small class="far fa-star"></small>
                                </template>
                            </div>
                            <small class="pt-1">({{ data.review_count }})</small>
                        </div>
                        <template v-if="data.discount_price.discount > 0" >
                            <h5 class="font-weight-semi-bold mb-4">
                                <del><small>${{ data.sale_price }}</small></del>
                                ${{ data.sale_price - data.discount_price.discount }}.00
                            </h5>
                        </template>
                        <template v-else>
                            <h5  class="text-muted ml-2">
                                ${{ data.sale_price }}
                            </h5>
                        </template>
                            <h4 class="mb-3">Description</h4>
                                <p>
                                    {{ data.description }}
                                </p>
                            <h4 class="mb-3">Additional Information</h4>
                                <p>
                                    {{ data.specification }}
                                </p>
                    </div>
                </template>
            <button @click="clearCompareList()" class="btn btn-primary m-auto">Clear Compare List</button>
        </div>
    </div>
    <!-- Contact End -->
</template>
