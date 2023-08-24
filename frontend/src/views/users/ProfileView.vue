<script setup>
import { onMounted, reactive, ref } from 'vue'
import useAxios from '../../services/axios';
import PageHeader from "../../components/layouts/PageHeader.vue";
import useAlert from "../../services/Sweetalert";

const isChangedPass = ref(false);
const responseData = reactive({
    name: '',
    email: '',
    phone: '',
    city: '',
    state: '',
    address: '',
    address_2: '',
    zip_code: '',
    password: '',
    confirm_password: '',
});

onMounted(() => {
    useAxios.get('/users/profiles/4')
        .then(response => {
            responseData.id = response.data.user.id
            responseData.name = response.data.user.name
            responseData.email = response.data.user.email
            responseData.phone = response.data.user.billing_detail.phone
            responseData.city = response.data.user.billing_detail.city
            responseData.state = response.data.user.billing_detail.state
            responseData.address = response.data.user.billing_detail.address
            responseData.address_2 = response.data.user.billing_detail.address_2
            responseData.zip_code = response.data.user.billing_detail.zip_code
            responseData.orders = response.data.user.order_count
            responseData.review = response.data.user.review_count
        })
        .catch(error => {
            // console.log(error);
        });
} )

function save(){
    useAxios.put('/users/profiles/' + responseData.id, {
        data: {
            "name": responseData.name,
            "email": responseData.email,
            "city": responseData.city,
            "phone": responseData.phone,
            "address": responseData.address,
            "address_2": responseData.address_2,
            "state": responseData.state,
            "zip_code": responseData.zip_code,
            "password": responseData.password,
            "confirm_password": responseData.confirm_password
        }
    })
    .then(response => {
        useAlert().centerMessageAlert('success', 'Successfully updated profile')
    })
    .catch(error => {
        useAlert().topAlert('error', error.response.data.message, 'bottom-end')
    });
}

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

                                    <h4 class="text-primary mb-1">{{ responseData.name }}</h4>
                                    <p class="text-muted font-size-sm">{{ responseData.phone }}</p>
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
                                    <span class="text-primary">{{ responseData.orders }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">My Review:</h6>
                                    <span class="text-primary">{{ responseData.review }}</span>
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
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary d-flex justify-content-between">
                                    <button @click="isChangedPass = !isChangedPass" class="btn btn-small btn-outline-primary">Change Password <i class="fa fa-arrow-down" aria-hidden="true"></i></button>

                                    <button v-show="!isChangedPass" @click="save()" class="btn btn-primary">Save Changes</button>
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
                                        type="text"
                                        class="form-control"
                                        placeholder="********"
                                        v-model="responseData.password"
                                        name="password"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="********"
                                        v-model="responseData.confirm_password"
                                        name="confirm_password"
                                    />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button @click="save()" class="btn btn-primary">Save Changes</button>
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
