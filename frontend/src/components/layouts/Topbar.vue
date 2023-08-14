<script setup>
import { ref } from "vue";
import { RouterLink } from "vue-router";
import axios_C from '../../services/axios';

const { settings } = defineProps(['settings'])

let responseCartNumber = ref();
axios_C.get('/users/cart/count/' + 2)
    .then(response => {
        responseCartNumber.value = response.data
    })
    .catch(error => {
        console.log(error);
    });

const compareList = JSON.parse(localStorage.getItem('compare'));
const wishlist = JSON.parse(localStorage.getItem('productAttributes'));

</script>
<template>
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5 m-auto">
            <div class="col-lg-3 d-none d-lg-block ">
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'home' }"
                    ><a class="text-decoration-none">
                        <img :src="settings" alt="logo" style="height: 90px;">
                    </a>
                </RouterLink
                >
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search for products"
                        />
                        <div class="input-group-append">
                            <span
                                class="input-group-text bg-transparent text-primary"
                            >
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right ">
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'compare' }"
                    ><a class="btn border mx-2">
                        <i class="fas fa-balance-scale text-primary" aria-hidden="true"></i>
                        <span class="badge">{{ compareList.length }}</span>
                    </a></RouterLink
                >
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'wishList' }"
                    ><a class="btn border mx-2">
                        <i class="fas fa-heart text-primary"></i>
                        <span class="badge">{{ wishlist.length }}</span>
                    </a></RouterLink
                >
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'cart' }"
                    ><a class="btn  border mx-2">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <template v-if="responseCartNumber">
                            <template v-if="responseCartNumber.cartItemNumber !== null">
                                <template v-if="responseCartNumber.cartItemNumber.cart_item_count > 0">
                                    <span class="badge">{{ responseCartNumber.cartItemNumber.cart_item_count }}</span>
                                </template>
                            </template>
                            <template v-else>
                                <span class="badge">0</span>
                            </template>
                        </template>

                    </a>
                </RouterLink
                >
            </div>
        </div>
    </div>
</template>
<style>

</style>