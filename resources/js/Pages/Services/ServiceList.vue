<script setup>
    import { Link } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue'

    defineProps({
        services : {Array}
    });

</script>

<template>
    <MainLayout>
        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Service List</h3>
            </div>

            <ol class="flex items-center justify-end whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <Link :href="route('dashboard')"
                        class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500">
                    Dashboard
                    </Link>
                    <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" /></svg>
                </li>

                <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
                    aria-current="page">
                    Service List
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->

        <div class="card space-y-6">
            <div class="flex justify-between items-center">
                <h3>Service List</h3>
                <Link :href="route('service.create')" class="btn-primary">Create Service</Link>
            </div>


            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                            <div class="py-3 px-4">
                                <div class="relative max-w-xs">
                                    <label class="sr-only">Search</label>
                                    <input type="text" name="hs-table-with-pagination-search"
                                        id="hs-table-with-pagination-search"
                                        class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                        placeholder="Search for items">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8" />
                                            <path d="m21 21-4.3-4.3" /></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden">

                                <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">

                                    <thead class="bg-gray-200 dark:bg-gray-700 ">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Sl</th>
                                            
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Code</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Status</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                        <tr v-for="(service, index) in services" :key="index">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400"> {{ index+1 }}</td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ service.name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ service.code }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <span v-if="service.status === 'active'" class="badge-success dark:outline-success">Actice</span>
                                                <span v-else class="badge-danger dark:outline-danger">Inactive</span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                               <Link :href="route('service.edit', {'service':service.id})" preserve-scroll preserve-state class="py-2 px-3 bg-blue-600 text-white rounded-md dark:outline-primary">Edit</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="py-1 px-4">
                                <nav class="flex items-center space-x-1">
                                    <button type="button"
                                        class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                    <button type="button"
                                        class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10"
                                        aria-current="page">1</button>
                                    <button type="button"
                                        class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10">2</button>
                                    <button type="button"
                                        class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10">3</button>
                                    <button type="button"
                                        class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <span class="sr-only">Next</span>
                                        <span aria-hidden="true">»</span>
                                    </button>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </MainLayout>
</template>

<style scoped>

</style>
