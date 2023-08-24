import { defineStore } from 'pinia'
import { onMounted, onBeforeMount, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios_C from "../services/axios";

const useSearch = defineStore('search', () => {
    const router = useRouter();
    const route = useRoute();

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    const topBarSearch = ref('');

    const maxPrice = ref('')
    const minPrice = ref('')
    const color = ref('');
    const size = ref('');
    const prevQueryColor = ref('');
    const prevQuerySize = ref('');

    const responseData = ref();

    const query = ref({});

    watch([search, sort, limit, minPrice, maxPrice, color, size], () => {
        (search.value) ? query.value['search'] = search.value : delete query.value.search;
        (minPrice.value) ? query.value['minPrice'] = minPrice.value : delete query.value['minPrice'];
        (maxPrice.value) ? query.value['maxPrice'] = maxPrice.value : delete query.value['maxPrice'];
        (color.value) ? query.value['color'] = color.value : delete query.value['color'];
        (size.value) ? query.value['size'] = size.value : delete query.value['size'];
        (limit.value !== '20') ? query.value['limit'] = limit.value : delete query.value['limit'];
        (sort.value !== 'latest') ? query.value['sort'] = sort.value : delete query.value['sort'];

        router.push({
            query: query.value
        })

        const searchParams = new URLSearchParams({
            search: search.value,
            sort: sort.value,
            limit: limit.value,
            minPrice: minPrice.value,
            maxPrice: maxPrice.value,
            color: color.value,
            size: size.value,
        }).toString()

        axios_C.get( `${route.path}?${searchParams}` )
            .then(response => {
                responseData.value = response.data
                console.log(responseData.value);
            })
            .catch(error => {
                // console.log( error);
            });

    })

    // Convert the query received from the router into an array.
    onBeforeMount(() => {
        if (new URLSearchParams(route.query).toString()) {
            if (route.query.search) search.value = route.query.search
            if (route.query.sort) sort.value = route.query.sort
            if (route.query.limit) limit.value = route.query.limit
            if (route.query.minPrice) minPrice.value = route.query.minPrice
            if (route.query.maxPrice) maxPrice.value = route.query.maxPrice
            if (route.query.color) {
                prevQueryColor.value = route.query.color.split('|');
                color.value = route.query.color;
            }
            if (route.query.size) {
                prevQuerySize.value = route.query.size.split('|');
                size.value = route.query.size;
            }
        }
    })

    return { topBarSearch, sort, limit, search, prevQueryColor, color, prevQuerySize, size, maxPrice, minPrice, responseData, query }
})


export default useSearch;