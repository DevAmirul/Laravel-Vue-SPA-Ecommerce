import { reactive, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios_C from "./axios";


export function useSearch() {
    const router = useRouter();
    const route = useRoute();

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    const attributeFilter = reactive({
        color: '',
        size: ''
    })
    const priceFilter = reactive({
        minPrice: '',
        maxPrice: ''
    })

    const responseData = ref();
    const queryFromLink = new URLSearchParams(route.query).toString();
    const query = ref({});

    watch([search, sort, limit], () => {
        if (search.value) query.value['search'] = search.value
        if (limit.value !== '20') query.value['limit'] = limit.value
        if (sort.value !== 'latest') query.value['sort'] = sort.value
        push()

        // router.push({
        //     query: query.value
        // })

        // axios_C.get('/shop')
        //     .then(response => {
        //         responseData.value = response.data
        //         console.log(responseData.value);
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
    })

    watch(
        () => [attributeFilter.color, attributeFilter.size, priceFilter.minPrice, priceFilter.maxPrice],
        ([color, size, minPrice, maxPrice]) => {
            if (minPrice) query.value['minPrice'] = priceFilter.minPrice
            if (maxPrice) query.value['maxPrice'] = priceFilter.maxPrice
            if (color) query.value['color'] = attributeFilter.color
            if (size) {
                query.value['size'] = attributeFilter.size
            } else if (size == ''){
                delete query.value['size']
            }
            push()
            // router.push({
            //     query: query.value
            // })
        }
    )

    function push(){
        if (Object.keys(route.query).length > 0) {
            let arrKey = Object.keys(query.value);
            // console.log(arrKey);
            for (const key in route.query){
                // if (query.value[key] !== route.query[key]) {
                //     query.value[key] = route.query[key];
                // }
                if (arrKey.indexOf(key) == -1) {
                    // console.log(arrKey.indexOf(key));
                    query.value[key] = route.query[key];
                }
            }
        }
        console.log(query.value);
        router.push({
            query: query.value
        })


    }


    return { sort, limit, search, attributeFilter,  priceFilter, responseData }
}






// const queryFromLink = new URLSearchParams(route.query).toString();
        // if (queryFromLink !== '') {
        //     axios_C.get('/shop?' + queryFromLink)
        //         .then(response => {
        //             res.value = response.data
        //             console.log(res.value);
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // } else {
        //     axios_C.get('/shop')
        //         .then(response => {
        //             res.value = response.data
        //             console.log(res.value);
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // }
        // console.log('ok');