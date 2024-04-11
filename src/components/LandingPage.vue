<script setup lang="ts">
import doctorImg from '@/assets/images/doctor.png'
import medicineImg from '@/assets/images/medicine.png'
import pfizerSvg from '@/assets/svg/Pfizer.svg'
import SeparatorContainer from '@/components/ui/separator/SeparatorComponent.vue'
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
                        class="bg-slate-800 text-white font-semibold px-10 py-5 rounded-sm hover:bg-slate-900 transition-colors duration-300">Get
                        Started</button>

                    <button
                        class="border border-slate-800 dark:border-slate-600 text-slate-800 dark:text-white font-semibold px-10 py-5 rounded-sm hover:dark:border-slate-700 transition-all duration-300 ">Learn
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


    <section class="container flex flex-col">
        <SeparatorContainer />
        <div class="flex my-7">
            <div class="w-[300px] h-[300px]">
                <img :src="pfizerSvg" alt="doctorImg">
            </div>
            <div class="w-[300px] h-[300px]">
                <img :src="pfizerSvg" alt="doctorImg">
            </div>
            <div class="w-[300px] h-[300px]">
                <img :src="pfizerSvg" alt="doctorImg">
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto flex flex-col">
            <div class="flex flex-col items-center">
                <h1 class="font-montserrat text-5xl font-bold">Our Experts</h1>
                <p class="text-lg text-slate-800 font-regular my-4">Our licensed pharmacists are available to answer any
                    questions you
                    may
                    have about your medication and offer expert advice on managing your health.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto flex flex-col">
            <div class="flex flex-col items-center">
                <h1 class="font-montserrat text-5xl font-bold">How it works</h1>
                <p class="text-lg text-slate-800 font-regular my-4">Our licensed pharmacists are available to answer any
                    questions you
                    may
                    have about your medication and offer expert advice on managing your health.</p>
            </div>
        </div>
    </section>
</template>