import { ref, onUpdated } from 'vue'

export function useSearch() {
    const dataFilter = ref('20');
    const dataPerPage = ref('latest');
    const searchStr = ref('');

    const attributeFilterValue = reactive({
        color: {},
        size: {}
    })
    const priceFilter = reactive({
        minPrice: {},
        maxPrice: {}
    })



    return { dataFilter, dataPerPage, searchStr }
}