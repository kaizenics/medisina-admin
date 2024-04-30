<script setup lang="ts">
import HomeToggle from '@/components/ui/toggle/HomeToggle.vue';
import { RouterLink } from 'vue-router';
</script>


<template>
    <div>
        <div class="font-montserrat flex h-screen border-r">
            <div class="w-64 bg-gray-950 overflow-hidden shadow-xl">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center space-x-2">
                        <span class="mx-4 text-2xl font-bold text-emerald-500">TechTrove</span>
                        <HomeToggle />
                    </div>
                </div>
                <nav class="mt-10">
                    <router-link active-class="shadow"
                        :class="['flex items-center mt-4 py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/home' ? 'bg-gray-900 border-r-4' : '']"
                        to="/dashboard/home">
                        <span class="mx-4">Home</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/products' ? 'bg-gray-900 border-r-4' : '']"
                        to="/dashboard/products">
                        <span class="mx-4">Product Lists</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/users' ? 'bg-gray-900 border-r-4' : '']"
                        to="/dashboard/users">
                        <span class="mx-4">Users</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/settings' ? 'bg-gray-900 border-r-4' : '']"
                        to="/dashboard/settings">
                        <span class="mx-4">Settings</span>
                    </router-link>
                    <router-link active-class="shadow"
                        :class="['flex items-center py-4 px-6 text-red-500 border-emerald-600', $route.path === '/' ? 'bg-gray-900 border-r-4' : '']"
                        to="/">
                        <span class="mx-4">Logout</span>
                    </router-link>
                </nav>
            </div>

        </div>
    </div>
</template>