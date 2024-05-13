<script setup lang="ts">
import SideBar from '@/components/SideBar.vue'
import { ref, onMounted, computed } from 'vue';
import { Icon } from '@iconify/vue';
import axios from 'axios';
import { Input } from '@/components/ui/input'
import { Card, CardDescription, CardTitle } from '@/components/ui/card'
import {
    Tabs,
    TabsContent,
    TabsList,
    TabsTrigger,
} from '@/components/ui/tabs'

const productItems = ref<Product[]>([]);

interface Product {
    productImage: null,
    productName: string,
    category: string,
    quantity: number,
    price: string,
    status: string,
}


function shuffleArray(array: any[]) {
    let currentIndex = array.length, randomIndex;

    while (currentIndex !== 0) {

        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];
    }

    return array;
}

onMounted(async () => {
    try {
        const response = await axios.get('http://127.0.0.1:8000/products');
        productItems.value = response.data;
    } catch (error) {
        console.error('Failed to fetch users', error);
    }
})

const shuffledProducts = computed(() => shuffleArray([...productItems.value]));

function getProductsByCategory(category: string) {
    return shuffledProducts.value.filter(product => product.category === category);
}

// SEARCH BAR //
const searchTerm = ref('');

const filteredProducts = computed(() =>
    shuffledProducts.value.filter(product =>
        product.productName.toLowerCase().includes(searchTerm.value.toLowerCase())
    )
);

</script>

<template>
    <div class="font-montserrat flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5 mt-10 space-y-4">
                <h1 class="text-3xl font-bold">Home</h1>
                <Input type="search" placeholder="Search..." class="md:w-[100px] lg:w-[500px] border"
                    v-model="searchTerm" />
            </div>
            <div>
                <div class="flex mx-5 space-x-1 bg-red-500 w-[240px] h-[40px] py-1.5 px-1.5">
                    <Icon icon="mdi:hot" class="h-[1.8rem] w-[1.8rem] text-white" />
                    <h1 class="text-white font-semibold text-lg text-center">Best Seller Products</h1>
                </div>
                <div class="grid grid-cols-5 gap-4 p-3">
                    <Card v-for="product in filteredProducts.slice(0, 5)" :key="product.productName" class="h-[270px]">
                        <div class="flex justify-center py-5">
                            <img :src="'/backend/public/assets/images/uploaded-images/' + product.productImage"
                                alt="product" class="w-[100px] h-[100px]" />
                        </div>
                        <div class="flex flex-col justify-center text-center h-[120px]  mx-2">
                            <CardTitle>{{ product.productName }}</CardTitle>
                            <CardDescription>{{ product.category }}</CardDescription>
                            <span>₱{{ product.price }}</span>
                        </div>
                    </Card>
                </div>
            </div>
            <div>
                <div class="space-y-3">
                    <div class="flex mx-5 space-x-1 bg-emerald-600 w-[150px] h-[40px] py-1.5 px-1.5">
                        <Icon icon="carbon:collapse-categories" class="h-[1.8rem] w-[1.8rem] text-white" />
                        <h1 class="text-white font-semibold text-lg text-center">Categories</h1>
                    </div>
                    <Tabs default-value="electronics" class="mx-4 space-y-4">
                        <TabsList>
                            <TabsTrigger value="electronics">
                                Electronics
                            </TabsTrigger>
                            <TabsTrigger value="software">
                                Software
                            </TabsTrigger>
                            <TabsTrigger value="hardware">
                                Hardware
                            </TabsTrigger>
                            <TabsTrigger value="tools">
                                Tools
                            </TabsTrigger>
                        </TabsList>
                        <TabsContent value="electronics" class="space-y-4">
                            <div class="grid grid-cols-5 gap-4 p-3">
                                <Card v-for="product in getProductsByCategory('Electronics')" :key="product.productName"
                                    class="h-[270px]">
                                    <div class="flex justify-center py-5">
                                        <img :src="'/backend/public/assets/images/uploaded-images/' + product.productImage"
                                            alt="product" class="w-[100px] h-[100px]" />
                                    </div>
                                    <div class="flex flex-col justify-center text-center h-[120px]  mx-2">
                                        <CardTitle>{{ product.productName }}</CardTitle>
                                        <CardDescription>{{ product.category }}</CardDescription>
                                        <span>₱{{ product.price }}</span>
                                    </div>
                                </Card>
                            </div>
                        </TabsContent>
                        <TabsContent value="software" class="space-y-4">
                            <div class="grid grid-cols-5 gap-4 p-3">
                                <Card v-for="product in getProductsByCategory('Software')" :key="product.productName"
                                    class="h-[270px]">
                                    <div class="flex justify-center py-5">
                                        <img :src="'/backend/public/assets/images/uploaded-images/' + product.productImage"
                                            alt="product" class="w-[100px] h-[100px]" />
                                    </div>
                                    <div class="flex flex-col justify-center text-center h-[120px]  mx-2">
                                        <CardTitle>{{ product.productName }}</CardTitle>
                                        <CardDescription>{{ product.category }}</CardDescription>
                                        <span>₱{{ product.price }}</span>
                                    </div>
                                </Card>
                            </div>
                        </TabsContent>
                        <TabsContent value="hardware" class="space-y-4">
                            <div class="grid grid-cols-5 gap-4 p-3">
                                <Card v-for="product in getProductsByCategory('Hardware')" :key="product.productName"
                                    class="h-[270px]">
                                    <div class="flex justify-center py-5">
                                        <img :src="'/backend/public/assets/images/uploaded-images/' + product.productImage"
                                            alt="product" class="w-[100px] h-[100px]" />
                                    </div>
                                    <div class="flex flex-col justify-center text-center h-[120px]  mx-2">
                                        <CardTitle>{{ product.productName }}</CardTitle>
                                        <CardDescription>{{ product.category }}</CardDescription>
                                        <span>₱{{ product.price }}</span>
                                    </div>
                                </Card>
                            </div>
                        </TabsContent>
                        <TabsContent value="tools" class="space-y-4">
                            <div class="grid grid-cols-5 gap-4 p-3">
                                <Card v-for="product in getProductsByCategory('Tools')" :key="product.productName"
                                    class="h-[270px]">
                                    <div class="flex justify-center py-5">
                                        <img :src="'/backend/public/assets/images/uploaded-images/' + product.productImage"
                                            alt="product" class="w-[100px] h-[100px]" />
                                    </div>
                                    <div class="flex flex-col justify-center text-center h-[120px]  mx-2">
                                        <CardTitle>{{ product.productName }}</CardTitle>
                                        <CardDescription>{{ product.category }}</CardDescription>
                                        <span>₱{{ product.price }}</span>
                                    </div>
                                </Card>
                            </div>
                        </TabsContent>
                    </Tabs>

                </div>


            </div>
        </div>
    </div>
</template>