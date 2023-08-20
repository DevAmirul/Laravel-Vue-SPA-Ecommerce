import { defineStore } from 'pinia'
import { ref } from 'vue'

const useRefresh = defineStore('refresh', () => {

    const refreshCartItemsNumber = ref(true);
    const refreshWishlistItemsNumber = ref(true);
    const refreshCompareItemsNumber = ref(true);

    const refreshWishlistPage = ref(true);
    const refreshCartPage = ref(true);
    const refreshComparePage = ref(true);

    return { refreshCartItemsNumber, refreshWishlistItemsNumber, refreshCompareItemsNumber, refreshWishlistPage, refreshCartPage, refreshComparePage }
})

export default useRefresh;