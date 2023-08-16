import { ref, onUpdated, watch, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios_C from "./axios";

export function useSearch() {
    const router = useRouter();
    // const route = useRoute();

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    const attributeFilterData = ref({
        color: {},
        size: {}
    })
    const priceFilterData = ref({
        minPrice: {},
        maxPrice: {}
    })

    const query = ref({});

    // onUpdated(() => {
    //     if (search.value) query.value['search'] = search.value
    //     if (limit.value !== '20') query.value['limit'] = limit.value
    //     if (sort.value !== 'latest') query.value['sort'] = sort.value

    //     router.push({
    //         query: query.value
    //     })
    // })
    let re = ref(0);
    watch(limit, () => {
        re.value++
        // console.log(re);
    } )



    return { sort, limit, search, attributeFilterData, priceFilterData, re }
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