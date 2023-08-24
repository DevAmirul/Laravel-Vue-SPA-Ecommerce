<script setup>
import { onMounted, ref, watch } from 'vue';
import useAxios from '../../services/axios';
import PageHeader from '../../components/layouts/PageHeader.vue'
import useRefresh from '../../stores/Refresh';
import { storeToRefs } from "pinia";
import useAlert from "../../services/Sweetalert";

const { refreshCartItemsNumber, refreshWishlistPage, refreshWishlistItemsNumber } = storeToRefs(useRefresh());

const wishlist = ref();

onMounted(() => {
    wishlist.value =  JSON.parse(localStorage.getItem('productAttributes'));
    if (wishlist.value.length == 0) useAlert().centerDialogAlert('info', 'Your wishlist is empty')
} )

watch(refreshWishlistPage, () => {
    wishlist.value = JSON.parse(localStorage.getItem('productAttributes'));
    if (wishlist.value.length  == 0 ) useAlert().centerDialogAlert('info', 'Your wishlist is empty')
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
                useAlert().centerMessageAlert('success', 'Successfully deleted item to wishlist')
                break;
            }
        }
    }
}

function addToCart(productId) {
    let query;
    query = encodeURIComponent([productId]);
    deleteWishlist(productId)
    useAxios.get('/users/cart/save/?productId=' + query + '&user=2')
        .then(response => {
            console.log(response.data)
            refreshCartItemsNumber.value = !refreshCartItemsNumber.value
            useAlert().centerMessageAlert('success', 'Successfully added to cart')
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
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
