<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <MainLayout>
        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Dashboard</h3>
            </div>

            <ol class="flex items-center justify-end whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
                    aria-current="page">
                    Dashboard
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->

        <div class="card">
            <div class="pb-3 flex justify-between">
                <h2>Report For Today</h2>
                <div class="inputDropdown">
                    <select id="select" class="input border-2 w-32 py-2 rounded-md">
                        <option value="to-day">To day</option>
                        <option value="last-7-days">Last 7 days</option>
                        <option value="this-month">This Month</option>
                        <option value="this-year">This Year</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 sm:flex-row gap-4">
                <div class="box border-gray-500 rounded-md dark:border-[#223154] bg-gradient-to-r from-indigo-500 to-sky-500 text-gray-50 p-2 flex justify-between w-full h-[120px] hover:scale-105 duration-500">
                    <div class="left">
                        <h4 class="">Received Application</h4>
                        <h1 class="text-5xl">10</h1>
                    </div>
                    <div class="right opacity-30">
                        <div class="w-full flex justify-end items-center h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="65" width="65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                    </div>
                </div>


                <div class="box border-gray-500 rounded-md dark:border-[#223154] bg-gradient-to-r from-indigo-500 to-sky-500 text-gray-50 p-2 flex justify-between w-full h-[120px] hover:scale-105 duration-500">
                    <div class="left">
                        <h4 class="">Received Application</h4>
                        <h1 class="text-5xl">10</h1>
                    </div>
                    <div class="right opacity-30">
                        <div class="w-full flex justify-end items-center h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="65" width="65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                    </div>
                </div>


                <div class="box border-gray-500 rounded-md dark:border-[#223154] bg-gradient-to-r from-indigo-500 to-sky-500 text-gray-50 p-2 flex justify-between w-full h-[120px] hover:scale-105 duration-500">
                    <div class="left">
                        <h4 class="">Received Application</h4>
                        <h1 class="text-5xl">10</h1>
                    </div>
                    <div class="right opacity-30">
                        <div class="w-full flex justify-end items-center h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="65" width="65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="box border-gray-500 rounded-md dark:border-[#223154] bg-gradient-to-r from-indigo-500 to-sky-500 text-gray-50 p-2 flex justify-between w-full h-[120px] hover:scale-105 duration-500">
                    <div class="left">
                        <h4 class="">Received Application</h4>
                        <h1 class="text-5xl">10</h1>
                    </div>
                    <div class="right opacity-30">
                        <div class="w-full flex justify-end items-center h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="65" width="65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </MainLayout>
</template>

<style scoped>

</style>
