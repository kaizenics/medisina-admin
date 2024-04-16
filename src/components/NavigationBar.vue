<script setup lang="ts">
import { useRouter } from 'vue-router';
import ModeToggle from '@/components/ui/ModeToggle.vue';

const router = useRouter();

const goToLogin = () => {
    router.push('/login');
};

const goToSignUp = () => {
    router.push('/signup');
};
</script>


<template>
    <div>
        <nav class="container mx-auto flex flex-col">
            <div class="my-14">
                <ul class="flex justify-between items-center">
                    <li class="text-emerald-500 font-montserrat font-bold text-4xl"><a href="/">
                            Medisina</a></li>
                    <ul class="font-montserrat text-md flex space-x-10">
                        <li><a href="#experts">Our Experts</a></li>
                        <li><a href="#newsletter">Newsletter</a></li>
                        <li><a href="#faq">FAQs</a></li>
                    </ul>
                    <ul class="flex space-x-4">
                        <h1 class="font-monserrat font-semibold text-lg py-3 cursor-pointer" @click="goToLogin">
                            Login
                        </h1>

                        <button
                            class="font-montserrat text-md bg-gray-800 text-white py-3 px-4 rounded-sm hover:bg-gray-900 transition-colors duration-300"
                            @click="goToSignUp">
                            Sign up for free
                        </button>

                        <div class="py-2">
                            <ModeToggle />
                        </div>
                    </ul>
                </ul>
            </div>
        </nav>

    </div>
</template>
