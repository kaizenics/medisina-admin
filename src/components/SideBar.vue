<script setup lang="ts">
import { RouterLink } from 'vue-router';
import { useRouter } from 'vue-router';
const router = useRouter();

const logout = () => {
    const confirmation = window.confirm("Are you sure you want to logout?");
    if (confirmation) {

        router.push('/');
    }
};
</script>

<template>
    <div>
        <div class="sticky top-0 w-64 h-screen bg-gray-950 overflow-hidden border-r">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center space-x-2">
                    <span class="mx-4 text-2xl font-bold text-emerald-500">TechTrove</span>
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
                    :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/statistics' ? 'bg-gray-900 border-r-4' : '']"
                    to="/dashboard/statistics">
                    <span class="mx-4">Statistics</span>
                </router-link>
                <router-link active-class="shadow"
                    :class="['flex items-center py-4 px-6 text-white border-emerald-600', $route.path === '/dashboard/settings' ? 'bg-gray-900 border-r-4' : '']"
                    to="/dashboard/settings">
                    <span class="mx-4">Settings</span>
                </router-link>
                <div active-class="shadow"
                    :class="['flex items-center py-4 px-6 text-red-500 border-emerald-600 cursor-pointer', $route.path === '/' ? 'bg-gray-900 border-r-4' : '']"
                    @click="logout">
                    <span class="mx-4">Logout</span>
                </div>
            </nav>
        </div>

    </div>

</template>