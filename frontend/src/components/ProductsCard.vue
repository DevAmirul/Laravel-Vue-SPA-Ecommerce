<script setup>
import { RouterLink } from "vue-router";

const { products } = defineProps(['products'])
</script>
<template>
    <div class="row px-xl-5 pb-3">
            <template v-for="(data, key) in products.data" :key="key">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ data.image }}" alt="image" />
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
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <RouterLink
                                    style="text-decoration: none; color: inherit"
                                    :to="{ name: 'products', params: { slug: data.slug } }"
                                    ><a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                    Detail</a>
                            </RouterLink>

                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </template>
    </div>
</template>