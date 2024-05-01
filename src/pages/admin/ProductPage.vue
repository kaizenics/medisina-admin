<script setup lang="ts">
import { ref, computed } from 'vue';
import { Icon } from '@iconify/vue'

import SideBar from '@/components/SideBar.vue'
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'

import { Input } from '@/components/ui/input'

import {
    Button,
} from '@/components/ui/button'

const products = [
    {
        productId: 'PROD-001',
        productImage: '',
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },
    {
        productId: 'PROD-001',
        productImage: '',
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },

    {
        productId: 'PROD-001',
        productImage: '',
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },



]

const rowsPerPage = 8;
const currentPage = ref(1);

const totalPages = computed(() => {
    return Math.ceil(products.length / rowsPerPage);
});

const paginatedProducts = computed(() => {
    const start = (currentPage.value - 1) * rowsPerPage;
    const end = currentPage.value * rowsPerPage;
    return products.slice(start, end);
});

function goToPage(page: number) {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
}
</script>

<template>
    <main class="font-montserrat flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5 mt-10 h-[720px]">
                <h1 class="text-3xl font-bold dark:text-white tracking-tight">Products</h1>
                <div class="flex justify-between py-3">
                    <Input type="search" placeholder="Search..." class="md:w-[100px] lg:w-[500px] border" />
                    <Button class="bg-emerald-500 hover:bg-emerald-600 text-white">New Product</Button>
                </div>
                <Table class="border">
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[120px]">
                                Product ID
                            </TableHead>
                            <TableHead class="w-[50px]"></TableHead>
                            <TableHead>Product Name</TableHead>
                            <TableHead>Category</TableHead>
                            <TableHead>Quantity</TableHead>
                            <TableHead>Price</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead>Action</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <template v-for="product in paginatedProducts" :key="product.productId">
                            <TableRow>
                                <TableCell class="font-medium">
                                    {{ product.productId }}
                                </TableCell>
                                <TableCell>{{ product.productImage }}</TableCell>
                                <TableCell>{{ product.productName }}</TableCell>
                                <TableCell>{{ product.category }}</TableCell>
                                <TableCell>{{ product.quantity }}</TableCell>
                                <TableCell>{{ product.price }}</TableCell>
                                <TableCell>{{ product.status }}</TableCell>
                                <TableCell class="w-10">
                                    <div class="flex space-x-2">
                                        <Button
                                            class="border bg-transparent text-black dark:text-white hover:bg-transparent hover:border-gray-700">Edit</Button>
                                        <Button class="border bg-red-500 text-white hover:bg-red-600">Delete</Button>
                                    </div>
                                </TableCell>
                            </TableRow>
                        </template>
                    </TableBody>
                </Table>
            </div>

            <div class="mt-5 flex justify-center space-x-2">
                <div class="space-x-1">

                    <Button @click="goToPage(1)" :disabled="currentPage === 1"
                        class="bg-transparent border hover:bg-gray-200 hover:dark:bg-gray-800">
                        <Icon icon="material-symbols-light:first-page"
                            class="h-[1.5rem] w-[1.5rem] text-black dark:text-white" />
                    </Button>
                    <Button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1"
                        class="bg-transparent border hover:bg-gray-200 hover:dark:bg-gray-800">
                        <Icon icon="material-symbols-light:navigate-before"
                            class="h-[1.5rem] w-[1.5rem] text-black dark:text-white" />
                    </Button>
                </div>
                <Button v-for="page in totalPages" :key="page" @click="goToPage(page)"
                    :class="{ 'text-lg dark:bg-white dark:text-black': currentPage === page, 'text-lg bg-transparent text-black dark:text-white': currentPage !== page, 'hover:bg-gray-200 hover:dark:bg-gray-800': currentPage !== page }"
                    class="border mx-1">
                    {{ page }}
                </Button>
                <div class="space-x-1">
                    <Button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages"
                        class="bg-transparent border hover:bg-gray-200 hover:dark:bg-gray-800">
                        <Icon icon="material-symbols-light:navigate-next"
                            class="h-[1.2rem] w-[1.5rem] text-black dark:text-white" />
                    </Button>
                    <Button @click="goToPage(totalPages)" :disabled="currentPage === totalPages"
                        class="bg-transparent border hover:bg-gray-200 hover:dark:bg-gray-800">
                        <Icon icon="material-symbols-light:last-page"
                            class="h-[1.2rem] w-[1.5rem] text-black dark:text-white" />
                    </Button>
                </div>
            </div>
        </div>
    </main>
</template>