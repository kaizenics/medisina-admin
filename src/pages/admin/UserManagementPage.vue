<script setup lang="ts">
import SideBar from '@/components/SideBar.vue'
import {
    Tabs,
    TabsContent,
    TabsList,
    TabsTrigger,
} from '@/components/ui/tabs'
</script>

<template>
    <main class="flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5 mt-10 space-y-4">
                <h1 class="text-3xl font-bold dark:text-white">User Management</h1>
                <Tabs default-value="overview" class="space-y-4">
                    <TabsList>
                        <TabsTrigger value="overview">
                            Admins
                        </TabsTrigger>
                        <TabsTrigger value="notifications">
                            Users
                        </TabsTrigger>
                    </TabsList>
                    <TabsContent value="overview" class="space-y-4">

                    </TabsContent>
                </Tabs>
            </div>
        </div>
    </main>

</template>