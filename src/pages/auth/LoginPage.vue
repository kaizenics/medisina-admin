<script setup lang="ts">
import { useRouter } from 'vue-router';
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import NavigationBar from '@/components/NavigationBar.vue';
import { ref } from 'vue'

/* Images */

import handImg from '@/assets/images/hand.png'

const router = useRouter()

const username = ref('')
const password = ref('')

const usernameWarning = ref('')
const passwordWarning = ref('')

function validateForm() {
    let isValid = true

    if (!username.value.trim()) {
        usernameWarning.value = 'Username is required'
        isValid = false
    } else {
        usernameWarning.value = ''
    }

    if (!password.value.trim()) {
        passwordWarning.value = 'Password is required'
        isValid = false
    } else {
        passwordWarning.value = ''
    }

    return isValid
}

function handleSubmit(event: Event) {
    event.preventDefault()
    if (validateForm()) {
        const savedUsername = localStorage.getItem('username')
        const savedPassword = localStorage.getItem('password')

        if (username.value === savedUsername && password.value === savedPassword) {
            router.push('/dashboard')
        } else {
            alert('Invalid username or password')
        }
    }
}
</script>

<template>
    <div class="font-montserrat container mx-auto">
        <div class="flex justify-center items-center h-screen">
            <div class="flex h-[500px] ">
                <div class="w-[600px] rounded-l-lg bg-gray-800">
                    <div class="my-20 mx-10">
                        <h1 class="text-5xl font-bold text-gray-200">Welcome Back to Medisina</h1>
                        <div class="w-[200px] h-[9px] my-7 bg-emerald-500"></div>
                        <p class="text-gray-200">Login to continue to your account.</p>
                    </div>
                </div>
                <div class="w-[350px] rounded-r-lg bg-gray-300">
                    <div class="flex flex-col space-y-4 py-10 px-5">
                        <h1 class="text-2xl font-bold dark:text-gray-900">Login</h1>
                        <div class="space-y-1">
                            <Label for="username" class="dark:text-gray-900">Username</Label>
                            <Input v-model="username" id="username" type="text" class="dark:bg-gray-100 text-gray-900"
                                :class="{ 'border-red-500': usernameWarning }" />
                            <span class="text-sm text-red-500">{{ usernameWarning }}</span>
                        </div>

                        <div class="space-y-1">
                            <Label for="password" class="dark:text-gray-900">Password</Label>
                            <Input v-model="password" id="password" type="password"
                                class="dark:bg-gray-100 text-gray-900" :class="{ 'border-red-500': passwordWarning }" />
                            <span class="text-sm text-red-500">{{ passwordWarning }}</span>
                        </div>

                        <Button @click="handleSubmit" class="dark:bg-gray-900 text-gray-200">Login</Button>
                        <div class="text-sm flex justify-center cursor-pointer underline dark:text-gray-900">Forget
                            Password</div>

                        <div class="text-sm flex justify-center dark:text-gray-900">
                            Don't have an account? <span class="text-emerald-500 cursor-pointer"><router-link
                                    to="/signup">Signup</router-link></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
