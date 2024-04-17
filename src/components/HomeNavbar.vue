<script setup lang="ts">
import HomeToggle from '@/components/ui/toggle/HomeToggle.vue';
import { Icon } from '@iconify/vue'
</script>

<template>
    <nav class="bg-gray-950 dark:bg-gray-950">
        <div class="font-montserrat container mx-auto px-0 flex flex-col">
            <div class="my-4">
                <ul class="flex justify-between items-center">
                    <li class="text-emerald-500 font-montserrat font-bold text-4xl"><a href="/">Medisina</a></li>

                    <ul class="flex justify-end">
                        <div class="relative">
                            <input type="text" placeholder="Search for Brand or Generic Medicine"
                                class="outline-none py-2 px-5 text-gray-900 w-[600px] h-[40px]">
                            <button class="absolute bg-gray-900 py-2 px-10 top-0 right-0 text-gray-200">Search</button>
                        </div>


                    </ul>
                    <ul class="flex space-x-4">
                        <div class="font-monserrat font-semibold text-lg py-3 cursor-pointer">
                            <Icon icon="mdi:cart" class="h-[1.8rem] w-[1.8rem] text-white" />
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