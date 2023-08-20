<script setup>
import { ref, watch } from 'vue';
import axios_C from '../../services/axios';
import PageHeader from '../../components/layouts/PageHeader.vue'
import useRefresh from '../../stores/Refresh';
import { storeToRefs } from "pinia";

const { refreshCartItemsNumber, refreshWishlistPage, refreshWishlistItemsNumber } = storeToRefs(useRefresh());
const wishlist = ref();

wishlist.value =  JSON.parse(localStorage.getItem('productAttributes'));

watch(refreshWishlistPage, () => {
    wishlist.value = JSON.parse(localStorage.getItem('productAttributes'));
})

function deleteWishlist(productId) {
    let ifExistLocalStorageData = localStorage.getItem('productAttributes');
    if (ifExistLocalStorageData) {
        ifExistLocalStorageData = JSON.parse(localStorage.getItem('productAttributes'))
        for (let i = 0; i < ifExistLocalStorageData.length; i++) {
            if (ifExistLocalStorageData[i].id == productId) {
                ifExistLocalStorageData.splice(i, 1);
                localStorage.setItem("productAttributes", JSON.stringify(ifExistLocalStorageData))
                refreshWishlistPage.value = !refreshWishlistPage.value
                refreshWishlistItemsNumber.value = !refreshWishlistItemsNumber.value
                break;
            }
        }
    }
}

function addToCart(productId) {
    let query;
    query = encodeURIComponent([productId]);
    deleteWishlist(productId)
    axios_C.get('/users/cart/save/?productId=' + query + '&user=2')
        .then(response => {
            console.log(response.data)
            refreshCartItemsNumber.value = !refreshCartItemsNumber.value
        })
        .catch(error => {
            console.log(error);
        });
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="WISHLIST"></PageHeader>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div v-if="wishlist" class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark ">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                            <template v-for="(data, key) in wishlist" :key="key">
                                <tr>
                                    <td class="align-middle"><img :src="data.image" alt="image" style="width: 50px;"></td>
                                    <td class="align-middle">{{ data.name }}</td>
                                    <td class="align-middle">{{ data.salePrice }}</td>
                                    <td class="align-middle"><button @click="deleteWishlist(data.id)" class="btn btn-sm btn-primary mx-2"><i class="fa fa-times"></i></button>
                                        <button @click="addToCart(data.id)" class="btn btn-sm btn-primary mx-2">Add to card <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </template>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Cart End -->

</template>
