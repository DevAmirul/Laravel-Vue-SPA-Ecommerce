import { ref, computed } from 'vue'
import { PiniaVuePlugin, defineStore } from 'pinia'
import axios from "axios";


export const useAxios = defineStore('axiosSetup', () => {
    const baseUrl = ref(axios.defaults.baseURL = 'http://127.0.0.1:8000/api');

    const doubleCount = computed(() => count.value * 2)
    function increment() {
        count.value++
    }

    return { count, doubleCount, increment }
})
