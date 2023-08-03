import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

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
    }, , {
      path: '/products',
      name: 'productDetail',
      component: () => import('../views/ProductsView.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../views/ContactView.vue')
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: () => import('../views/CheckoutView.vue')
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('../views/CartView.vue')
    },
    {
      path: '/search',
      name: 'search',
      component: () => import('../views/SearchView.vue')
    },
    {
      path: '/orders',
      name: 'orders',
      component: () => import('../views/userPages/OrdersView.vue')
    },
    {
      path: '/orders-items',
      name: 'orderItems',
      component: () => import('../views/userPages/OrdersItemsView.vue')
    },
    {
      path: '/wish-list',
      name: 'wishList',
      component: () => import('../views/wishListView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/guestPages/LoginView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/guestPages/RegisterView.vue')
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('../views/userPages/MyProfileView.vue')
    },
    {
      path: '/500',
      name: '500',
      component: () => import('../views/errorPages/500View.vue')
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: () => import('../views/errorPages/404View.vue')
    }
  ]
})

export default router
