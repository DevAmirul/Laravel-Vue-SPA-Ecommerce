import { ref } from 'vue'
import useAxios from './axios';
import useAlert from './alert';
import useWishlist from './wishlist';
import useRefresh from '../stores/Refresh';
import useToken from "./token";
import useAuth from '../stores/Auth';

export default function useCart() {

    function addCart(productId){
        useAxios.get('/users/cart/add/' + 2 + '/' + productId)
            .then(response => {
                useWishlist().deleteWishlist(productId)
                useRefresh().refreshCartItemsNumber = !useRefresh().refreshCartItemsNumber
                useAlert().topAlert('success', 'Successfully added to cart')
            })
            .catch(error => {
                console.log(error);
                useAlert().topAlert('error', error.response.data.message, 'bottom-end')
            });
    }

    function  getCartItems() {
        return useAxios.get('/users/cart/' + 2, {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                return response.data;
                if (response.data.carts.length === 0) useAlert().centerDialogAlert('info', 'Your cart list is empty')
            })
    }

    function deleteCartItems(itemId) {
        useAxios.delete('/users/cart/' + itemId, {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                useRefresh().refreshCartPage = !useRefresh().refreshCartPage
                useRefresh().refreshCartItemsNumber = !useRefresh().refreshCartItemsNumber
                useAlert().centerMessageAlert('success', response.data.message)
            })
            .catch(error => {
                useAlert().topAlert('error', error.response.data.message, 'bottom-end')
            });
    }

    function productQuantityIncrement(cartId, productId, qty) {
        useAxios.get('/users/cart/' + cartId + '/' + productId + '/' + ++qty, {
            headers: { Authorization: 'Bearer ' + useToken().getToken() }
        })
            .then(response => {
                useRefresh().refreshCartPage = !useRefresh().refreshCartPage;
                useRefresh().refreshCartItemsNumber = !useRefresh().refreshCartItemsNumber
            })
            .catch(error => {
                useAlert().topAlert('error', error.response.data.message, 'bottom-end')
            });
    }

    function productQuantityDecrement(cartId, productId, qty) {
        if (qty > 1) {
            useAxios.get('/users/cart/' + cartId + '/' + productId + '/' + --qty, {
                headers: { Authorization: 'Bearer ' + useToken().getToken() }
            })
                .then(response => {
                    useRefresh().refreshCartPage = !useRefresh().refreshCartPage
                    useRefresh().refreshCartItemsNumber = !useRefresh().refreshCartItemsNumber
                })
                .catch(error => {
                    useAlert().topAlert('error', error.response.data.message, 'bottom-end')
                });
        }
    }

    return { addCart, getCartItems, deleteCartItems, productQuantityIncrement, productQuantityDecrement };
}
