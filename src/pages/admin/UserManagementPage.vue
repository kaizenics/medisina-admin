<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { RouterLink } from 'vue-router';
import axios from 'axios';

import SideBar from '@/components/SideBar.vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import {
    Card,
    CardDescription,
    CardTitle,
} from '@/components/ui/card'
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'

const users = ref<User[]>([]);

interface User {
    id: number;
    name: string;
    email: string;
    avatar: string;
    role: string;
}

onMounted(async () => {
    try {
        const response = await axios.get('http://127.0.0.1:8000/api/users');
        users.value = response.data;
    } catch (error) {
        console.error('Failed to fetch users', error);
    }
});
</script>

<template>
    <main class="flex font-montserrat">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5 mt-10 space-y-4">
                <h1 class="text-3xl font-bold dark:text-white">User Management</h1>
                <div class="flex justify-between">
                    <Input type="search" placeholder="Search..." class="md:w-[100px] lg:w-[500px] border" />
                    <router-link to="/signup/admin"><Button
                            class="bg-emerald-500 hover:bg-emerald-600 text-white">Register New
                            user
                        </Button></router-link>
                </div>
                <div class="grid grid-cols-4 gap-4 px-14">
                    <Card v-for="user in users" :key="user.id" class="flex h-[150px] w-[350px]">
                        <div class="flex justify-center my-10 mx-4">
                            <Avatar>
                                <AvatarImage :src="user.avatar" :alt="user.name" />
                                <AvatarFallback>{{ user.name.charAt(0) }}</AvatarFallback>
                            </Avatar>
                        </div>
                        <div class="flex flex-col justify-center h-[150px]  mx-2">
                            <CardTitle>{{ user.name }}</CardTitle>
                            <CardDescription>{{ user.email }}</CardDescription>
                            <span>{{ user.role }}</span>
                        </div>
                    </Card>
                </div>
            </div>
        </div>
    </main>
</template>