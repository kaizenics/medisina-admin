<script setup lang="ts">
import { ref, computed } from 'vue';
import { Icon } from '@iconify/vue';
import HomeNavbar from '@/components/HomeNavbar.vue';
import CarouselComponent from '@/components/CarouselComponent.vue';

import caltrate from '@/assets/images/medicines/caltrate.webp';
import diabetasol from '@/assets/images/medicines/diabetasol.png';
import robust from '@/assets/images/medicines/robust.png'
import durex from '@/assets/images/medicines/durex.png';
import biogesic from '@/assets/images/medicines/biogesic.png';
import amoxil from '@/assets/images/medicines/amoxil.png';

const products = ref([
    {
        name: 'Caltrate Plus Pack',
        price: '₱229.75',
        image: caltrate
    },
    {
        name: 'Diabetasol Powder Vanilla 180gm',
        price: '₱365.25',
        image: diabetasol,
    },
    {
        name: 'Robust Extreme 400Mg Capsule 2X1S',
        price: '₱280.o0',
        image: robust,
    },
    {
        name: 'Durex Condom Extra Safe',
        price: '₱81.00',
        image: durex,
    },
    {
        name: 'Biogesic Caplet 500mg 500 -MRP 10s',
        price: '₱4.25',
        image: biogesic,
    },
    {
        name: 'Amoxil 500Mg Capsule',
        price: '₱19.25',
        image: amoxil,
    }

]);

const shuffledProducts = computed(() => {
    const shuffled = [...products.value];
    for (let i = shuffled.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
    }
    return shuffled;
});
</script>

<template>
    <HomeNavbar />
    <main>
        <section class="container mx-auto">
            <div class="flex justify-center items-center">
                <CarouselComponent />
            </div>

            <section>
                <div class="flex mt-5">
                    <div class="py-2">
                        <div class="flex m-auto space-x-2 py-3 px-3 w-[220px] h-[65px] bg-emerald-500">
                            <Icon icon="mdi:hot" class="h-[2.5rem] w-[2.5rem] text-white" />
                            <h1 class="font-montserrat font-semibold text-2xl text-white py-1 uppercase">Hot Deals</h1>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-4 mb-10">
                    <div v-for="(product, index) in shuffledProducts.slice(0, 5)" :key="index"
                        class="border border-gray-300 bg-white w-[255px] h-[400px]">
                        <div class="w-[255px]">
                            <img :src="product.image" alt="medicineImg" class="py-2 px-12">
                        </div>
                        <div class="space-y-8">
                            <p class="px-2 text-gray-900 text-center font-montserrat font-semibold text-md">{{
                                product.name }}</p>

                            <div>
                                <p class="px-2 text-red-500 text-center font-montserrat font-semibold text-md">{{
                                    product.price }}</p>
                                <div class="flex justify-center">
                                    <button
                                        class="font-montserrat font-semibold bg-emerald-500 text-white py-2 px-5 cursor-pointer">Add
                                        to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex mt-5">
                    <div class="py-2">
                        <div class="flex m-auto space-x-2 py-3 px-3 w-[220px] h-[65px] bg-emerald-500">
                            <Icon icon="iconoir:pharmacy-cross-tag" class="h-[2.5rem] w-[2.5rem] text-white" />
                            <h1 class="font-montserrat font-semibold text-2xl text-white py-1 uppercase">Pharmacy</h1>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-4 mb-10">
                    <div v-for="product in products" :key="product.name"
                        class="border border-gray-300 bg-white w-[255px] h-[400px]">
                        <div class="w-[255px]">
                            <img :src="product.image" alt="medicineImg" class="py-2 px-12">
                        </div>
                        <div class="space-y-8">
                            <p class="px-2 text-gray-900 text-center font-montserrat font-semibold text-md">{{
                                product.name
                                }}</p>

                            <div>
                                <p class="px-2 text-red-500 text-center font-montserrat font-semibold text-md">{{
                                    product.price }}</p>
                                <div class="flex justify-center">
                                    <button
                                        class="font-montserrat font-semibold bg-emerald-500 text-white py-2 px-5 cursor-pointer">Add
                                        to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>



        </section>
    </main>
</template>
