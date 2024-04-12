<script setup lang="ts">
import SeparatorContainer from '@/components/ui/separator/SeparatorComponent.vue'

import doctorImg from '@/assets/images/doctor.png'
import medicineImg from '@/assets/images/medicine.png'
import pfizerSvg from '@/assets/svg/Pfizer.svg'
import gileadSvg from '@/assets/svg/Gilead.svg'
import siemensSvg from '@/assets/svg/Siemens.svg'
import indiviorSvg from '@/assets/svg/Indivior.svg'

import doctorOne from '@/assets/images/doctors-1.jpg'
import doctorTwo from '@/assets/images/doctors-2.jpg'
import doctorThree from '@/assets/images/doctors-3.jpg'
import doctorFour from '@/assets/images/doctors-4.jpg'
</script>
<template>
    <section>
        <div class="container flex py-32">
            <div class="font-montserrat flex flex-col mx-2">
                <div class="space-y-4">
                    <h1 class="text-6xl font-regular">Most trusted</h1>
                    <span class="text-6xl font-bold">online
                        pharmacy.</span>

                </div>
                <p class="text-lg font-regular my-4">Our licensed pharmacists are available to answer any questions you
                    may
                    have about your medication and offer expert advice on managing your health.</p>
                <div class="flex space-x-2 mt-14">
                    <button
                        class="bg-gray-800 text-white font-semibold px-10 py-5 rounded-sm hover:bg-gray-900 transition-colors duration-300">Get
                        Started</button>

                    <button
                        class="border border-gray-800 dark:border-zinc-600 text-gray-800 dark:text-white font-semibold px-10 py-5 rounded-sm hover:dark:border-gray-700 transition-all duration-300 ">Learn
                        More</button>
                </div>
            </div>
            <div class="flex w-[1200px] h-[500px]">
                <div>
                    <div class="absolute top-[100px] right-[380px] w-[550px] h-[550px]">
                        <img :src="medicineImg" alt="medicineImg">
                    </div>
                    <div class="absolute top-[200px] right-[160px] w-[600px] h-[600px]">
                        <img :src="doctorImg" alt="doctorImg">
                    </div>

                </div>
            </div>
        </div>

    </section>


    <section class="container">
        <div>
            <SeparatorContainer />
            <div class="flex justify-center my-7 space-x-16 px-5">
                <div class="py-20">
                    <h1 class="font-montserrat text-gray-800 dark:text-gray-300 text-2xl justify-center font-bold">Our
                        Partners</h1>
                </div>
                <img :src="gileadSvg" alt="doctorImg" class="w-[200px] h-[200px]">
                <div class="py-14">
                    <img :src="pfizerSvg" alt="doctorImg" class="w-[170px] h-[80px]">
                </div>
                <div class="py-12">
                    <img :src="indiviorSvg" alt="doctorImg" class="w-[200px] h-[100px]">
                </div>
                <div class="py-12">
                    <img :src="siemensSvg" alt="doctorImg" class="w-[200px] h-[100px]">
                </div>
            </div>
            <SeparatorContainer />
        </div>
    </section>

    <section>
        <div>
            <div class="container flex py-28">
                <div class="font-montserrat flex flex-col mx-2">
                    <h1 class="font-montserrat text-7xl font-regular">Our <span class="font-bold">Expert
                            Pharmacists</span></h1>
                    <div class="w-[500px]">
                        <p class="font-montserrat text-lg py-16">That is why we offer a wide range prescription and
                            over-the-counter drugs,
                            as
                            well as wellness
                            products, all available to you with just a few clicks </p>
                    </div>
                    <div>
                        <button
                            class="font-montserrat text-md bg-gray-800 text-white py-5 px-14 rounded-sm hover:bg-gray-900 transition-colors duration-300">Speak
                            to an Expert</button>
                    </div>

                </div>
                <div class="grid grid-cols-2 -space-x-7 w-[1200px] h-[500px]">
                    <div class="grid grid-cols-1 px-20">
                        <div class="w-[300px] h-auto">
                            <img :src="doctorOne" alt="doctorOne" class="rounded-md">
                        </div>
                        <div class="w-[300px] h-auto">
                            <img :src="doctorTwo" alt="doctorOne" class="rounded-md">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-10 px-20">
                        <div class="w-[300px] h-auto">
                            <img :src="doctorThree" alt="doctorOne" class="rounded-md">
                        </div>
                        <div class="w-[300px] h-auto">
                            <img :src="doctorFour" alt="doctorOne" class="rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900 dark:bg-gray-200">
        <div class="container mx-auto flex flex-col">
            <div class="flex flex-col items-center my-20">
                <h1 class="font-montserrat text-5xl py-6 text-gray-200 dark:text-slate-900 font-semibold">Sign up to our
                    Newsletter</h1>
                <p class="font-montserrat text-lg text-gray-200 dark:text-slate-900 font-regular my-4">Stay up to date
                    with Our Latest News
                    and Exclusive Offers - Subscribe to Our Newsletter Today!</p>
                <div class="flex justify-end pt-10">
                    <div class="relative">
                        <input
                            class="w-[1000px] h-[56px] py-4 px-2 bg-transparent text-gray-200 border border-gray-200 rounded-none"
                            type="text">
                        <button class="absolute font-montserrat bg-gray-200 py-4 px-10 top-0 right-0">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>

    </section>
</template>