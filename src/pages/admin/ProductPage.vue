<script setup lang="ts">
import { ref, computed } from 'vue';
import { onMounted } from 'vue';
import { Icon } from '@iconify/vue'
import axios from 'axios';

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

// ADD PRODUCT //
const product = ref<Product[]>([]);
const apiURL = 'http://127.0.0.1:8000/products/';

interface Product {
    productId: string;
    productImage: string;
    productName: string;
    category: string;
    quantity: number;
    price: string;
    status: string;
}

onMounted(async () => {
    const response = await axios.get(apiURL);
    product.value = response.data;
});

const allowedCategories = computed(() => ['Electronics', 'Software', 'Hardware', 'Tools']);

async function addProduct() {
    try {
        const formData = new FormData();
        if (newProduct.value.productImage) {
            formData.append('productImage', newProduct.value.productImage);
        }
        formData.append('productName', newProduct.value.productName);
        formData.append('category', newProduct.value.category);
        formData.append('quantity', newProduct.value.quantity.toString());
        formData.append('price', newProduct.value.price);
        formData.append('status', newProduct.value.status);

        if (!allowedCategories.value.includes(newProduct.value.category)) {
            throw new Error('Invalid category selected');
        }

        const response = await axios.post(apiURL, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });
        product.value.push(response.data as typeof product.value[0]);

        isModalOpen.value = false;
        newProduct.value = {
            productImage: null,
            productName: '',
            category: '',
            quantity: 0,
            price: '',
            status: 'In Stock',
        };

        alert('Product added successfully!');
        window.location.href = '/dashboard/products';
    } catch (error) {
        console.error('Failed to add product', error);
    }
}

function handleImageUpload(event: any) {
    const file = event.target.files[0];
    if (file) {
        newProduct.value.productImage = file;
    }
}

function updateSelectedProductImage(event: any) {
    const file = event.target.files[0];
    if (file) {
        if (selectedProduct.value) {
            selectedProduct.value.productImage = file;
        }
    }
}


// DELETE PRODUCT //
async function deleteProduct(productId: any) {
    const confirmation = window.confirm(
        "Are you sure you want to remove this item?"
    );
    if (!confirmation) {
        return;
    }

    try {
        await axios.delete(`${apiURL}${productId}`);
        product.value = product.value.filter((product: any) => product.productId !== productId);
    } catch (error) {
        console.error('Failed to delete product', error);
    }
}

// EDIT/UPDATE PRODUCT //

/* NOTE: Fetching the ProductImage is not functional and needs to be fixed. 
   All are working and it can fetched from the backend except the productImage.
*/

const selectedProduct = ref<Product | null>(null);

function openEditModal(product: Product) {
    selectedProduct.value = { ...product };
    isModalOpen.value = true;
}

async function editSelectedProduct() {
    try {
        if (!selectedProduct.value) {
            return;
        }

        if (!selectedProduct.value.productImage) {
            selectedProduct.value.productImage = 'default-image-url.jpg';
        }
        if (!allowedCategories.value.includes(selectedProduct.value.category)) {
            throw new Error('Invalid category selected');
        }

        const response = await axios.put(`${apiURL}${selectedProduct.value.productId}`, selectedProduct.value);
        const index = product.value.findIndex((p) => p.productId === selectedProduct.value?.productId);
        product.value.splice(index, 1, response.data as typeof product.value[0]);

        isModalOpen.value = false;
        selectedProduct.value = null;

        alert('Product updated successfully!');
        window.location.href = '/dashboard/products';
    } catch (error) {
        console.error('Failed to edit product', error);
    }
}


// PAGINATION //
const searchTerm = ref('');

const rowsPerPage = 5;
const currentPage = ref(1);

const totalPages = computed(() => {
    return Math.ceil(product.value.length / rowsPerPage);
});

const paginatedProducts = computed(() => {
    const start = (currentPage.value - 1) * rowsPerPage;
    const end = currentPage.value * rowsPerPage;
    return product.value.filter((product: Product) => {
        const productNameMatch = product.productName.toLowerCase().includes(searchTerm.value.toLowerCase());
        const categoryMatch = product.category.toLowerCase().includes(searchTerm.value.toLowerCase());
        const productIdMatch = product.productId.toString().includes(searchTerm.value);
        const priceMatch = product.price.toString().includes(searchTerm.value);
        return productNameMatch || categoryMatch || productIdMatch || priceMatch;
    }).slice(start, end);
});
function goToPage(page: number) {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
}

