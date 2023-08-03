<script setup>

import Footer from '../components/layouts/Footer.vue'
</script>
<template>
    <template>
    <!-- Topbar Start -->
    <!-- Topbar End -->
    <!-- Page Header Start -->
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- Footer Start -->
    <Footer></Footer>
    <!-- Footer End -->
</template>
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
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
    border-radius: 12px;
    box-shadow: 11px 12px 54px -10px rgba(0, 0, 0, 0.84);
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