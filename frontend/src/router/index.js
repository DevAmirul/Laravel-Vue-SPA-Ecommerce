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
    }, {
      path: '/products/:id',
      name: 'products',
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
      component: () => import('../views/users/CkeckoutView.vue')
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('../views/users/CartView.vue')
    },
    {
      path: '/search/:string',
      name: 'search',
      component: () => import('../views/SearchView.vue')
    },
    {
      path: '/orders',
      name: 'orders',
      component: () => import('../views/users/OrdersView.vue'),
      children: [{
        path: '/items',
        name: 'orderItems',
        component: () => import('../views/users/OrderItemsView.vue')
      }],
    },
    {
      path: '/wishlist',
      name: 'wishList',
      component: () => import('../views/users/WishlistView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/guests/SignInView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/guests/SignUpView.vue')
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('../views/users/ProfileView.vue')
    },
    {
      path: '/500',
      name: '500',
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
