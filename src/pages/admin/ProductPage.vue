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

import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'

import { Input } from '@/components/ui/input'

import {
    Button,
} from '@/components/ui/button'

const products = [
    {
        productId: 'PROD-001',
        productImage: apple12,
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },
    {
        productId: 'PROD-001',
        productImage: apple12,
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },

    {
        productId: 'PROD-001',
        productImage: apple12,
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },
    {
        productId: 'PROD-001',
        productImage: apple12,
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },

    {
        productId: 'PROD-001',
        productImage: apple12,
        productName: 'Apple iPhone 12 Pro Max',
        category: 'Electronics',
        quantity: 10,
        price: '$250.00',
        status: 'In Stock',
    },

]

// PAGINATION //

const rowsPerPage = 5;
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

// MODAL
const isModalOpen = ref(false);
const newProduct = ref({
    productImage: '',
    productName: '',
    category: '',
    quantity: 0,
    price: '$0.00',
    status: 'In Stock',

});

function openModal() {
    isModalOpen.value = true;
}

function addProduct() {
    products.push({
        productId: `PROD-${products.length + 1}`,
        productImage: '',
        productName: newProduct.value.productName,
        category: '',
        quantity: 0,
        price: '$0.00',
        status: 'In Stock',
    });
    isModalOpen.value = false;
    newProduct.value = {
        productImage: '',
        productName: '',
        category: '',
        quantity: 0,
        price: '$0.00',
        status: 'In Stock',
    };
}

function closeModal() {
    isModalOpen.value = false;
}

// IMAGES //
import apple12 from '@/assets/images/apple.jpg'

</script>

<template>
    <main class="font-montserrat flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">

            <!-- Products Table -->
            <div class="p-5 mt-10 h-[700px]">
                <h1 class="text-3xl font-bold dark:text-white tracking-tight">Products</h1>
                <div class="flex justify-between py-3">
                    <Input type="search" placeholder="Search..." class="md:w-[100px] lg:w-[500px] border" />
                    <Button @click="openModal" class="bg-emerald-500 hover:bg-emerald-600 text-white">New
                        Product</Button>
                </div>
                <Table class="border">
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[120px]">
                                Product ID
                            </TableHead>
                            <TableHead class="w-[120px]"></TableHead>
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
                                <TableCell>
                                    <img :src="product.productImage" alt="apple" class="h-[70px]">
                                </TableCell>
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

            <!-- Pagination -->
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

            <!-- Add Product Modal -->
            <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-950 bg-opacity-50">
                <div class="bg-white dark:bg-gray-950 border p-6 rounded-lg shadow-xl w-96">
                    <h2 class="text-2xl font-bold mb-4">Add New Product</h2>
                    <form @submit.prevent="addProduct">
                        <div class="mb-4">
                            <label for="productName" class="block text-sm font-medium dark:text-white">Product
                                Name</label>
                            <Input type="text" id="productName" v-model="newProduct.productName" />
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium dark:text-white">Category</label>
                            <Select>
                                <SelectTrigger>
                                    <SelectValue placeholder="Select a Category" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectGroup>
                                        <SelectItem value="electronics">
                                            Electronics
                                        </SelectItem>
                                        <SelectItem value="software">
                                            Software
                                        </SelectItem>
                                        <SelectItem value="hardware">
                                            Hardware
                                        </SelectItem>
                                        <SelectItem value="tools">
                                            Tools
                                        </SelectItem>
                                    </SelectGroup>
                                </SelectContent>
                            </Select>
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium dark:text-white">Quantity</label>
                            <Input type="text" id="quantity" v-model="newProduct.quantity" />
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium dark:text-white">Price</label>
                            <Input type="text" id="price" v-model="newProduct.price" />
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium dark:text-white">Status</label>
                            <Input type="text" id="status" v-model="newProduct.status" />
                        </div>

                        <div class="flex justify-end">
                            <Button type="submit"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-md">Add
                                Product</button>
                            <Button @click="closeModal" type="button"
                                class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</template>