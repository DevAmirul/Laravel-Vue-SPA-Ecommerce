import { defineStore } from 'pinia'
import { onBeforeMount, reactive, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import useAxios from "../services/axios";
import useAlert from "../services/alert";

const useSearch = defineStore('search', () => {
    const router = useRouter();
    const route = useRoute();

    const hasRouteName = ["shop", "sale", "categories", "subCategories", "brands"];

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    const topBarSearch = ref('');

    const maxPrice = ref('')
    const minPrice = ref('')
    const pageNumber = ref('');

    const attribute = ref('')

    const isRefreshPage = ref(false);
    const responseData = ref();
    const query = ref({});

    function routerPush() {
        router.push({
            query: query.value
        })
    }

    // Convert the query received from the router into an array.
    onBeforeMount(() => {
        isRefreshPage.value = true;
        if (new URLSearchParams(route.query).toString()) {
            if (route.query.page) pageNumber.value = route.query.page;
            if (route.query.search) search.value = route.query.search;
            if (route.query.sort) sort.value = route.query.sort;
            if (route.query.limit) limit.value = route.query.limit;
            if (route.query.minPrice) minPrice.value = route.query.minPrice;
            if (route.query.maxPrice) maxPrice.value = route.query.maxPrice;
            if (route.query.attribute) attribute.value = route.query.attribute;
        }
    })

    function getDataByQuery(where) {
        console.log(where);
        const searchParams = new URLSearchParams(route.query).toString()
        useAxios.get(`${route.path}?${searchParams}`)
            .then(response => {
                isRefreshPage.value = false;
                responseData.value = response.data
                if (responseData.value.products.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
            })
            .catch(error => {
                console.log(error);
            })
    }

    watch([search, sort, limit, minPrice, maxPrice, attribute], () => {
        if (isRefreshPage.value) {
            search.value ? query.value['search'] = search.value : null;
            minPrice.value ? query.value['minPrice'] = minPrice.value : null;
            maxPrice.value ? query.value['maxPrice'] = maxPrice.value : null;
            limit.value !== '20' ? query.value['limit'] = limit.value : null;
            sort.value !== 'latest' ? query.value['sort'] = sort.value : null;
            attribute.value ? query.value['attribute'] = attribute.value : delete query.value['attribute'];

            routerPush();
        } else {
            search.value ? (query.value['search'] = search.value, query.value['page'] = '1') : delete query.value['search'];
            minPrice.value ? (query.value['minPrice'] = minPrice.value, query.value['page'] = '1') : delete query.value['minPrice'];
            maxPrice.value ? (query.value['maxPrice'] = maxPrice.value, query.value['page'] = '1') : delete query.value['maxPrice'];
            limit.value !== '20' ? (query.value['limit'] = limit.value, query.value['page'] = '1') : delete query.value['limit'];
            sort.value !== 'latest' ? (query.value['sort'] = sort.value, query.value['page'] = '1') : delete query.value['sort'];
            attribute.value ? (query.value['attribute'] = attribute.value, query.value['page'] = '1') : delete query.value['attribute'];

            routerPush()
        }
    })

    watch(pageNumber, () => {
        pageNumber.value ? query.value['page'] = pageNumber.value : delete query.value['page'];
        routerPush()
    })

    watch(() => route.query, () => {
        if (hasRouteName.includes(route.name)) {
            getDataByQuery('watch route.query');
        }
    })

    watch(() => route.path, () => {
        if (route.name == 'sales' || route.name == 'offers') {
            getDataByQuery('watch route.path');
        }
    })

    function cleanRouteQuery() {
        query.value = {}
    }

    return {
        topBarSearch, sort, limit, search, attribute, maxPrice, minPrice, responseData, isRefreshPage, getDataByQuery, pageNumber, cleanRouteQuery
    }
})

export default useSearch;
