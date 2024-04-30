<script setup lang="ts">
import { useRouter } from 'vue-router';
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Button } from '@/components/ui/button'
import axios from 'axios';
import { ref } from 'vue'

const router = useRouter()

const username = ref('')
const email = ref('')
const password = ref('')

const usernameWarning = ref('')
const emailWarning = ref('')
const passwordWarning = ref('')

function validateForm() {
    let isValid = true

    if (!username.value.trim()) {
        usernameWarning.value = 'Username is required'
        isValid = false
    } else if (username.value.trim().length < 2) {
        usernameWarning.value = 'Username must be at least 2 characters long'
        isValid = false
    } else {
        usernameWarning.value = ''
    }

    if (!email.value.trim()) {
        emailWarning.value = 'Email is required'
        isValid = false
    } else if (!/\S+@\S+\.\S+/.test(email.value.trim())) {
        emailWarning.value = 'Invalid email format'
        isValid = false
    } else {
        emailWarning.value = ''
    }

    if (!password.value.trim()) {
        passwordWarning.value = 'Password is required'
        isValid = false
    } else if (password.value.trim().length < 6) {
        passwordWarning.value = 'Password must be at least 6 characters long'
        isValid = false
    } else {
        passwordWarning.value = ''
    }

    return isValid
}

async function handleSubmit(event: Event) {
    event.preventDefault();
    if (validateForm()) {
        try {
            await axios.post('http://127.0.0.1:8000/api/user/register', {
                name: username.value,
                email: email.value,
                password: password.value,
            });

            alert('User registered successfully. Please login.');
            router.push('/');
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
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
                        <h1 class="text-5xl font-bold text-gray-200">Create an account for Admin</h1>
                        <div class="w-[200px] h-[9px] my-7 bg-emerald-500"></div>
                        <p class="text-gray-200 pr-10">This is exclusive for an authorized personnel only.</p>
                    </div>
                </div>
                <div class="w-[350px] rounded-r-lg bg-gray-300">
                    <div class="flex flex-col space-y-2 py-10 px-5">
                        <h1 class="text-2xl font-bold dark:text-gray-900">Signup</h1>
                        <div class="space-y-1">
                            <Label for="username" class="dark:text-gray-900">Enter full name</Label>
                            <Input v-model="username" id="username" type="text"
                                class="border-none dark:bg-gray-100 text-gray-900"
                                :class="{ 'border-red-500': passwordWarning }" />
                            <span class="text-sm text-red-500">{{ usernameWarning }}</span>
                        </div>

                        <div class="space-y-1">
                            <Label for="username" class="dark:text-gray-900">Email</Label>
                            <Input v-model="email" id="username" type="text"
                                class="border-none dark:bg-gray-100 text-gray-900"
                                :class="{ 'border-red-500': emailWarning }" />
                            <span class="text-sm text-red-500">{{ emailWarning }}</span>
                        </div>

                        <div class="space-y-1">
                            <Label for="password" class="dark:text-gray-900">Password</Label>
                            <Input v-model="password" id="password" type="password"
                                class="border-none dark:bg-gray-100 text-gray-900"
                                :class="{ 'border-red-500': passwordWarning }" />
                            <span class="text-sm text-red-500">{{ passwordWarning }}</span>
                        </div>

                        <Button @click="handleSubmit" class="dark:bg-gray-900 text-gray-200">Signup</Button>

                        <!--  <div class="text-sm flex justify-center dark:text-gray-900">
                            Already have an account? <span class="text-emerald-500 cursor-pointer"><router-link
                                    to="/login">Login</router-link></span>
                        </div>  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>