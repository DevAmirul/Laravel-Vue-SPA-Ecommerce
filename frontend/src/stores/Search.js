import { defineStore } from 'pinia'
import { onBeforeMount, ref, watch } from 'vue'
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

    const isRefreshPage = ref(false);
    const responseData = ref();
    const query = ref({});

    watch([search, sort, limit, minPrice, maxPrice, color, size], () => {
        if (isRefreshPage.value) {
            search.value ? query.value['search'] = search.value : delete query.value['search'];
            minPrice.value ? query.value['minPrice'] = minPrice.value : delete query.value['minPrice'];
            maxPrice.value ? query.value['maxPrice'] = maxPrice.value : delete query.value['maxPrice'];
            color.value ? query.value['color'] = color.value : delete query.value['color'];
            size.value ? query.value['size'] = size.value : delete query.value['size'];
            limit.value !== '20' ? query.value['limit'] = limit.value : delete query.value['limit'];
            sort.value !== 'latest' ? query.value['sort'] = sort.value : delete query.value['sort'];

            router.push({
                query: query.value
            })
        } else {
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
        }
    })

    watch(pageNumber, () => {
        pageNumber.value ? query.value['page'] = pageNumber.value : delete query.value['page'];
        router.push({
            query: query.value
        })
    })

    watch(() => route.query, () => {
        const hasRouteName = ["shop", "sale", "categories", "subCategories", "brands"];

        if (hasRouteName.includes(route.name)) {
            console.log(query.value, 'form watch ');
            getDataByQuery('watch route.query');
        }
    })

    function cleanRouteQuery() {
        query.value = {}
    }

    // Convert the query received from the router into an array.
    onBeforeMount(() => {
        isRefreshPage.value = true;
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

    function getDataByQuery() {
        const searchParams = new URLSearchParams(route.query).toString()
        useAxios.get(`${route.path}?${searchParams}`)
            .then(response => {
                responseData.value = response.data
                isRefreshPage.value = false;
                if (responseData.value.products.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
            })
            .catch(error => {
                console.log(error);
            });
    }

    return { topBarSearch, sort, limit, search, prevQueryColor, color, prevQuerySize, size, maxPrice, minPrice, responseData, isRefreshPage, getDataByQuery, pageNumber, cleanRouteQuery }
})

export default useSearch;