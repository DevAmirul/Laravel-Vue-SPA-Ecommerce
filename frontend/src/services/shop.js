import { ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'

export function useShop() {
    const router = useRouter();
    const route = useRoute();

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    let responseData = ref();
    const queryFromLink = new URLSearchParams(route.query).toString();

    watch([search, sort, limit], () => {
        const query = ref({});
        if (search.value) query.value['search'] = search.value
        if (limit.value !== '20') query.value['limit'] = limit.value
        if (sort.value !== 'latest') query.value['sort'] = sort.value

        router.push({
            query: query.value
        })

        axios_C.get('/shop')
            .then(response => {
                responseData.value = response.data
                console.log(responseData.value);
            })
            .catch(error => {
                console.log(error);
            });
    })

    return { sort, limit, search, responseData }
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