<script setup>
import { ref,reactive, onMounted } from 'vue';
import useAxios from '../services/axios';
import useAlert from '../services/Sweetalert';
import PageHeader from '../components/layouts/PageHeader.vue'

let responseData = ref();
const formData = reactive({
    name: '',
    email: '',
    subject: '',
    message: '',
});

function sendMessage(){
    useAxios.post('/contacts',{
        formData
    })
        .then(response => {
            formData.name = ''
            formData.email = ''
            formData.subject = ''
            formData.message = ''
            useAlert().centerMessageAlert('success', response.data.message)
        })
        .catch(error => {
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}

onMounted(() => {
    useAxios.get('/site-settings')
        .then(response => {
            responseData.value = response.data
        })
        .catch(error => {
            // console.log(error);
        });
} )

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
                    <form @submit.prevent="sendMessage()" id="contactForm"
                    >
                        <div class="control-group">
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Your Name"
                                required="required"
                                v-model="formData.name"
                            />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="Your Email"
                                required="required"
                                v-model="formData.email"
                            />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input
                                type="text"
                                class="form-control"
                                id="subject"
                                placeholder="Subject"
                                required="required"
                                v-model="formData.subject"
                            />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea
                                class="form-control"
                                rows="6"
                                id="message"
                                placeholder="Message"
                                required="required"
                                v-model="formData.message"
                            ></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button
                                class="btn btn-primary py-2 px-4"
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
                        <i class="fa fa-phone-alt text-primary mr-3"></i>{{ responseData.settings.phone }}
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
