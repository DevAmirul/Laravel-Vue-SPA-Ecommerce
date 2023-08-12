<script setup>
import { RouterLink } from "vue-router";

const { products } = defineProps(['products'])
let productAttributeArray = []
let productCompareArray = []

import pro1 from '../../src/assets/img/cat-1.jpg'

function addToCompare(productId){
    let ifExistLocalStorageData = JSON.parse(localStorage.getItem('compare'));
    if (ifExistLocalStorageData ) {
        if (ifExistLocalStorageData.length < 3) {
            ifExistLocalStorageData.push(productId);
            localStorage.setItem("compare", JSON.stringify(ifExistLocalStorageData))
        }
    } else {
        productCompareArray.push(productId);
        localStorage.setItem("compare", JSON.stringify(productCompareArray))
    }
}

function addToWishlist(productAttributes){
    let ifExistLocalStorageData = localStorage.getItem('productAttributes');
    if (ifExistLocalStorageData) {
        ifExistLocalStorageData = JSON.parse(localStorage.getItem('productAttributes'))

        let x = true
        for (let i = 0; i < ifExistLocalStorageData.length; i++) {
            if (ifExistLocalStorageData[i].id == productAttributes.id) {
                return x = false;
            }
        }
        if (x) {
            ifExistLocalStorageData.push(productAttributes);
            localStorage.setItem("productAttributes", JSON.stringify(ifExistLocalStorageData))
        }

    }else{
        productAttributeArray.push(productAttributes);
        localStorage.setItem("productAttributes", JSON.stringify(productAttributeArray))
    }
}

function addToCart(params){

}

</script>
<template>
    <div class="row px-xl-5 pb-3">
            <template v-for="(data, key) in products.data" :key="key">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" :src="pro1" alt="image" />
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">
                                {{ data.name }}
                            </h6>
                            <div class="d-flex justify-content-center">
                                <template v-if="data.discount > 0">
                                    <h6>${{ data.discount }}</h6>
                                    <h6 class="text-muted ml-2"><del>${{ data.sale_price }}</del></h6>
                                </template>
                                <template v-else>
                                    <h6>${{ data.sale_price }}</h6>
                                </template>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border d-flex justify-content-around">

                            <button @click="addToWishlist({id:data.p_id,name:data.name, image:data.image, salePrice:data.sale_price})" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-heart text-primary mr-1"></i></button>

                            <button @click="addToCart()" class="btn btn-sm text-dark p-0">
                                <i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>
                            </button>
                            <button @click="addToCompare(data.p_id)" class="btn btn-sm text-dark p-0">
                                            <i class="fas fa-balance-scale text-primary" aria-hidden="true"></i>
                            </button>
                            <RouterLink
                                        style="text-decoration: none; color: inherit"
                                        :to="{ name: 'products', params: { slug: data.slug } }"
                                        ><a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i></a>
                            </RouterLink>

                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border d-flex justify-content-around">

                        </div>
                    </div>
                </div>
            </template>
    </div>
</template>