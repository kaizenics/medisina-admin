<script setup lang="ts">
import HomeToggle from '@/components/ui/toggle/HomeToggle.vue';
import { Icon } from '@iconify/vue'
</script>

<template>
    <nav class="bg-gray-950">
        <div class="font-montserrat container mx-auto px-0 py-4 flex flex-col">
            <div class="my-1">
                <ul class="flex justify-between items-center">
                    <li class="text-emerald-500 font-montserrat font-bold text-4xl"><a href="/">Medisina</a></li>

                    <ul class="flex flex-col justify-end pt-5">
                        <div class="relative">
                            <input type="text" placeholder="Search for Brand or Generic Medicine"
                                class="outline-none py-2 px-5 text-gray-900 w-[600px] h-[40px]">
                            <button
                                class="absolute bg-gray-900 py-2 px-5 top-0 right-0 text-gray-200 hover:bg-gray-800 transition-colors duration-300">Search</button>
                        </div>
                        <h1 class="text-sm text-white">Keywords: Medisina Vitamin E or Guardian Goats Milk
                        </h1>
                    </ul>
                    <ul class="flex space-x-4">
                        <div class="bg-gray-800 w-[110px] h-[40px] m-auto rounded-sm py-3 cursor-pointer">
                            <div class="flex justify-center space-x-3">

                                <Icon icon="bi:cart" class="h-[1.2rem] w-[1.2rem] text-white" />
                                <p class="font-semibold text-white text-sm">0 item/s</p>
                            </div>
                        </div>
                        <div class="font-monserrat font-semibold text-lg py-3 cursor-pointer">
                            <Icon icon="ant-design:menu-outlined" class="h-[1.8rem] w-[1.8rem] text-white" />
                        </div>

                        <div class="flex flex-col">

                            <HomeToggle />
                        </div>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
</template>