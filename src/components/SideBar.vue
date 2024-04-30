<script setup lang="ts">
import { defineProps } from 'vue';
import { RouterLink } from 'vue-router';
</script>


<template>
    <div>
        <div class="font-montserrat flex h-screen">
            <div class="w-64 bg-gray-900 overflow-hidden shadow-xl">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <span class="mx-4 text-2xl font-bold text-emerald-500">Medisina</span>
                    </div>
                </div>
                <nav class="mt-10">
                    <router-link active-class="shadow"
                        :class="['flex items-center mt-4 py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/home' ? 'bg-gray-800 border-r-4' : '']"
                        to="/dashboard/home">
                        <span class="mx-4">Home</span>
                    </router-link>
                    <!--  <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/orders' ? 'bg-gray-800 border-r-4' : '']"
                        to="/dashboard/orders">
                        <span class="mx-4">Orders</span>
                    </router-link> -->
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/products' ? 'bg-gray-800 border-r-4' : '']"
                        to="/dashboard/products">
                        <span class="mx-4">Product Lists</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/usermanagement' ? 'bg-gray-800 border-r-4' : '']"
                        to="/dashboard/usermanagement">
                        <span class="mx-4">User Management</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/settings' ? 'bg-gray-800 border-r-4' : '']"
                        to="/dashboard/settings">
                        <span class="mx-4">Settings</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-red-500 border-emerald-600', $route.path === '/' ? 'bg-gray-800 border-r-4' : '']"
                        to="/">
                        <span class="mx-4">Logout</span>
                    </router-link>
                </nav>
            </div>

        </div>
    </div>
</template>