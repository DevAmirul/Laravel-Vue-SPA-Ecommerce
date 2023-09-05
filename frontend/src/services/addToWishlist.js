import useAlert from './Sweetalert';
import useRefresh from '../stores/Refresh';

let productAttributeArray = []

export default function addToWishlist(productAttributes) {
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
