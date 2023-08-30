import { defineStore } from 'pinia'
import { onMounted, onBeforeMount, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import useAxios from "../services/axios";
import useAlert from "../services/Sweetalert";

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
    const pageNumber = ref('');

    const responseData = ref();

    const query = ref({});

    watch([pageNumber, search, sort, limit, minPrice, maxPrice, color, size], () => {
        pageNumber.value ? query.value['page'] = pageNumber.value : delete query.value['page'];
        search.value ? (query.value['search'] = search.value, query.value['page'] = '1') : delete query.value['search'];
        minPrice.value ? (query.value['minPrice'] = minPrice.value, query.value['page'] = '1') : delete query.value['minPrice'];
        maxPrice.value ? (query.value['maxPrice'] = maxPrice.value, query.value['page'] = '1') : delete query.value['maxPrice'];
        color.value ? (query.value['color'] = color.value, query.value['page'] = '1') : delete query.value['color'];
        size.value ? (query.value['size'] = size.value, query.value['page'] = '1') : delete query.value['size'];
        limit.value !== '20' ? (query.value['limit'] = limit.value, query.value['page'] = '1') : delete query.value['limit'];
        sort.value !== 'latest' ? (query.value['sort'] = sort.value, query.value['page'] = '1') : delete query.value['sort'];

        router.push({
            query: query.value
        })
        const searchParams = new URLSearchParams({
            page: pageNumber.value,
            search: search.value,
            sort: sort.value,
            limit: limit.value,
            minPrice: minPrice.value,
            maxPrice: maxPrice.value,
            color: color.value,
            size: size.value,
        }).toString()

        useAxios.get(`${route.path}?${searchParams}`)
            .then(response => {
                responseData.value = response.data
                if (responseData.value.products.data.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
            })
            .catch(error => {
                // console.log( error);
            });
    })

    function changePage(url) {
        pageNumber.value = url.split('=')[1]
        // query.value['page'] = pageNumber.value
        // router.push({
        //     query: query.value
        // })
    }

    // Convert the query received from the router into an array.
    onBeforeMount(() => {
        if (new URLSearchParams(route.query).toString()) {
            if (route.query.page) pageNumber.value = route.query.page
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
    return { topBarSearch, sort, limit, search, prevQueryColor, color, prevQuerySize, size, maxPrice, minPrice, responseData, changePage }
})

export default useSearch;