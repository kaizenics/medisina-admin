import { createRouter, createWebHistory } from 'vue-router'
import LandingPage from '../pages/LandingPage.vue'
import HomePage from '../pages/HomePage.vue'
import LoginPage from '../pages/auth/LoginPage.vue'
import SignUpPage from '../pages/auth/SignupPage.vue'
import AdminLogin from '../pages/auth/AdminLogin.vue'
import AdminSignup from '../pages/auth/AdminSignup.vue'
import Dashboard from '../pages/admin/DashboardPage.vue'
import Orders from '../pages/admin/OrdersPage.vue'
import Settings from '../pages/admin/SettingsPage.vue'
import Products from '../pages/admin/ProductPage.vue'
import UserManagement from '../pages/admin/UserManagementPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/landing',
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
      path: '/dashboard/home',
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
    },
    {
      path: '/dashboard/settings',
      name: 'settings',
      component: Settings
    },
    {
      path: '/',
      name: 'admin-login',
      component: AdminLogin
    },
    {
      path: '/dashboard/products',
      name: 'products',
      component: Products
    },
    {
      path: '/dashboard/usermanagement',
      name: 'usermanagement',
      component: UserManagement
    },
    {
      path: '/signup/admin',
      name: 'admin-register',
      component: AdminSignup
    }
  ]
})

export default router
