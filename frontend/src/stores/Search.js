import { defineStore } from 'pinia'
import { onBeforeMount, reactive, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import useAxios from "../services/axios";
import useAlert from "../services/alert";

const useSearch = defineStore('search', () => {
    const router = useRouter();
    const route = useRoute();

    const sort = ref('latest');
    const limit = ref('20');
    const search = ref('');

    const topBarSearch = ref('');

    const maxPrice = ref('')
    const minPrice = ref('')
    const pageNumber = ref('');

    const attribute = reactive({})

    const isRefreshPage = ref(false);
    const responseData = ref();
    const query = ref({});

    watch([search, sort, limit, minPrice, maxPrice, attribute], () => {
        if (isRefreshPage.value) {
            // TODO: refactor here , delete  last part if posible.
            search.value ? query.value['search'] = search.value : delete query.value['search'];
            minPrice.value ? query.value['minPrice'] = minPrice.value : delete query.value['minPrice'];
            maxPrice.value ? query.value['maxPrice'] = maxPrice.value : delete query.value['maxPrice'];
            limit.value !== '20' ? query.value['limit'] = limit.value : delete query.value['limit'];
            sort.value !== 'latest' ? query.value['sort'] = sort.value : delete query.value['sort'];

            for (const key in attribute) {
                attribute[key] ? query.value[key] = attribute[key] : delete query.value[key];
            }
            routerPush();
        } else {
            search.value ? (query.value['search'] = search.value, query.value['page'] = '1') : delete query.value['search'];
            minPrice.value ? (query.value['minPrice'] = minPrice.value, query.value['page'] = '1') : delete query.value['minPrice'];
            maxPrice.value ? (query.value['maxPrice'] = maxPrice.value, query.value['page'] = '1') : delete query.value['maxPrice'];
            limit.value !== '20' ? (query.value['limit'] = limit.value, query.value['page'] = '1') : delete query.value['limit'];
            sort.value !== 'latest' ? (query.value['sort'] = sort.value, query.value['page'] = '1') : delete query.value['sort'];

            for (const key in attribute) {
                attribute[key] ? (query.value[key] = attribute[key], query.value['page'] = '1') : delete query.value[key];
            }
            routerPush()
        }
    })

    watch(pageNumber, () => {
        pageNumber.value ? query.value['page'] = pageNumber.value : delete query.value['page'];
        routerPush()
    })

    watch(() => route.query, () => {
        console.log('watch');
        const hasRouteName = ["shop", "sale", "categories", "subCategories", "brands"];
        if (hasRouteName.includes(route.name)) {
            getDataByQuery('watch route.query');
        }
    })

    // Convert the query received from the router into an array.
    onBeforeMount(() => {
        isRefreshPage.value = true;
        if (new URLSearchParams(route.query).toString()) {
            if (route.query.page) (pageNumber.value = route.query.page)
            if (route.query.search) (search.value = route.query.search)
            if (route.query.sort) (sort.value = route.query.sort)
            if (route.query.limit) (limit.value = route.query.limit)
            if (route.query.minPrice) (minPrice.value = route.query.minPrice)
            if (route.query.maxPrice) (maxPrice.value = route.query.maxPrice)

            for (const property in route.query) {
                if (['page', 'search', 'sort', 'limit', 'minPrice', 'maxPrice'].includes(route.query[property]) == false) {
                    attribute[property] = route.query[property];
                }
            }
        }
    })

    function getDataByQuery(where) {
        console.log(where);
        const searchParams = new URLSearchParams(route.query).toString()
        useAxios.get(`${route.path}?${searchParams}`)
            .then(response => {
                isRefreshPage.value = false;
                responseData.value = response.data
                console.log(responseData.value);
                if (responseData.value.products.length === 0) useAlert().centerDialogAlert('info', 'Items not found')
            })
    }

    function routerPush() {
        // console.log('form router push');
        router.push({
            query: query.value
        })
    }

    function cleanRouteQuery() {
        query.value = {}
    }

    return {
        topBarSearch, sort, limit, search, attribute, maxPrice, minPrice, responseData, isRefreshPage, getDataByQuery, pageNumber, cleanRouteQuery
    }
})

export default useSearch;
