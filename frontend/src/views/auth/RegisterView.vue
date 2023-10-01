<script setup>
import { reactive, ref } from 'vue'
import axios from 'axios';
import { RouterLink, useRouter } from "vue-router";
import PageHeader from '../../components/layouts/PageHeader.vue'

const router = useRouter();
const errorData = ref();
const formData = reactive({
    name: 'mailbox',
    email: 'mailbox.amirul@gmail.com',
    password: '12345678',
    password_confirmation: '12345678'
});

//Register new user.
function register() {
    axios.post('/register', {
        'name': formData.name,
        'email': formData.email,
        'password': formData.password,
        'password_confirmation': formData.password_confirmation,
    })
        .then(response => {
            errorData.value = null
            router.push({ name: 'login' })
        })
        .catch(error => {
            errorData.value = error.response.data.errors
        });
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="Register"></PageHeader>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-7 m-auto">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">
                            Create your Account
                        </h3>
                    </div>
                    <div class="panel-body p-3">
                        <form method="POST" @submit.prevent="register">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" v-model="formData.name" placeholder="Enter your Full Name" required />
                                </div>
                                <template v-if="errorData">
                                    <template v-if="errorData['name']">
                                        <small v-if="errorData['name'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['name'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-envelope p-2"></span>
                                    <input type="email" v-model="formData.email"  placeholder="Enter your Email" required />
                                </div>
                                <template v-if="errorData">
                                    <template v-if="errorData['email']">
                                        <small v-if="errorData['email'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['email'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" v-model="formData.password"  placeholder="Enter your Password" required />
                                    <button disabled class="btn bg-white text-muted">
                                        <span class="far fa-eye-slash"></span>
                                    </button>
                                </div>
                                <template v-if="errorData">
                                    <template v-if="errorData['password']">
                                        <small v-if="errorData['password'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['password'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" v-model="formData.password_confirmation"  placeholder="Confirm your Password" required />
                                    <button disabled class="btn bg-white text-muted">
                                        <span class="far fa-eye-slash"></span>
                                    </button>
                                </div>
                                <template v-if="errorData">
                                    <template v-if="errorData['password_confirmation']">
                                        <small v-if="errorData['password_confirmation'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['password_confirmation'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <button class="btn btn-primary btn-block mt-3" type="submit">
                                Create Account
                            </button>
                            <div class="text-center pt-4 text-muted">
                                Have an account?
                                <RouterLink style="text-decoration: none; color: inherit;" :to="{ name: 'login' }"
                                                    ><a>Login</a>
                                        </RouterLink>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</template>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    height: 100vh;
}

.container {
    margin: 50px auto;
}

.panel-heading {
    text-align: center;
    margin-bottom: 10px;
}

#forgot {
    min-width: 100px;
    margin-left: auto;
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

.form-inline label {
    padding-left: 10px;
    margin: 0;
    cursor: pointer;
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 15px;
}

.panel {
    min-height: 380px;
    box-shadow: 10px 10px 20px rgb(218, 218, 218) !important;
    border-radius: 12px;
    box-shadow: 11px 12px 54px -10px rgba(0,0,0,0.84);

}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%;
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none;
}

img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative;
}

a[target="_blank"] {
    position: relative;
    transition: all 0.1s ease-in-out;
}

.bordert {
    border-top: 1px solid #aaa;
    position: relative;
}

.bordert:after {
    content: "Or, sign up with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px;
}

@media (max-width: 360px) {
    #forgot {
        margin-left: 0;
        padding-top: 10px;
    }

    body {
        height: 100%;
    }

    .container {
        margin: 30px 0;
    }

    .bordert:after {
        left: 25%;
    }
}
</style>
