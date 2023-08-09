<script setup>
import { ref, watch } from 'vue';
import PageHeader from '../../components/layouts/PageHeader.vue'

let isRenderPage = ref(true)

let wishlist =  ref(JSON.parse(localStorage.getItem('productAttributes')));

function deleteWishlist(productId) {
    isRenderPage.value = false;
    let ifExistLocalStorageData = localStorage.getItem('productAttributes');
    if (ifExistLocalStorageData) {
        ifExistLocalStorageData = JSON.parse(localStorage.getItem('productAttributes'))
        let index;
        for (let i = 0; i < ifExistLocalStorageData.length; i++) {
            if (ifExistLocalStorageData[i].id == productId) {
                index =ifExistLocalStorageData.splice(i, 1);
                localStorage.setItem("productAttributes", JSON.stringify(ifExistLocalStorageData))
                break;
            }
        }
    }
}

watch(isRenderPage, () => {
    wishlist.value = JSON.parse(localStorage.getItem('productAttributes'))
    isRenderPage.value = true;
})

</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="WISHLIST"></PageHeader>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div v-if="Array.isArray(wishlist) && isRenderPage" class="container-fluid pt-5">
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
                                        <button class="btn btn-sm btn-primary mx-2">Add to card <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
