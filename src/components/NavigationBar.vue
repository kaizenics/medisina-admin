<script setup lang="ts">
import ModeToggle from '@/components/ui/ModeToggle.vue'
</script>

<template>
    <nav class="container flex flex-col">
        <div class="my-7">
            <ul class="flex justify-between items-center">
                <li class="text-slate-700 dark:text-slate-100 font-montserrat font-bold text-4xl"><a
                        href="#">Medisina</a></li>
                <ul class="font-montserrat text-md flex space-x-10">
                    <li><a href="#">Our Experts</a></li>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
                <ul class="flex space-x-4">
                    <li class="font-monserrat font-semibold text-lg py-3"><a href="#">Login</a></li>
                    <button class="font-montserrat text-md bg-slate-800 text-white py-3 px-4">Sign up for free</button>
                    <div class="py-2">
                        <ModeToggle />
                    </div>
                </ul>
            </ul>
        </div>
    </nav>
</template>
