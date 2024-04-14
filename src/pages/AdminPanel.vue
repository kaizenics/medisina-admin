<template>
    <div class="font-montserrat flex h-screen bg-gray-200">
        <div class="w-64 bg-white rounded-r-3xl overflow-hidden shadow-xl">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <span class="mx-4 text-2xl font-semibold">Dashboard</span>
                </div>
            </div>
            <nav class="mt-10">
                <router-link active-class="shadow"
                    class="flex items-center mt-4 py-2 px-6 bg-gray-200 text-gray-700 border-r-4 border-blue-600"
                    to="/home">
                    <span class="mx-4">Home</span>
                </router-link>
                <router-link active-class="shadow"
                    class="flex items-center mt-4 py-2 px-6 text-gray-700 hover:bg-gray-200" to="/details">
                    <span class="mx-4">Details</span>
                </router-link>
                <router-link active-class="shadow"
                    class="flex items-center mt-4 py-2 px-6 text-gray-700 hover:bg-gray-200" to="/pricing">
                    <span class="mx-4">Pricing</span>
                </router-link>
                <router-link active-class="shadow"
                    class="flex items-center mt-4 py-2 px-6 text-gray-700 hover:bg-gray-200" to="/chart">
                    <span class="mx-4">Chart</span>
                </router-link>
            </nav>
        </div>
        <div class="font-montserrat flex-1 p-10 text-2xl font-bold">
            <div class="mt-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-slate-900 text-xl font-semibold mb-4">Dashboard Overview</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-500 text-white p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Total Revenue</h3>
                            <p class="text-3xl">$10,000</p>
                        </div>
                        <div class="bg-red-500 text-white p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Sales</h3>
                            <p class="text-3xl">100</p>
                        </div>
                        <div class="bg-yellow-500 text-white p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Subscriptions</h3>
                            <p class="text-3xl">50</p>
                        </div>
                        <div class="bg-green-500 text-white p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Active Now</h3>
                            <p class="text-3xl">50</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>