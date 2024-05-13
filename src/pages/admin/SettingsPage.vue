<script setup lang="ts">
import SideBar from '@/components/SideBar.vue'
import { Separator } from '@/components/ui/separator'

import { useColorMode } from '@vueuse/core'

const mode = useColorMode()

import systemTheme from '@/assets/images/theme/system.jpg'
import darkTheme from '@/assets/images/theme/dark.png'
import lightTheme from '@/assets/images/theme/light.png'

import {
    Card,
    CardDescription,
} from '@/components/ui/card'
</script>

<template>
    <main class="font-montserrat flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5 mt-10 space-y-4">
                <Card class="w-full h-[300px]">
                    <div class="p-5">
                        <h1 class="text-3xl font-semibold">Appearance</h1>
                        <CardDescription>Choose how TechTrove looks to you. Select a single theme, or sync with your
                            system
                            and automatically switch between day and night themes.</CardDescription>
                        <Separator class="my-4" />
                        <div class="flex space-x-1">
                            <div @click="mode = 'light'" class="space-y-2 p-2 border rounded bg-transparent dark:text-white cursor-pointer">
                                <img :src="lightTheme" alt="Light Theme" class="border rounded w-[170px] h-[100px]" />
                                <h1>Light</h1>
                            </div>
                            <div @click="mode = 'dark'" class="space-y-2 p-2 border rounded bg-transparent dark:text-white cursor-pointer">
                                <img :src="darkTheme" alt="Dark Theme" class="border w-[170px] h-[100px]" />
                                <h1>Dark</h1>
                            </div>
                            <div @click="mode = 'auto'" class="space-y-2 p-2 border rounded bg-transparent dark:text-white cursor-pointer">
                                <img :src="systemTheme" alt="System Theme" class="border rounded w-[170px] h-[100px]" />
                                <h1>System</h1>
                            </div>
                        </div>
                    </div>
                </Card>
            </div>
        </div>
    </main>
</template>