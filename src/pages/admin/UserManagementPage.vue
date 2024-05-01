<script setup lang="ts">
import SideBar from '@/components/SideBar.vue'
import { Input } from '@/components/ui/input'
import {
    Card,
    CardDescription,
    CardTitle,
} from '@/components/ui/card'
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
</script>

<template>
    <main class="flex font-montserrat">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5 mt-10 space-y-4">
                <h1 class="text-3xl font-bold dark:text-white">User Management</h1>
                <div class="flex justify-between">
                    <Input type="search" placeholder="Search..." class="md:w-[100px] lg:w-[500px] border" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <Card class="flex h-[150px]">

                        <div class="flex justify-center my-10 mx-4">
                            <Avatar>
                                <AvatarImage src="https://github.com/radix-vue.png" alt="@radix-vue" />
                                <AvatarFallback>CN</AvatarFallback>
                            </Avatar>
                        </div>
                        <div class="flex flex-col justify-center h-[150px]  mx-2">
                            <CardTitle>Niko Soriano</CardTitle>
                            <CardDescription>@nikosoriano</CardDescription>
                            <span>Admin</span>
                        </div>
                    </Card>
                </div>
            </div>
        </div>
    </main>

</template>