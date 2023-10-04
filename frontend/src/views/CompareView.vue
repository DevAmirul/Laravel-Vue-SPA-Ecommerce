<script setup>
import { onMounted, ref } from "vue";
import useAxios from "../services/axios";
import useAlert from "../services/alert";
import PageHeader from "../components/layouts/PageHeader.vue";
import useRefresh from "../stores/Refresh";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";

const { refreshCompareItemsNumber, refreshComparePage } = storeToRefs( useRefresh() );
const router = useRouter();
const responseData = ref();
const compareList = ref();

// Fetch products by ID stored in local storage.
onMounted(() => {
    compareList.value = JSON.parse(localStorage.getItem("compare"));

    if (compareList.value) {
        useAxios
            .post("/compare", {
                data: {
                    productIdArray: compareList.value,
                },
            })
            .then((response) => {
                responseData.value = response.data;
            });
    } else {
        useAlert().centerDialogAlert("info", "Your compare list is empty")
            .then((result) => {
                router.back();
            });
    }
});

// Clear comparison product IDs stored in local storage.
function clearCompareList() {
    localStorage.removeItem("compare");
    responseData.value = null;
    refreshCompareItemsNumber.value = !refreshCompareItemsNumber.value;
    useAlert().topAlert("info", "The comparison list is empty");
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
                <div
                    :class="[
                        compareList.length == 3 ? 'col-lg-4' : 'col-lg-6',
                        'mb-5',
                    ]"
                >
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
                            <template
                                v-for="(number, key) in Math.floor(
                                    data.review_avg_rating_value
                                )"
                                :key="key"
                            >
                                <small class="fas fa-star"></small>
                            </template>
                            <template
                                v-if="
                                    !Number.isInteger(
                                        data.review_avg_rating_value
                                    ) &&
                                    data.review_avg_rating_value !== null &&
                                    data.review_avg_rating_value.charAt(
                                        data.review_avg_rating_value.length - 4
                                    ) !== '0'
                                "
                            >
                                <small class="fas fa-star-half-alt"></small>
                            </template>
                            <template
                                v-for="(number, key) in Math.floor(
                                    5 - data.review_avg_rating_value
                                )"
                                :key="key"
                            >
                                <small class="far fa-star"></small>
                            </template>
                        </div>
                        <small class="pt-1">({{ data.review_count }})</small>
                    </div>
                    <template v-if="data.offer !== null">
                        <template
                            v-if="
                                data.offer.discount !== null &&
                                data.offer.status !== 0 &&
                                data.offer.expire_date >
                                    new Date().toISOString()
                            "
                        >
                            <template v-if="data.type == 'Percentage'">
                                <h5>${{ Number(data.sale_price) }}</h5>
                                <h5 class="text-muted mr-4">
                                    {{ Number(data.discount) }}%
                                    <small>off</small>
                                </h5>
                            </template>
                            <template v-else>
                                <h5 class="font-weight-semi-bold mb-4">
                                    <del
                                        ><small
                                            >${{
                                                Number(data.sale_price)
                                            }}</small
                                        ></del
                                    >
                                    ${{
                                        Number(
                                            data.sale_price -
                                                data.offer.discount
                                        )
                                    }}
                                </h5>
                            </template>
                        </template>
                        <template v-else>
                            <h5 class="text-muted ml-2">
                                ${{ Number(data.sale_price) }}
                            </h5>
                        </template>
                    </template>
                    <template v-else>
                        <h5 class="text-muted ml-2">
                            ${{ Number(data.sale_price) }}
                        </h5>
                    </template>
                    <h4 class="mb-3">Description</h4>
                    <p>{{ data.description.substring(0, 250) }}...</p>
                    <h4 class="mb-3">Additional Information</h4>
                    <p>
                        {{ data.specification }}
                    </p>
                </div>
            </template>
            <button @click="clearCompareList()" class="btn btn-primary m-auto">
                Clear Compare List
            </button>
        </div>
    </div>
    <!-- Contact End -->
</template>
