<script setup>
import { ref, reactive, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import useAxios from "../services/axios";
import useAlert from "../services/alert";
import useCart from "../services/cart";
import useWishlist from "../services/wishlist";
import useAuth from '../stores/Auth'
import useToken from '../services/token'
import { Carousel, Navigation, Slide } from "vue3-carousel";
import { storeToRefs } from "pinia";

import PageHeader from "../components/layouts/PageHeader.vue";

const { user, isAuthenticated } = storeToRefs(useAuth());

const route = useRoute();
const router = useRouter();
const errorData = ref();
const responseData = ref();
const productQuantity = ref(1);
const formData = reactive({
    rating: "",
    comment: "",
});

// Fetch specific product's details.
onMounted(() => {
    useAxios
        .get("/products/" + route.params.slug)
        .then((response) => {
            responseData.value = response.data;
            useAxios.get( "/products/view-count/" + responseData.value.product.id );
        });
});

// Store user review.
function addReview() {
    if (isAuthenticated.value) {
        useAxios
        .post("/users/review", {
            user_id: user.value.id,
            product_id: responseData.value.product.id,
            rating_value: formData.rating,
            comment: formData.comment,
        }, {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
        .then((response) => {
            formData.rating = "",
            formData.comment = "",
            errorData.value = null;

            useAlert().centerMessageAlert("success", response.data.status);
        })
        .catch((error) => {
            console.log(error.response);
            errorData.value = error.response.data.errors;
        });
    }else{
        router.push({name: 'login'})
    }
}

// Product quantity decrement.
function productQuantityDecrement() {
    if (productQuantity.value > 1) productQuantity.value--;
}

// Product quantity increment.
function productQuantityIncrement() {
    productQuantity.value++;
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="PRODUCTS DETAIL"></PageHeader>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div v-if="responseData" class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div
                    id="product-carousel"
                    class="carousel slide"
                    data-ride="carousel"
                >
                    <div class="carousel-inner border">
                        <template
                            v-for="(
                                image, key
                            ) in responseData.product.gallery.split(',')"
                            :key="key"
                        >
                            <div class="carousel-item active">
                                <img
                                    class="w-100 h-100"
                                    :src="image"
                                    alt="image"
                                />
                            </div>
                        </template>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#product-carousel"
                        data-slide="prev"
                    >
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#product-carousel"
                        data-slide="next"
                    >
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">
                    {{ responseData.product.name }}
                </h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <template
                            v-for="(rating, key) in Math.floor(
                                responseData.product.review_avg_rating_value
                            )"
                            :key="key"
                        >
                            <small class="fas fa-star"></small>
                        </template>
                        <template
                            v-if="
                                responseData.product.review_avg_rating_value !==
                                    null &&
                                !Number.isInteger(
                                    responseData.product.review_avg_rating_value
                                ) &&
                                responseData.product.review_avg_rating_value.charAt(
                                    responseData.product.review_avg_rating_value
                                        .length - 4
                                ) !== '0'
                            "
                        >
                            <small class="fas fa-star-half-alt"></small>
                        </template>
                        <template
                            v-for="(rating, key) in Math.floor(
                                5 - responseData.product.review_avg_rating_value
                            )"
                            :key="key"
                        >
                            <small class="far fa-star"></small>
                        </template>
                    </div>
                    <small class="pt-1"
                        >({{ responseData.product.review_count }})</small
                    >
                </div>

                <template v-if="responseData.product.offer !== null">
                    <template
                        v-if="
                            responseData.product.offer.discount !== null &&
                            responseData.product.offer.status !== 0 &&
                            responseData.product.offer.expire_date >
                                new Date().toISOString()
                        "
                    >
                        <h3 class="font-weight-semi-bold mb-4">
                            ${{
                                responseData.product.sale_price -
                                responseData.product.offer.discount
                            }}
                        </h3>
                        <h6 class="text-muted ml-2">
                            <del
                                >${{
                                    Number(responseData.product.sale_price)
                                }}</del
                            >
                        </h6>
                    </template>
                    <template v-else>
                        <h3 class="font-weight-semi-bold mb-4">
                            ${{ Number(responseData.product.sale_price) }}
                        </h3>
                    </template>
                </template>
                <template v-else>
                    <h3 class="font-weight-semi-bold mb-4">
                        ${{ Number(responseData.product.sale_price) }}
                    </h3>
                </template>

                <p class="mb-4">
                    {{ responseData.product.description.substring(0, 300) }}....
                </p>

                <div class="d-flex align-items-center mb-4 pt-2 ex-m">
                    <div class="input-group quantity mr-3" style="width: 130px">
                        <div class="input-group-btn">
                            <button
                                @click="productQuantityDecrement()"
                                class="btn btn-primary btn-minus"
                            >
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input
                            type="text"
                            class="form-control bg-secondary text-center"
                            v-model="productQuantity"
                        />
                        <div class="input-group-btn">
                            <button
                                @click="productQuantityIncrement()"
                                class="btn btn-primary btn-plus"
                            >
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button
                        @click="useCart().addCart(responseData.product.id)"
                        class="btn btn-primary px-3"
                    >
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                </div>
            </div>
        </div>

        <div class="row px-xl-5 mb-5">
            <div class="col">
                <div
                    class="nav nav-tabs justify-content-center border-secondary mb-4"
                >
                    <a
                        class="nav-item nav-link active"
                        data-toggle="tab"
                        href="#tab-pane-1"
                        >Description</a
                    >
                    <a
                        class="nav-item nav-link"
                        data-toggle="tab"
                        href="#tab-pane-2"
                        >Information</a
                    >
                    <a
                        class="nav-item nav-link"
                        data-toggle="tab"
                        href="#tab-pane-3"
                        >Reviews ({{ responseData.product.review_count }})</a
                    >
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>
                            {{ responseData.product.description }}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>
                            {{ responseData.product.specification }}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">
                                    {{ responseData.product.review_count }}
                                    review for {{ responseData.product.name }}
                                </h4>
                                <template
                                    v-for="(data, key) in responseData.product
                                        .review"
                                    :key="key"
                                >
                                    <div class="media mb-4">
                                        <div class="media-body">
                                            <h6>
                                                {{ data.user.name
                                                }}<small>
                                                    -
                                                    <i>{{
                                                        data.created_at
                                                    }}</i></small
                                                >
                                            </h6>
                                            <div class="text-primary mb-2">
                                                <template
                                                    v-for="(
                                                        rating, key
                                                    ) in Math.floor(
                                                        data.rating_value
                                                    )"
                                                    :key="key"
                                                >
                                                    <small
                                                        class="fas fa-star"
                                                    ></small>
                                                </template>
                                                <template
                                                    v-if="
                                                        data.rating_value !==
                                                            null &&
                                                        !Number.isInteger(
                                                            data.rating_value
                                                        ) &&
                                                        data.rating_value.charAt(
                                                            data.rating_value
                                                                .length - 4
                                                        ) !== '0'
                                                    "
                                                >
                                                    <small
                                                        class="fas fa-star-half-alt"
                                                    ></small>
                                                </template>
                                                <template
                                                    v-for="(
                                                        rating, key
                                                    ) in Math.floor(
                                                        5 - data.rating_value
                                                    )"
                                                    :key="key"
                                                >
                                                    <small
                                                        class="far fa-star"
                                                    ></small>
                                                </template>
                                            </div>
                                            <p>
                                                {{ data.comment }}
                                            </p>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>

                                <form @submit.prevent="addReview()">
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="form-group col-4">
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="name"
                                                placeholder="Max 5, Min 0"
                                                v-model="formData.rating"
                                                required
                                            />
                                        </div>
                                        <template v-if="errorData">
                                            <template
                                                v-if="errorData['rating_value']"
                                            >
                                                <small
                                                    v-if="
                                                        errorData[
                                                            'rating_value'
                                                        ][0]
                                                    "
                                                    class="error fw-lighter text-danger text-lg mx-3"
                                                    >{{
                                                        errorData[
                                                            "rating_value"
                                                        ][0]
                                                    }}</small
                                                >
                                            </template>
                                        </template>
                                    </div>
                                    <div class="form-group">
                                        <label for="message"
                                            >Your Review *</label
                                        >
                                        <textarea
                                            id="message"
                                            cols="30"
                                            rows="5"
                                            class="form-control"
                                            v-model="formData.comment"
                                            required
                                            name="comment"
                                        ></textarea>
                                        <template v-if="errorData">
                                            <template
                                                v-if="errorData['comment']"
                                            >
                                                <small
                                                    v-if="
                                                        errorData['comment'][0]
                                                    "
                                                    class="error fw-lighter text-danger text-lg mx-3"
                                                    >{{
                                                        errorData["comment"][0]
                                                    }}</small
                                                >
                                            </template>
                                        </template>
                                    </div>

                                    <div class="form-group mb-0 mb-4">
                                        <button class="btn btn-primary px-3">
                                            Leave Your Review
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Product Start -->
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Related Product</span>
            </h2>
        </div>
        <div v-if="responseData">
            <Carousel :items-to-show="5" :wrap-around="true">
                <Slide
                    v-for="(data, key) in responseData.relatedProducts"
                    :key="key"
                >
                    <div class="row px-xl-2 pb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                                >
                                    <img
                                        class="img-fluid w-100"
                                        :src="data.image"
                                        alt="image"
                                    />
                                </div>
                                <div
                                    class="card-body border-left border-right text-center p-0 pt-4 pb-3"
                                >
                                    <h6 class="text-truncate mb-3">
                                        {{ data.name }}
                                    </h6>
                                    <template v-if="data.offer !== null">
                                        <template
                                            v-if="
                                                data.offer.discount !== null &&
                                                data.offer.status !== 0 &&
                                                data.offer.expire_date >
                                                    new Date().toISOString()
                                            "
                                        >
                                            <template
                                                v-if="
                                                    data.offer.type ==
                                                    'Percentage'
                                                "
                                            >
                                                <h6 class="text-muted mr-4">
                                                    {{
                                                        Number(
                                                            data.offer.discount
                                                        )
                                                    }}% <small>off</small>
                                                </h6>
                                                <h6>
                                                    ${{
                                                        Number(data.sale_price)
                                                    }}
                                                </h6>
                                            </template>
                                            <template v-else>
                                                <h6 class="mr-4">
                                                    ${{
                                                        Number(
                                                            data.offer.discount
                                                        )
                                                    }}
                                                </h6>
                                                <h6 class="text-muted ml-2">
                                                    <del
                                                        >${{
                                                            Number(
                                                                data.sale_price
                                                            )
                                                        }}</del
                                                    >
                                                </h6>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <h6>
                                                ${{ Number(data.sale_price) }}
                                            </h6>
                                        </template>
                                    </template>
                                    <template v-else>
                                        <h6>${{ Number(data.sale_price) }}</h6>
                                    </template>
                                </div>
                                <div
                                    class="card-footer d-flex justify-content-between bg-light border d-flex justify-content-around"
                                >
                                    <button
                                        @click="
                                            useWishlist().addWishlist({
                                                id: data.id,
                                                name: data.name,
                                                image: data.image,
                                                salePrice: data.sale_price,
                                            })
                                        "
                                        class="btn btn-sm text-dark p-0"
                                    >
                                        <i
                                            class="fas fa-heart text-primary mr-1"
                                        ></i>
                                    </button>
                                    <button
                                        @click="
                                            useCart().addCart(
                                                responseData.product.id
                                            )
                                        "
                                        class="btn btn-sm text-dark p-0"
                                    >
                                        <i
                                            class="fas fa-shopping-cart text-primary mr-1"
                                        ></i>
                                    </button>
                                    <button
                                        @click="useAddToCompare(data.id)"
                                        class="btn btn-sm text-dark p-0"
                                    >
                                        <i
                                            class="fas fa-balance-scale text-primary"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                    <RouterLink
                                        style="
                                            text-decoration: none;
                                            color: inherit;
                                        "
                                        :to="{
                                            name: 'products',
                                            params: { slug: data.slug },
                                        }"
                                        ><a
                                            href=""
                                            class="btn btn-sm text-dark p-0"
                                            ><i
                                                class="fas fa-eye text-primary mr-1"
                                            ></i
                                        ></a>
                                    </RouterLink>
                                </div>
                            </div>
                        </div>
                    </div>
                </Slide>
                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div>
        <!-- Related Product End -->
    </div>
    <!-- Shop Detail End -->
</template>
