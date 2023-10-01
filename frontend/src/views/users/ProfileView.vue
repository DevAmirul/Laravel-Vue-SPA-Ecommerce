<script setup>
import { reactive, ref, watchEffect } from "vue";
import useAxios from "../../services/axios";
import PageHeader from "../../components/layouts/PageHeader.vue";
import useAlert from "../../services/alert";
import useAuth from "../../stores/Auth";
import { storeToRefs } from "pinia";
import useToken from "../../services/token";
import { useRouter } from 'vue-router';

const router = useRouter;

const { user, isAuthenticated } = storeToRefs(useAuth());

const isChangedPass = ref(false);
const errorData = ref();
const responseData = reactive({
    name: "",
    email: "",
    phone: "",
    city: "",
    state: "",
    address: "",
    address_2: "",
    zip_code: "",
    password: null,
    password_confirmation: null,
});

// Update user profile.
function update() {
    useAxios
        .put(
            "/users/profiles/" + responseData.id,
            {
                name: responseData.name,
                email: responseData.email,
                city: responseData.city,
                phone: responseData.phone,
                address: responseData.address,
                address_2: responseData.address_2,
                state: responseData.state,
                zip_code: responseData.zip_code,
                password: responseData.password,
                password_confirmation: responseData.password_confirmation,
            },
            {
                headers: { Authorization: "Bearer " + useToken().getToken() },
            }
        )
        .then((response) => {
            errorData.value = null;
            useAlert().centerMessageAlert("success", response.data.message);
        })
        .catch((error) => {
            errorData.value = error.response.data.errors;
        });
}

// Fetch user's details.
watchEffect(() => {
    if (isAuthenticated.value) {
        useAxios
            .get("/users/profiles/" + user.value.id, {
                headers: { Authorization: "Bearer " + useToken().getToken() },
            })
            .then((response) => {
                responseData.id = response.data.user.id;
                responseData.name = response.data.user.name;
                responseData.email = response.data.user.email;
                responseData.phone = response.data.user.billing_detail.phone;
                responseData.city = response.data.user.billing_detail.city;
                responseData.state = response.data.user.billing_detail.state;
                responseData.address = response.data.user.billing_detail.address;
                responseData.address_2 = response.data.user.billing_detail.address_2;
                responseData.zip_code = response.data.user.billing_detail.zip_code;
                responseData.orders = response.data.user.order_count;
                responseData.review = response.data.user.review_count;
            })
            .catch((error) => {
                router.push({name: 'serverError'});
            });
    }
});
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="MY PROFILE"></PageHeader>
    <!-- Page Header End -->
    <!-- Checkout Start -->
    <div v-if="responseData" class="container my-5">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex flex-column align-items-center text-center"
                            >
                                <div class="mt-3">
                                    <h4 class="text-primary mb-1">
                                        {{ responseData.name }}
                                    </h4>
                                    <p class="text-muted font-size-sm">
                                        {{ responseData.phone }}
                                    </p>
                                    <p class="text-muted font-size-sm">
                                        {{ responseData.email }}
                                    </p>
                                    <p class="text-muted font-size-sm">
                                        {{ responseData.address }}
                                    </p>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">My Orders:</h6>
                                    <span class="text-primary">{{
                                        responseData.orders
                                    }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">My Review:</h6>
                                    <span class="text-primary">{{
                                        responseData.review
                                    }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.name"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['name']">
                                            <small
                                                v-if="errorData['name'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["name"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.email"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['email']">
                                            <small
                                                v-if="errorData['email'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["email"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.phone"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['phone']">
                                            <small
                                                v-if="errorData['phone'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["phone"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.state"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['state']">
                                            <small
                                                v-if="errorData['state'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["state"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.city"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['city']">
                                            <small
                                                v-if="errorData['city'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["city"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Zip Code</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.zip_code"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['zip_code']">
                                            <small
                                                v-if="errorData['zip_code'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["zip_code"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.address"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['address']">
                                            <small
                                                v-if="errorData['address'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["address"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address 2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="responseData.address_2"
                                    />
                                </div>
                                <template v-if="errorData">
                                    <template v-if="errorData['address_2']">
                                        <small
                                            v-if="errorData['address_2'][0]"
                                            class="error fw-lighter text-danger text-lg mx-3"
                                            >{{
                                                errorData["address_2"][0]
                                            }}</small
                                        >
                                    </template>
                                </template>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3"></div>
                                <div
                                    class="col-sm-9 text-secondary d-flex justify-content-between"
                                >
                                    <button
                                        @click="isChangedPass = !isChangedPass"
                                        class="btn btn-small btn-outline-primary"
                                    >
                                        Change Password
                                        <i
                                            class="fa fa-arrow-down"
                                            aria-hidden="true"
                                        ></i>
                                    </button>

                                    <button
                                        v-show="!isChangedPass"
                                        @click="update()"
                                        class="btn btn-primary"
                                    >
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="isChangedPass" class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="password"
                                        class="form-control"
                                        placeholder="********"
                                        v-model="responseData.password"
                                        name="password"
                                    />
                                    <template v-if="errorData">
                                        <template v-if="errorData['password']">
                                            <small
                                                v-if="errorData['password'][0]"
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData["password"][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="password"
                                        class="form-control"
                                        placeholder="********"
                                        v-model="
                                            responseData.password_confirmation
                                        "
                                        name="password_confirmation"
                                    />
                                    <template v-if="errorData">
                                        <template
                                            v-if="
                                                errorData[
                                                    'password_confirmation'
                                                ]
                                            "
                                        >
                                            <small
                                                v-if="
                                                    errorData[
                                                        'password_confirmation'
                                                    ][0]
                                                "
                                                class="error fw-lighter text-danger text-lg mx-3"
                                                >{{
                                                    errorData[
                                                        "password_confirmation"
                                                    ][0]
                                                }}</small
                                            >
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button
                                        @click="update()"
                                        class="btn btn-primary"
                                    >
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
</template>
<style scoped>
.card {
    margin-top: 20px;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0.25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%),
        0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: 0.5rem !important;
}
</style>
