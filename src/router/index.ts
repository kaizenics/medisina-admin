import { createRouter, createWebHistory } from 'vue-router'
import LandingPage from '../pages/LandingPage.vue'
import HomePage from '../pages/HomePage.vue'
import LoginPage from '../pages/auth/LoginPage.vue'
import SignUpPage from '../pages/auth/SignupPage.vue'
import Dashboard from '../pages/admin/DashboardPage.vue'
import Orders from '../pages/admin/OrdersPage.vue'
import Settings from '../pages/admin/SettingsPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'landing',
      component: LandingPage
    },
    {
      path: '/home',
      name: 'home',
      component: HomePage
    },
    {
      path: '/login',
      name: 'login',
      component: LoginPage
    },
    {
      path: '/signup',
      name: 'signup',
      component: SignUpPage
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard
    },
    {
      path: '/dashboard/orders',
      name: 'orders',
      component: Orders
    },
    {
      path: '/dashboard/settings',
      name: 'settings',
      component: Settings
    }
  ]
})

export default router
