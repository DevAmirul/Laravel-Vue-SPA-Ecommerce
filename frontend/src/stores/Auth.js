import { onMounted, ref } from "vue";
import { defineStore } from 'pinia'
import axios from 'axios';
import useToken from '../services/token';
import useAlert from '../services/Sweetalert';
import { useRouter } from 'vue-router'

const useAuth = defineStore('auth', () => {

    const isAuthenticated = ref(false);
    const user = ref(null);
    const router = useRouter();
    const errorData = ref();

    onMounted(() => {
        if (useToken().getToken() !== null) {
            getAuthUser();
        }
    })

    function getAuthUser() {
        axios.get('http://127.0.0.1:8000/api/user', {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                isAuthenticated.value = true
                user.value = response.data;
                // console.log(response.data);
            })
    }

    function logout() {

        axios.get('http://127.0.0.1:8000/api/logout', {
            headers: {
                Authorization: 'Bearer ' + useToken().getToken()
            }
        })
            .then(response => {
                removeAuthUser();
                useAlert().centerMessageAlert('success', response.data.message)
            })
            .catch(error => {
                console.log(error.response);
            });
    }

    function login() {
        // axios.post('http://127.0.0.1:8000/api/login', {
        //     'email': formData.email,
        //     'password': formData.password,
        //     'remember': formData.remember,
        // })
        //     .then(response => {
        //         setAuthUser(response);
        //     })
        //     .catch(error => {
        //         console.log(error.response);
        //         errorData.value = error.response.data.errors
        //     });
        console.log('in');
    }

    function removeAuthUser(){
        isAuthenticated.value = false
        user.value = null
        useToken().deleteToken();
    }

    function setAuthUser(){
        errorData.value = null
        useToken().setToken(response.data.access_token, formData.remember)
        user.value = response.data.user
        router.push({ name: 'home' })
    }

    return { isAuthenticated, user, errorData, logout, login }
})

export default useAuth;