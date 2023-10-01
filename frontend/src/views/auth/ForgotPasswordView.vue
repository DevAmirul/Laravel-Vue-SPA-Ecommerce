<script setup>
import { reactive, ref } from 'vue'
import useAlert from '../../services/alert';
import axios from 'axios';
import PageHeader from '../../components/layouts/PageHeader.vue'

const errorData = ref();
const formData = reactive({
    email: 'mailbox.amirul@gmail.com'
});

// Send reset link.
function sendResetLink() {
    axios.post('/forgot-password', {
        'email': formData.email
    })
        .then(response => {
            errorData.value = null
            formData.email = ''
            useAlert().topAlert('success', response.data.status)
        })
        .catch(error => {
            errorData.value = error.response.data.errors
        });
}
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="FORGOT PASSWORD"></PageHeader>
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-7 m-auto">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Request New Password</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form method="POST" @submit.prevent="sendResetLink()">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input v-model="formData.email"
                                        type="email"
                                        placeholder="Enter your Email"
                                        required
                                    />
                                </div>
                                <template v-if="errorData">
                                    <template v-if="errorData['email']">
                                        <small v-if="errorData['email'][0]" class=" error fw-lighter text-danger text-lg mx-3" >{{ errorData['email'][0] }}</small>
                                    </template>
                                </template>
                            </div>
                            <button class="btn btn-primary btn-block mt-3" type="submit"> Send
                                </button>
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
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
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
    content: "or connect with";
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
