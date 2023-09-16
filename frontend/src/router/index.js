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
      path: '/users/checkout',
      name: 'checkout',
      component: () => import('../views/users/CkeckoutView.vue')
    },
    {
      path: '/users/cart',
      name: 'cart',
      component: () => import('../views/users/CartView.vue')
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
      path: '/sales',
      name: 'sales',
      component: () => import('../views/SaleView.vue')
    },
    {
      path: '/users/orders',
      name: 'orders',
      component: () => import('../views/users/OrdersView.vue'),
    },
    {
      path: '/users/orders/:id(\\d+)/items',
      name: 'orderItems',
      component: () => import('../views/users/OrderItemsView.vue')
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
      path: '/users/profile',
      name: 'profile',
      component: () => import('../views/users/ProfileView.vue')
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
