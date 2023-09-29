<script setup>
import { RouterLink } from "vue-router";
import useCart from '../services/cart';
import useCompare from '../services/compare';
import useWishlist from '../services/wishlist';

const { products } = defineProps(['products'])

</script>
<template>
    <div class="row px-xl-5  pb-3">
        <template v-for="(data, key) in products" :key="key">
            <div :class="[((products.length == 1) ? 'col-lg-12' : ((products.length == 2) ? 'col-lg-6' : ((products.length == 3) ? 'col-lg-4' : 'col-lg-3'))), 'col-md-6', 'col-sm-12', 'pb-1']">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" :src="data.image" alt="image" />
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">
                            {{ data.name }}
                        </h6>
                        <div class="d-flex justify-content-center">
                            <template v-if="data.discount !== null && data.status !== 0 && data.expire_date > new Date().toISOString()">
                                <template v-if="data.type == 'Percentage'">
                                    <h6 class="text-muted mr-4">{{ Number(data.discount) }}% <small>off</small></h6>
                                    <h6 >${{ Number(data.sale_price) }}</h6>
                                </template>
                                <template v-else>
                                    <h6 class="mr-4">${{ Number(data.sale_price) - Number(data.discount)  }}</h6>
                                    <h6 class="text-muted ml-2"><del>${{ Number(data.sale_price) }}</del></h6>
                                </template>
                            </template>
                            <template v-else>
                                <h6>${{ Number(data.sale_price) }}</h6>
                            </template>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border d-flex justify-content-around">
                        <button
                            @click="useWishlist().addWishlist({ id: data.p_id, name: data.name, image: data.image, salePrice: data.sale_price })"
                            class="btn btn-sm text-dark p-0"><i class="fas fa-heart text-primary mr-1"></i></button>

                        <button @click="useCart().addCart(data.p_id)" class="btn btn-sm text-dark p-0">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>
                        </button>
                        <button @click="useCompare(data.p_id)" class="btn btn-sm text-dark p-0">
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