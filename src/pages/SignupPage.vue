<script setup lang="ts">
import { useRouter } from 'vue-router';
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
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

function handleSubmit(event: Event) {
    event.preventDefault()
    if (validateForm()) {
        localStorage.setItem('username', username.value)
        localStorage.setItem('email', email.value)
        localStorage.setItem('password', password.value)

        router.push('/login');
    }
}
</script>

<template>
    <div class="container mx-auto">
        <div class="flex justify-center items-center h-screen">
            <Card class="w-[500px]">
                <CardContent class="font-montserrat pt-6 text-4xl font-bold">Signup</CardContent>
                <form @submit="handleSubmit" class="pb-7 px-8">
                    <div class="space-y-4">
                        <div>
                            <Label for="username">Username</Label>
                            <Input id="username" type="text" placeholder="Username" v-model="username" />
                            <p class="text-red-500">{{ usernameWarning }}</p>
                        </div>
                        <div>
                            <Label for="email">Email</Label>
                            <Input id="email" type="email" placeholder="Email" v-model="email" />
                            <p class="text-red-500">{{ emailWarning }}</p>
                        </div>
                        <div>
                            <Label for="password">Password</Label>
                            <Input id="password" type="password" placeholder="Password" v-model="password" />
                            <p class="text-red-500">{{ passwordWarning }}</p>
                        </div>
                        <Button type="submit">Submit</Button>
                    </div>
                </form>
            </Card>
        </div>
    </div>
</template>