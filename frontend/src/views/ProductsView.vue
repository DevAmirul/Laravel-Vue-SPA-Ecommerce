<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import useAxios from '../services/axios';
import useAlert from '../services/Sweetalert';
import { storeToRefs } from "pinia";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import PageHeader from "../components/layouts/PageHeader.vue";

const route = useRoute();
let responseData = ref();
const attribute = ref({ color:{},size:{} });
let productQuantity = ref(1)
const formData = reactive({
    rating: '',
    comment: '',
});

function addReview() {
    useAxios.post('/users/review', {
        data: {
            "product_id": responseData.value.product[0].id,
            "user_id": 2,
            "rating_value": formData.rating,
            "comment": formData.comment
        }
    })
        .then(response => {
            useAlert().centerMessageAlert('info', response.data.message)
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}

function productQuantityDecrement(){
    if (productQuantity.value > 1) productQuantity.value--
}

function productQuantityIncrement(){
    productQuantity.value++
}



onMounted(() => {
    useAxios.get('/products/' + route.params.slug)
        .then(response => {
            responseData.value = response.data;
        })
        .catch(error => {
            // console.log(error);
        });
} )

function addToCart(productId) {
    useAxios.get('/users/cart/save/?productId=' + productId + '&user=2')
        .then(response => {
            useAlert().centerMessageAlert('success', 'Successfully added to cart')
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
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
                                <template v-for="(image, key) in responseData.product[0].gallery.split(',')" :key="key">
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
                        <h3 class="font-weight-semi-bold">{{ responseData.product[0].name }}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <template v-for= "(rating, key) in Math.floor(responseData.product[0].review_avg_rating_value)" :key="key">
                                    <small class="fas fa-star"></small>
                                </template>
                                <template v-if="responseData.product[0].review_avg_rating_value !== null && !Number.isInteger(responseData.product[0].review_avg_rating_value) && (responseData.product[0].review_avg_rating_value.charAt(responseData.product[0].review_avg_rating_value.length - 4) !== '0')">
                                    <small class="fas fa-star-half-alt"></small>
                                </template>
                                <template v-for= "(rating, key) in Math.floor(5 - responseData.product[0].review_avg_rating_value)" :key="key">
                                        <small class="far fa-star"></small>
                                </template>
                            </div>
                            <small class="pt-1">({{ responseData.product[0].review_count }})</small>
                        </div>
                        <template v-if="responseData.product[0].discount_price.discount > 0" >
                            <h3 class="font-weight-semi-bold mb-4">${{ responseData.product[0].sale_price - responseData.product[0].discount_price.discount }}.00</h3>
                            <h6 class="text-muted ml-2">
                                <del>${{ responseData.product[0].sale_price }}</del>
                            </h6>
                        </template>
                        <template v-else>
                            <h3 class="font-weight-semi-bold mb-4">${{ responseData.product[0].sale_price }}</h3>
                        </template>
                        <p class="mb-4">
                            {{ responseData.product[0].description.substring(0, 300) }}....
                        </p>

                            <div class="d-flex mb-3 mt-3">
                                <p class="text-dark font-weight-medium mb-0 mr-3">{{ responseData.product[0].product_attribute[0].attribute_name }}:</p>
                                <form>
                                    <template v-for="(data, key) in responseData.product[0].product_attribute[0].attribute_values.split(',')" :key="key">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input
                                                type="radio"
                                                class="custom-control-input"
                                                :id="key + data"
                                                :value="data"
                                                v-model="attribute.size"
                                            />
                                            <label class="custom-control-label" :for="key + data"
                                                >{{ data }}</label>
                                        </div>
                                    </template>
                                </form>
                            </div>
                            <div class="d-flex mb-3 mt-3">
                                <p class="text-dark font-weight-medium mb-0 mr-3">{{ responseData.product[0].product_attribute[1].attribute_name }}:</p>
                                <form>
                                    <template v-for="(data, key) in responseData.product[0].product_attribute[1].attribute_values.split(',')" :key="key">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input
                                                type="radio"
                                                class="custom-control-input"
                                                :id="key + data"
                                                :value="data"
                                                v-model="attribute.color"
                                            />
                                            <label class="custom-control-label" :for="key + data"
                                                >{{ data }}</label>
                                        </div>
                                    </template>
                                </form>
                            </div>

                        <div class="d-flex align-items-center mb-4 pt-2 ex-m">
                            <div class="input-group quantity mr-3" style="width: 130px">
                                <div class="input-group-btn">
                                    <button @click="productQuantityDecrement()" class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input
                                    type="text"
                                    class="form-control bg-secondary text-center"
                                    v-model="productQuantity"
                                />
                                <div class="input-group-btn">
                                    <button @click="productQuantityIncrement()" class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button @click="addToCart(responseData.product[0].id)" class="btn btn-primary px-3">
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
                            >Reviews ({{ responseData.product[0].review_count }})</a
                        >
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>
                                {{ responseData.product[0].description }}
                            </p>

                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>
                                {{ responseData.product[0].specification }}
                            </p>

                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">
                                        {{ responseData.product[0].review_count }} review for {{ responseData.product[0].name }}
                                    </h4>
                                    <template v-for="(data, key) in responseData.product[0].review" :key="key">
                                        <div class="media mb-4">
                                            <div class="media-body">
                                                <h6>
                                                    {{ data.user.name }}<small>
                                                        -  <i>{{ data.created_at }}</i></small
                                                    >
                                                </h6>
                                                <div class="text-primary mb-2">
                                                    <template v-for= "(rating, key) in Math.floor(data.rating_value)" :key="key">
                                                        <small class="fas fa-star"></small>
                                                    </template>
                                                    <template v-if="data.rating_value !== null && !Number.isInteger(data.rating_value) && (data.rating_value.charAt(data.rating_value.length - 4) !== '0')">
                                                        <small class="fas fa-star-half-alt"></small>
                                                    </template>
                                                    <template v-for= "(rating, key) in Math.floor(5 - data.rating_value)" :key="key">
                                                            <small class="far fa-star"></small>
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
                                    <small
                                        >Your email address will not be published.
                                        Required fields are marked *</small
                                    >
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
                                                    />
                                            </div>
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
                                            ></textarea>
                                        </div>

                                        <div class="form-group mb-0 mb-4">
                                            <button class="btn btn-primary px-3">Leave Your Review</button>
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
                <Slide v-for="(data, key) in responseData.relatedProducts" :key="key">
                    <div class="row px-xl-2 pb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 pb-1">
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
                                        <button @click="addToWishlist({ id: data.p_id, name: data.name, image: data.image, salePrice: data.sale_price })" class="btn btn-sm text-dark p-0"><i
                                                    class="fas fa-heart text-primary mr-1"></i></button>
                                        <button @click="addToCart()" class="btn btn-sm text-dark p-0">
                                            <i
                                                    class="fas fa-shopping-cart text-primary mr-1"></i>
                                        </button>
                                        <button @click="addToCompare(data.p_id)" class="btn btn-sm text-dark p-0">
                                                        <i class="fas fa-balance-scale text-primary" aria-hidden="true"></i>
                                        </button>
                                        <RouterLink
                                                    style="text-decoration: none; color: inherit"
                                                    :to="{ name: 'products', params: { slug: data.slug } }"
                                                    ><a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i></a>
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
