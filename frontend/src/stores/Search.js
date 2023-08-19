import { defineStore } from 'pinia'
import { reactive, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios_C from "../services/axios";

export const useSearch = defineStore('search', () => {
    const router = useRouter();
    const route = useRoute();

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    const attributeFilter = reactive({
        color: '',
        size: ''
    })
    const maxPrice = ref(0)
    const minPrice = ref(0)

    // const priceFilter = reactive({
    //     minPrice: '',
    //     maxPrice: ''
    // })

    const responseData = ref();
    const queryFromLink = new URLSearchParams(route.query).toString();
    const query = ref({});

    watch([search, sort, limit, minPrice, maxPrice], () => {
        // if (search.value) {query.value['search'] = search.value}
        // else{
        //     delete query.value.search
        // }
        // if (minPrice.value) {query.value['minPrice'] = minPrice.value}
        // else {
        //     delete query.value.minPrice
        // }
        // if (maxPrice.value) query.value['maxPrice'] = maxPrice.value
        // if (limit.value !== '20') query.value['limit'] = limit.value
        // if (sort.value !== 'latest') query.value['sort'] = sort.value
        // push()
        console.log(query.value);

        // (search.value) ? query.value['search'] = search.value : delete query.value.search;
        // (minPrice.value) ? query.value['minPrice'] = search.value : delete query.value['minPrice'];
        // (maxPrice.value) ? query.value['maxPrice'] = search.value : delete query.value['maxPrice'];
        // (limit.value) ? query.value['limit'] = search.value : delete query.value['limit'];
        // (sort.value) ? query.value['sort'] = search.value : delete query.value['sort'];
    })

    // watch(
    //     () => [priceFilter.minPrice, priceFilter.maxPrice],
    //     ([ minPrice, maxPrice]) => {
    //         if (minPrice) query.value['minPrice'] = priceFilter.minPrice
    //         if (maxPrice) query.value['maxPrice'] = priceFilter.maxPrice
    //         // color ? query.value['color'] = attributeFilter.color : query.value['color'] = null;
    //         // size ? query.value['size'] = attributeFilter.size : query.value['size'] = null;
    //         push()
    //     }
    // )

    // watch(
    //     () => [attributeFilter.color, attributeFilter.size],
    //     ([color, size]) => {
    //         color ? query.value['color'] = attributeFilter.color : query.value['color'] = null;
    //         size ? query.value['size'] = attributeFilter.size : query.value['size'] = null;
    //         push()
    //     }
    // )

    function push() {
        // if (Object.keys(route.query).length > 0) {
        //     let arrKey = Object.keys(query.value);
        //     for (const key in route.query){
        //         if (arrKey.indexOf(key) == -1) {
        //             query.value[key] = route.query[key];
        //         }
        //     }
        // }
        router.push({
            query: query.value
        })
    }


    return { sort, limit, search, attributeFilter, maxPrice, minPrice, responseData }
})
