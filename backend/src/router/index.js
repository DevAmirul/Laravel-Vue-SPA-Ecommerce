import { createRouter, createWebHistory } from 'vue-router'
import DashboardView from '../views/adminPages/DashboardView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: DashboardView
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
      path: '/forgotpassword',
      name: 'ForgotPassword',
      component: () => import('../views/guestPages/ForgotPasswordView.vue')
    },
    {
      path: '/recoverypassword',
      name: 'RecoveryPassword',
      component: () => import('../views/guestPages/RecoveryPasswordView.vue')
    },
    {
      path: '/404',
      name: '404',
      component: () => import('../views/errorPages/404View.vue')
    },
    {
      path: '/500',
      name: '500',
      component: () => import('../views/errorPages/500View.vue')
    }
  ]
})

export default router
