import useAxios from './axios';
import useAlert from './Sweetalert';
import useRefresh from '../stores/Refresh';

export default function addToCart(productId) {
    useAxios.get('/users/cart/add/' + 2 + '/' + productId)
        .then(response => {
            console.log(response);
            useRefresh().refreshCartItemsNumber = !useRefresh().refreshCartItemsNumber
            useAlert().topAlert('success', 'Successfully added to cart')
        })
        .catch(error => {
            console.log(error);
            useAlert().topAlert('error', error.response.data.message, 'bottom-end')
        });
}
