import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import useAuth from '../stores/Auth'
import useToken from '../services/token'
import { watch } from 'vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/shop',
            name: 'shop',
            component: () => import('../views/ShopView.vue')
        }, {
            path: '/products/:slug',
            name: 'products',
            component: () => import('../views/ProductsView.vue')
        },
        {
            path: '/contact-us',
            name: 'contactUs',
            component: () => import('../views/ContactsView.vue')
        },
        {
            path: '/search/:search',
            name: 'search',
            component: () => import('../views/SearchView.vue')
        },
        {
            path: '/categories/:slug',
            name: 'categories',
            component: () => import('../views/CategoriesView.vue')
        },
        {
            path: '/sub-categories/:slug',
            name: 'subCategories',
            component: () => import('../views/SubCategoriesView.vue')
        },
        {
            path: '/brands/:slug',
            name: 'brands',
            component: () => import('../views/BrandsView.vue')
        },
        {
            path: '/offers/:slug',
            name: 'offers',
            component: () => import('../views/OffersView.vue')
        },
        {
            path: '/sales',
            name: 'sales',
            component: () => import('../views/SaleView.vue')
        },
        {
            path: '/users/orders',
            name: 'orders',
            component: () => import('../views/users/OrdersView.vue'),
            beforeEnter: (to, from) => {
                if (useToken().getToken() === null) return { name: 'login' }
                watch(() => useAuth().isAuthenticated, () => {
                    if (!useAuth().isAuthenticated) return { name: 'login' }
                })
            }
        },
        {
            path: '/users/orders/:id(\\d+)/items',
            name: 'orderItems',
            component: () => import('../views/users/OrderItemsView.vue'),
            beforeEnter: (to, from) => {
                if (useToken().getToken() === null) return { name: 'login' }
                watch(() => useAuth().isAuthenticated, () => {
                    if (!useAuth().isAuthenticated) return { name: 'login' }
                })
            }
        },
        {
            path: '/users/orders/success',
            name: 'orderSuccess',
            component: () => import('../views/users/SuccessView.vue'),
            beforeEnter: (to, from) => {

                if (useToken().getToken() === null) return { name: 'login' }

                watch(() => useAuth().isAuthenticated, () => {
                    if (!useAuth().isAuthenticated) return { name: 'login' }
                })
            }
        },
        {
            path: '/users/checkout',
            name: 'checkout',
            component: () => import('../views/users/CkeckoutView.vue'),
            beforeEnter: (to, from) => {
                if (useToken().getToken() === null) return { name: 'login' }
                watch(() => useAuth().isAuthenticated, () => {
                    if (!useAuth().isAuthenticated) return { name: 'login' }
                })
            }
        },
        {
            path: '/users/cart',
            name: 'cart',
            component: () => import('../views/users/CartView.vue'),
            beforeEnter: (to, from) => {
                if (useToken().getToken() === null) return { name: 'login' }
                watch(() => useAuth().isAuthenticated, () => {
                    if (!useAuth().isAuthenticated) return { name: 'login' }
                })
            }
        },
        {
            path: '/users/profile',
            name: 'profile',
            component: () => import('../views/users/ProfileView.vue'),
            beforeEnter: (to, from) => {

                if (useToken().getToken() === null) return { name: 'login' }

                watch(() => useAuth().isAuthenticated, () => {
                    if (!useAuth().isAuthenticated) return { name: 'login' }
                })
            }
        },
        {
            path: '/wishlist',
            name: 'wishList',
            component: () => import('../views/users/WishlistView.vue')
        },
        {
            path: '/compare',
            name: 'compare',
            component: () => import('../views/CompareView.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../views/auth/LoginView.vue')
        },
        {
            path: '/register',
            name: 'register',
            component: () => import('../views/auth/RegisterView.vue')
        },
        {
            path: '/forgot-password',
            name: 'forgotPassword',
            component: () => import('../views/auth/ForgotPasswordView.vue')
        },
        {
            path: '/reset-password/:token',
            name: 'resetPassword',
            component: () => import('../views/auth/ResetPasswordView.vue')
        },
        {
            path: '/payment/success',
            name: 'paymentSuccess',
            component: () => import('../views/payment/SuccessView.vue')
        },
        {
            path: '/payment/cancel',
            name: 'paymentCancel',
            component: () => import('../views/payment/CancelView.vue')
        },
        {
            path: '/500',
            name: 'serverError',
            component: () => import('../views/errors/500View.vue')
        },
        {
            path: '/:pathMatch(.*)*',
            name: 'NotFound',
            component: () => import('../views/errors/404View.vue')
        }
    ]
})

export default router