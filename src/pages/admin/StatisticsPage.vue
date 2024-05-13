<script setup lang="ts">
import SideBar from '@/components/SideBar.vue'
import RecentSales from '@/components/dashboard/RecentSales.vue'
import Overview from '@/components/dashboard/OverviewBar.vue'
import { ref, onMounted } from 'vue';
import axios from 'axios';

const totalAmount = ref<number>(0);
const totalQuantities = ref<number>(0);
const totalProducts = ref<number>(0);

import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card'
import {
    Tabs,
    TabsContent,
    TabsList,
    TabsTrigger,
} from '@/components/ui/tabs'

onMounted(async () => {
    try {
        const response = await axios.get('http://127.0.0.1:8000/api/products');
        const products = response.data;

        totalAmount.value = products.reduce((acc: any, curr: any) => acc + Number(curr.price), 0);
        totalQuantities.value = products.reduce((acc: any, curr: any) => acc + Number(curr.quantity), 0);
        totalProducts.value = products.length;
    } catch (error) {
        console.error('Failed to fetch products', error);
    }
});
</script>

<template>
    <div class="font-montserrat flex">
        <SideBar />
        <div class="flex-col flex-1 mt-10">
            <div class="flex-1 space-y-4 p-5 pt-6">
                <div class="flex items-center justify-between space-y-2">
                    <h2 class="text-3xl font-bold tracking-tight">
                        Dashboard
                    </h2>
                </div>
                <Tabs default-value="overview" class="space-y-4">
                    <TabsList>
                        <TabsTrigger value="overview">
                            Overview
                        </TabsTrigger>
                        <TabsTrigger value="notifications">
                            Notifications
                        </TabsTrigger>
                    </TabsList>
                    <TabsContent value="overview" class="space-y-4">
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                            <Card>
                                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                                    <CardTitle class="text-sm font-medium">
                                        Amount
                                    </CardTitle>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                        strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                    </svg>
                                </CardHeader>
                                <CardContent>
                                    <div class="text-2xl font-bold">
                                        ₱{{ totalAmount.toFixed(2) }}
                                    </div>
                                    <p class="text-xs text-muted-foreground">
                                        Total amount of all products
                                    </p>
                                </CardContent>
                            </Card>

                            <Card>
                                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                                    <CardTitle class="text-sm font-medium">
                                        Quantities
                                    </CardTitle>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                        strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                                        <rect width="20" height="14" x="2" y="5" rx="2" />
                                        <path d="M2 10h20" />
                                    </svg>
                                </CardHeader>
                                <CardContent>
                                    <div class="text-2xl font-bold">
                                        {{ totalQuantities }}
                                    </div>
                                    <p class="text-xs text-muted-foreground">
                                        Total quantities of all products
                                    </p>
                                </CardContent>
                            </Card>

                            <Card>
                                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                                    <CardTitle class="text-sm font-medium">
                                        Products
                                    </CardTitle>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                        strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                                    </svg>
                                </CardHeader>
                                <CardContent>
                                    <div class="text-2xl font-bold">
                                        {{ totalProducts }}
                                    </div>
                                    <p class="text-xs text-muted-foreground">
                                        Total of all products
                                    </p>
                                </CardContent>
                            </Card>

                        </div>
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
                            <Card class="col-span-4">
                                <CardHeader>
                                    <CardTitle>Overview</CardTitle>
                                </CardHeader>
                                <CardContent class="pl-2">
                                    <Overview />
                                </CardContent>
                            </Card>
                            <Card class="col-span-3">
                                <CardHeader>
                                    <CardTitle>Recent Products</CardTitle>
                                    <CardDescription>
                                        Recently Products that configured
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <RecentSales />
                                </CardContent>
                            </Card>
                        </div>
                    </TabsContent>
                </Tabs>
            </div>
        </div>
    </div>
</template>