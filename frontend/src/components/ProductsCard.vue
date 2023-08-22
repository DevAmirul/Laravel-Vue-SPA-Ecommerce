<script setup>
import { RouterLink } from "vue-router";
import useAxios from '../services/axios';
import useAlert from '../services/Sweetalert';
import useRefresh from '../stores/Refresh';
import { storeToRefs } from "pinia";

const { refreshCartItemsNumber, refreshWishlistItemsNumber, refreshCompareItemsNumber } = storeToRefs(useRefresh());

const { products } = defineProps(['products'])

let productAttributeArray = []
let productCompareArray = []

function addToCompare(productId) {
    let ifExistLocalStorageData = JSON.parse(localStorage.getItem('compare'));
    if (ifExistLocalStorageData) {
        if (ifExistLocalStorageData.length < 3) {
            ifExistLocalStorageData.push(productId);
            localStorage.setItem("compare", JSON.stringify(ifExistLocalStorageData))
            refreshCompareItemsNumber.value = !refreshCompareItemsNumber.value
            useAlert().topAlert('success', 'Successfully added to compare')
        }else{
            useAlert().topAlert('info', 'The comparison list is already full')
        }
    } else {
        productCompareArray.push(productId);
        localStorage.setItem("compare", JSON.stringify(productCompareArray))
        refreshCompareItemsNumber.value = !refreshCompareItemsNumber.value
        useAlert().topAlert('success', 'Successfully added to compare')
    }
}

function addToWishlist(productAttributes) {
    let ifExistLocalStorageData = localStorage.getItem('productAttributes');
    if (ifExistLocalStorageData) {
        ifExistLocalStorageData = JSON.parse(localStorage.getItem('productAttributes'))
        let hasId = true
        for (let i = 0; i < ifExistLocalStorageData.length; i++) {
            if (ifExistLocalStorageData[i].id == productAttributes.id) {
                useAlert().topAlert('info', 'Already added to wishlist')
                return hasId = false;
            }
        }
        if (hasId) {
            ifExistLocalStorageData.push(productAttributes);
            localStorage.setItem("productAttributes", JSON.stringify(ifExistLocalStorageData))
            refreshWishlistItemsNumber.value = !refreshWishlistItemsNumber.value
            useAlert().topAlert('success', 'Successfully added to wishlist')

        }
    } else {
        productAttributeArray.push(productAttributes);
        localStorage.setItem("productAttributes", JSON.stringify(productAttributeArray))
        refreshWishlistItemsNumber.value = !refreshWishlistItemsNumber.value
        useAlert().topAlert('success', 'Successfully added to wishlist')

    }
}

function addToCart(productId) {
    useAxios.get('/users/cart/save/?productId=' + productId + '&user=2')
        .then(response => {
            refreshCartItemsNumber.value = !refreshCartItemsNumber.value
            useAlert().topAlert('success', 'Successfully added to cart')
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}

</script>
<template>
    <div class="row px-xl-5  pb-3">
        <template v-for="(data, key) in products.data" :key="key">
            <div :class="[((products.data.length == 1) ? 'col-lg-12' : ((products.data.length == 2) ? 'col-lg-6' : ((products.data.length == 3) ? 'col-lg-4' : 'col-lg-3'))), 'col-md-6', 'col-sm-12', 'pb-1']">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" :src="data.image" alt="image" />
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
                        <button
                            @click="addToWishlist({ id: data.p_id, name: data.name, image: data.image, salePrice: data.sale_price })"
                            class="btn btn-sm text-dark p-0"><i class="fas fa-heart text-primary mr-1"></i></button>

                        <button @click="addToCart(data.p_id)" class="btn btn-sm text-dark p-0">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>
                        </button>
                        <button @click="addToCompare(data.p_id)" class="btn btn-sm text-dark p-0">
                            <i class="fas fa-balance-scale text-primary" aria-hidden="true"></i>
                        </button>
                        <RouterLink style="text-decoration: none; color: inherit"
                            :to="{ name: 'products', params: { slug: data.slug } }"><a class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i></a>
                        </RouterLink>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>