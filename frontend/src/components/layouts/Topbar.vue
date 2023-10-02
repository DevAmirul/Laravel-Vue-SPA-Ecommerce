<script setup>
import { onMounted, ref, watch } from "vue";
import { RouterLink,useRouter } from "vue-router";
import axios_C from '../../services/axios';
import useRefresh from '../../stores/Refresh';
import { storeToRefs } from "pinia";
import useAuth from '../../stores/Auth';
import useToken from '../../services/token';


const { logo } = defineProps(['logo'])
const { user, isAuthenticated } = storeToRefs(useAuth());
const { refreshCartItemsNumber, refreshWishlistItemsNumber, refreshCompareItemsNumber } = storeToRefs(useRefresh());
const router = useRouter();
const topBarSearch = ref();
const cartItemsNumber = ref();
const compareList = ref();
const wishlist = ref();

// Count wish list and comparison list.
onMounted(() => {
    wishlist.value = JSON.parse(localStorage.getItem('productAttributes'));
    compareList.value = JSON.parse(localStorage.getItem('compare'));
} )

// Push the search keyword to the path of the search router.
watch(topBarSearch, () => {
    router.push({ name: 'search', params: { search: topBarSearch.value } })
})

// Recalculate the compare list when the user updates or deletes the compare list.
watch(refreshCompareItemsNumber, () => {
    compareList.value = JSON.parse(localStorage.getItem('compare'));
})

// Recalculate the wishlist when the user updates or deletes the wishlist.
watch(refreshWishlistItemsNumber, () => {
    wishlist.value = JSON.parse(localStorage.getItem('productAttributes'));
})

// Recalculate the cart's items when the user updates or deletes the cart's items.
watch(refreshCartItemsNumber, () => {
    cartCount();
})

// Count cart items if user is logged in.
watch(isAuthenticated, () => {
    cartCount();
})

function cartCount() {
    if (isAuthenticated.value) {
        axios_C.get('/users/cart/count/' + user.value.id, {
            headers: { Authorization: 'Bearer ' + useToken().getToken('auth_token') }
        })
            .then(response => {
                cartItemsNumber.value = response.data;
            })
    }else{
        cartItemsNumber.value = null;
    }
}
</script>
<template>
    <div class="container-fluid top-bg-color">
        <div class="row align-items-center py-3 px-xl-5 m-auto">
            <div class="col-lg-3 d-none d-lg-block ">
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'home' }"
                    ><a class="text-decoration-none">
                        <img :src="logo" alt="logo" style="height: 90px;">
                    </a>
                </RouterLink
                >
            </div>
            <div class="col-lg-6 col-6 text-left search-round">
                <form  @submit.prevent>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            v-model.lazy="topBarSearch"
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
                            <template v-if="compareList">
                                <span class="badge">{{ compareList.length }}</span>
                            </template>
                            <template v-else>
                                <span class="badge">0</span>
                            </template>
                    </a></RouterLink
                >
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'wishList' }"
                    ><a class="btn border mx-2">
                        <i class="fas fa-heart text-primary"></i>

                        <template v-if="wishlist">
                            <template v-if="wishlist.length > 0">
                                <span class="badge">{{ wishlist.length }}</span>
                            </template>
                            <template v-else>
                                <span class="badge">0</span>
                            </template>
                        </template>
                        <template v-else>
                            <span class="badge">0</span>
                        </template>

                    </a></RouterLink
                >
                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'cart' }"
                    ><a class="btn  border mx-2">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <template v-if="cartItemsNumber">
                            <template v-if="cartItemsNumber.cartItemNumber !== null">
                                <template v-if="cartItemsNumber.cartItemNumber.cart_item_count > 0">
                                    <span class="badge">{{ cartItemsNumber.cartItemNumber.cart_item_count }}</span>
                                </template>
                                <template v-else>
                                    <span class="badge">0</span>
                                </template>
                            </template>
                            <template v-else>
                                <span class="badge">0</span>
                            </template>
                        </template>
                        <template v-else>
                            <span class="badge">0</span>
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