// MODAL
const isModalOpen = ref(false);
const newProduct = ref({
    productImage: null,
    productName: '',
    category: '',
    quantity: 0,
    price: '0.00',
    status: 'In Stock',
});


function openModal() {
    isModalOpen.value = true;
}

function closeModal() {
    isModalOpen.value = false;
}


</script>

<template>
    <Toaster richColors />
    <main class="font-montserrat flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">

            <!-- Products Table -->
            <div class="p-5 mt-10 h-[700px]">
                <h1 class="text-3xl font-bold dark:text-white tracking-tight">Products</h1>
                <div class="flex justify-between py-3">
                    <Input type="search" placeholder="Search..." class="md:w-[100px] lg:w-[500px] border"
                        v-model="searchTerm" />
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
                                    <img :src="'/backend/public/assets/images/uploaded-images/' + product.productImage"
                                        alt="" class="h-[70px]">
                                </TableCell>
                                <TableCell>{{ product.productName }}</TableCell>
                                <TableCell>{{ product.category }}</TableCell>
                                <TableCell>{{ product.quantity }}</TableCell>
                                <TableCell>₱{{ product.price }}</TableCell>
                                <TableCell>{{ product.status }}</TableCell>
                                <TableCell class="w-10">
                                    <div class="flex space-x-2">
                                        <Button @click="openEditModal(product)"
                                            class="border bg-transparent text-black dark:text-white hover:bg-transparent hover:border-gray-700">Edit</Button>
                                        <Button @click="deleteProduct(product.productId)"
                                            class="border bg-red-500 text-white hover:bg-red-600">Delete</Button>
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
                            <label for="productImage" class="block text-sm font-medium dark:text-white">Product
                                Image</label>
                            <Input type="file" id="productImage" accept="image/*" @change="handleImageUpload" />
                        </div>
                        <div class="mb-4">
                            <label for="productName" class="block text-sm font-medium dark:text-white">Product
                                Name</label>
                            <Input type="text" id="productName" v-model="newProduct.productName" />
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium dark:text-white">Category</label>
                            <Select id="category" v-model="newProduct.category">
                                <SelectTrigger>
                                    <SelectValue placeholder="Select a Category" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectGroup>
                                        <SelectItem v-for="category in allowedCategories" :key="category"
                                            :value="category">
                                            {{ category }}
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

            <!-- Edit Product Modal -->
            <div v-if="isModalOpen && selectedProduct"
                class="fixed inset-0 flex items-center justify-center bg-gray-950 bg-opacity-50">
                <div class="bg-white dark:bg-gray-950 border p-6 rounded-lg shadow-xl w-96">
                    <h2 class="text-2xl font-bold mb-4">Update Product</h2>
                    <form @submit.prevent="editSelectedProduct">
                        <div class="mb-4">
                            <label for="productImage" class="block text-sm font-medium dark:text-white">Product
                                Image</label>
                            <Input type="file" id="productImage" accept="image/*"
                                @change="updateSelectedProductImage($event)" />
                        </div>
                        <div class="mb-4">
                            <label for="productName" class="block text-sm font-medium dark:text-white">Product
                                Name</label>
                            <Input type="text" id="productName" v-model="selectedProduct.productName" />
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium dark:text-white">Category</label>
                            <Select id="category" v-model="selectedProduct.category">
                                <SelectTrigger>
                                    <SelectValue placeholder="Select a Category" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectGroup>
                                        <SelectItem v-for="category in allowedCategories" :key="category"
                                            :value="category">
                                            {{ category }}
                                        </SelectItem>
                                    </SelectGroup>
                                </SelectContent>
                            </Select>
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium dark:text-white">Quantity</label>
                            <Input type="text" id="quantity" v-model="selectedProduct.quantity" />
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium dark:text-white">Price</label>
                            <Input type="text" id="price" v-model="selectedProduct.price" />
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium dark:text-white">Status</label>
                            <Input type="text" id="status" v-model="selectedProduct.status" />
                        </div>

                        <div class="flex justify-end">
                            <Button type="submit"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-md">Update
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