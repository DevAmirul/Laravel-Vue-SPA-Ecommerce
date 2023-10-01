<script setup>
import { ref, reactive, onMounted } from "vue";
import useAxios from "../services/axios";
import useAlert from "../services/alert";
import PageHeader from "../components/layouts/PageHeader.vue";

const responseData = ref();
const errorData = ref();
const formData = reactive({
    name: "",
    email: "",
    subject: "",
    message: "",
});

// Send contact messages to editors.
function sendMessage() {
    useAxios.post("/contacts", {
            name: formData.name,
            email: formData.email,
            subject: formData.subject,
            message: formData.message,
        })
        .then((response) => {
            formData.name = "";
            formData.email = "";
            formData.subject = "";
            formData.message = "";
            errorData.value = null;
            useAlert().centerMessageAlert("success", response.data.message);
        })
        .catch((error) => {
            errorData.value = error.response.data.errors;
        });
}

// Fetch app setting.
onMounted(() => {
    useAxios.get("/site-settings").then((response) => {
        responseData.value = response.data;
    });
});
</script>
<template>
    <!-- Page Header Start -->
    <PageHeader pageName="CONTACT US"></PageHeader>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Contact For Any Queries</span>
            </h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form @submit.prevent="sendMessage()" id="contactForm">
                        <div class="control-group mb-2">
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Your Name"
                                v-model="formData.name"
                            />
                            <!-- required="required" -->
                            <template v-if="errorData">
                                <template v-if="errorData['name']">
                                    <small
                                        v-if="errorData['name'][0]"
                                        class="error fw-lighter text-danger text-lg mx-3"
                                        >{{ errorData["name"][0] }}</small
                                    >
                                </template>
                            </template>
                        </div>
                        <div class="control-group mb-2">
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="Your Email"
                                v-model="formData.email"
                            />
                            <!-- required="required" -->
                            <template v-if="errorData">
                                <template v-if="errorData['email']">
                                    <small
                                        v-if="errorData['email'][0]"
                                        class="error fw-lighter text-danger text-lg mx-3"
                                        >{{ errorData["email"][0] }}</small
                                    >
                                </template>
                            </template>
                        </div>
                        <div class="control-group mb-2">
                            <input
                                type="text"
                                class="form-control"
                                id="subject"
                                placeholder="Subject"
                                v-model="formData.subject"
                                required="required"
                            />
                            <template v-if="errorData">
                                <template v-if="errorData['subject']">
                                    <small
                                        v-if="errorData['subject'][0]"
                                        class="error fw-lighter text-danger text-lg mx-3"
                                        >{{ errorData["subject"][0] }}</small
                                    >
                                </template>
                            </template>
                        </div>
                        <div class="control-group mb-2">
                            <textarea
                                class="form-control"
                                rows="6"
                                id="message"
                                placeholder="Message"
                                v-model="formData.message"
                                required="required"
                            ></textarea>
                            <template v-if="errorData">
                                <template v-if="errorData['message']">
                                    <small
                                        v-if="errorData['message'][0]"
                                        class="error fw-lighter text-danger text-lg mx-3"
                                        >{{ errorData["message"][0] }}</small
                                    >
                                </template>
                            </template>
                        </div>
                        <div>
                            <button
                                class="btn btn-primary py-2 px-4 mt-3"
                                type="submit"
                                id="sendMessageButton"
                            >
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div v-if="responseData" class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Address</h5>

                    <p class="mb-2">
                        <i class="fa fa-envelope text-primary mr-3"></i
                        >{{ responseData.settings.email }}
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt text-primary mr-3"></i
                        >{{ responseData.settings.phone }}
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt text-primary mr-3"></i
                        >{{ responseData.settings.address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</template>
