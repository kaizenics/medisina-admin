<script setup lang="ts">
import { Icon } from '@iconify/vue';
</script>

<template>
    <section>
        <div class="container flex px-6 py-10 justify-start">
            <footer>

                <div class="flex flex-wrap space-x-28">
                    <div class="my-[8%] align-left space-y-4">
                        <h1 class="font-montserrat font-semibold text-lg mb-4">Medisina</h1>

                        <div class="font-montserrat text-md items-start inline-block mb-[5px] space-y-3">
                            <p class="w-[230px]">35936 Neal Roads Los Angeles Oregon</p>
                            <p class="w-[140px]">780-329-4439 648-723-2824</p>

                        </div>

                        <div class="flex align-left space-x-7">
                            <div class="w-[20px] h-[20px]">
                                <Icon icon="ic:baseline-facebook" class="h-[1.8rem] w-[1.8rem] text-white" />
                            </div>
                            <div class="w-[20px] h-[20px]">
                                <Icon icon="mdi:linkedin" class="h-[1.8rem] w-[1.8rem] text-white" />
                            </div>
                            <div class="w-[20px] h-[20px]">
                                <Icon icon="ri:twitter-x-fill" class="h-[1.8rem] w-[1.8rem] text-white" />
                            </div>
                            <div class="w-[20px] h-[20px]">
                                <Icon icon="mdi:youtube" class="h-[1.8rem] w-[1.8rem] text-white" />
                            </div>
                        </div>
                    </div>
                    <div class="my-[8%] align-left space-y-4">
                        <h1 class="font-montserrat font-semibold text-lg mb-4 content-start">Blog</h1>

                        <div class="font-montserrat text-md items-start inline-block mb-[5px] space-y-3">
                            <p>Company</p>
                            <p>Career</p>
                            <p>Mobile</p>
                            <p>How it works</p>
                        </div>
                    </div>

                    <div class="my-[8%] align-left space-y-4">
                        <h1 class="font-montserrat font-semibold text-lg mb-4 content-start">About</h1>

                        <div class="font-montserrat text-md items-start inline-block mb-[5px] space-y-3">
                            <p>Contacts</p>
                            <p>About Us</p>
                            <p>FAQ</p>
                            <p>Our Team</p>
                        </div>
                    </div>

                    <div class="my-[8%] align-left space-y-4">
                        <h1 class="font-montserrat font-semibold text-lg mb-4 content-start">Product</h1>

                        <div class="font-montserrat text-md items-start inline-block mb-[5px] space-y-3">
                            <p>Terms of use</p>
                            <p>Privacy Policy</p>
                            <p>Login</p>
                        </div>
                    </div>
                </div>

            </footer>
        </div>
    </section>
</template>