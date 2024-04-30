<script setup lang="ts">
import { ref, computed } from 'vue';
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
    Pagination,
    PaginationEllipsis,
    PaginationFirst,
    PaginationLast,
    PaginationList,
    PaginationListItem,
    PaginationNext,
    PaginationPrev,
} from '@/components/ui/pagination'

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

]

const rowsPerPage = 8;
const currentPage = ref(1);

const startIndex = computed(() => (currentPage.value - 1) * rowsPerPage);
const endIndex = computed(() => Math.min(currentPage.value * rowsPerPage, products.length));
const paginatedProducts = computed(() => products.slice(startIndex.value, endIndex.value));
</script>

<template>
    <main class="flex">
        <SideBar />
        <div class="flex-1 justify-between items-center">
            <div class="p-5">
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
                        <template v-for="(product, index) in paginatedProducts" :key="product.products">
                            <TableRow v-if="index >= startIndex && index < endIndex">
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
                                            class="border bg-transparent text-white hover:bg-transparent hover:border-gray-700">Edit</Button>
                                        <Button class="border bg-red-500 text-white hover:bg-red-600">Delete</Button>
                                    </div>
                                </TableCell>
                            </TableRow>
                        </template>
                    </TableBody>
                </Table>
            </div>
            <div class="flex justify-center items-center">
                <Pagination v-slot="{ page }" :total="100" :sibling-count="1" show-edges :default-page="2">
                    <PaginationList v-slot="{ items }" class="flex items-center gap-1">
                        <PaginationFirst />
                        <PaginationPrev />

                        <template v-for="(item, index) in items">
                            <PaginationListItem v-if="item.type === 'page'" :key="index" :value="item.value" as-child>
                                <Button class="w-10 h-10 p-0" :variant="item.value === page ? 'default' : 'outline'">
                                    {{ item.value }}
                                </Button>
                            </PaginationListItem>
                            <PaginationEllipsis v-else :key="item.type" :index="index" />
                        </template>

                        <PaginationNext />
                        <PaginationLast />
                    </PaginationList>
                </Pagination>
            </div>
        </div>
    </main>
</template>