import useAlert from './alert';
import useRefresh from '../stores/Refresh';

let productAttributeArray = [];

export default function useWishlist(productAttributes) {

    // Store the product in the wishlist in local storage.
    function addWishlist(productAttributes){
        let ifExistLocalStorageData = localStorage.getItem('productAttributes');
        if (ifExistLocalStorageData) {
            ifExistLocalStorageData = JSON.parse(localStorage.getItem('productAttributes'))
            let hasId = false
            for (let i = 0; i < ifExistLocalStorageData.length; i++) {
                if (ifExistLocalStorageData[i].id == productAttributes.id) {
                    useAlert().topAlert('info', 'Already added to wishlist')
                    return hasId = true;
                }
            }
            if (hasId == false) {
                ifExistLocalStorageData.push(productAttributes);
                localStorage.setItem("productAttributes", JSON.stringify(ifExistLocalStorageData))
                useRefresh().refreshWishlistItemsNumber = !useRefresh().refreshWishlistItemsNumber
                useAlert().topAlert('success', 'Successfully added to wishlist')

            }
        } else {
            productAttributeArray.push(productAttributes);
            localStorage.setItem("productAttributes", JSON.stringify(productAttributeArray))
            useRefresh().refreshWishlistItemsNumber = !useRefresh().refreshWishlistItemsNumber
            useAlert().topAlert('success', 'Successfully added to wishlist')

        }
    }

    // Delete the product in the wishlist in local storage.
    function deleteWishlist(productId) {
        let ifExistLocalStorageData = localStorage.getItem('productAttributes');
        if (ifExistLocalStorageData) {
            ifExistLocalStorageData = JSON.parse(localStorage.getItem('productAttributes'))
            for (let i = 0; i < ifExistLocalStorageData.length; i++) {
                if (ifExistLocalStorageData[i].id == productId) {
                    ifExistLocalStorageData.splice(i, 1);
                    localStorage.setItem("productAttributes", JSON.stringify(ifExistLocalStorageData))
                    useRefresh().refreshWishlistPage = !useRefresh().refreshWishlistPage
                    useRefresh().refreshWishlistItemsNumber = !useRefresh().refreshWishlistItemsNumber
                    useAlert().centerMessageAlert('success', 'Successfully deleted item to wishlist')
                    break;
                }
            }
        }
    }

    return { deleteWishlist, addWishlist }
}
