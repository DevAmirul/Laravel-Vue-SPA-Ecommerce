import useAlert from './alert';
import useRefresh from '../stores/Refresh';

let productCompareArray = []

//Store the product ID in the comparison list in local storage.
export default function useCompare(productId) {
    let ifExistLocalStorageData = JSON.parse(localStorage.getItem('compare'));

    if (ifExistLocalStorageData) {
        if (ifExistLocalStorageData.length < 3) {
            let hasId = false
            for (let i = 0; i < ifExistLocalStorageData.length; i++) {
                if (ifExistLocalStorageData[i] == productId) {
                    useAlert().topAlert('info', 'Already added to compare list')
                    return hasId = true;
                }
            }
            if (hasId == false) {
                ifExistLocalStorageData.push(productId);
                localStorage.setItem("compare", JSON.stringify(ifExistLocalStorageData))
                useRefresh().refreshCompareItemsNumber = !useRefresh().refreshCompareItemsNumber
                useAlert().topAlert('success', 'Successfully added to compare')
            }
        } else {
            useAlert().topAlert('info', 'The comparison list is already full')
        }
    } else {
        productCompareArray.push(productId);
        localStorage.setItem("compare", JSON.stringify(productCompareArray))
        useRefresh().refreshCompareItemsNumber = !useRefresh().refreshCompareItemsNumber
        useAlert().topAlert('success', 'Successfully added to compare')
    }
}
