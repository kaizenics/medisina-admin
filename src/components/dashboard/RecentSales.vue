<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';

const products = ref<Product[]>([]);
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
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/products', {
      params: {
        sort_by: 'created_at',
        sort_order: 'desc'
      }
    });
    products.value = response.data.sort((a: any, b: any) => {
      return new Date(b.created_at).getTime() - new Date(a.created_at).getTime();
    });
  } catch (error) {
    console.error('Failed to fetch products', error);
  }
});
</script>

<template>
  <div class="space-y-8">
    <div v-for="(recentProduct, index) in products.slice(0, 5)" :key="index" class="flex items-center">
      <div class="ml-4 space-y-1">
        <p class="text-sm font-medium leading-none">
          {{ recentProduct.productName }}
        </p>
        <p class="text-sm text-muted-foreground">
          {{ recentProduct.category }}
        </p>
      </div>
      <div class="ml-auto font-medium">
        ₱{{ recentProduct.price }}
      </div>
    </div>
  </div>
</template>
