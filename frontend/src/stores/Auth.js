import { onBeforeMount, ref, watch } from "vue";
import { defineStore } from 'pinia'
import useAxios from '../services/axios';
import useToken from '../services/token';
import useAlert from '../services/alert';
import { useRouter } from 'vue-router'

const useAuth = defineStore('auth', () => {

    const isAuthenticated = ref(null);
    const user = ref(null);
    const router = useRouter();
    const errorData = ref();

    onBeforeMount(() => {
        if (useToken().getToken() !== null) getAuthUser();
    })

    function getAuthUser() {
        useAxios.get('/user', {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                isAuthenticated.value = true
                user.value = response.data;
            })
            .catch(error => {
                isAuthenticated.value = false;
                useToken().deleteToken();
            })
    }

    function login(email, password, remember) {
        useAxios.post('/login', {
            'email': email,
            'password': password,
            'remember': remember,
        })
            .then(response => {
                setAuthUser(response, remember);
                router.push({ name: 'home' })
            })
            .catch(error => {
                errorData.value = error.response.data.errors
            });
    }

    function logout() {
        useAxios.get('/logout', {
            headers: {
                Authorization: 'Bearer ' + useToken().getToken()
            }
        })
            .then(response => {
                removeAuthUser();
                useAlert().centerMessageAlert('success', response.data.message)
            })
    }

    function removeAuthUser(){
        isAuthenticated.value = false
        user.value = null
        useToken().deleteToken();
    }

    function setAuthUser(response, remember){
        errorData.value = null
        isAuthenticated.value = true
        user.value = response.data.user
        useToken().setToken(response.data.access_token, remember)
    }

    watch(isAuthenticated, () => {
        if (!isAuthenticated.value) router.push({ name: 'login' });
    } )
    
    return { isAuthenticated, user, errorData, logout, login }
})

export default useAuth;