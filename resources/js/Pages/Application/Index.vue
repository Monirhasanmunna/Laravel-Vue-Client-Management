<script setup>
    import { Link,router } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue'
    import Toast from '@/Components/Toast.vue';
    import { ref,watch,reactive } from 'vue';
    import {debounce} from 'lodash'

    // const props = defineProps({
    //     services : {Object}
    // });

    const searchInput = reactive({
        input : '',
        select : 20,
    });

    // watch(searchInput, debounce(()=> router.get(route('service.index'),searchInput,{
    //     preserveScroll:true,
    //     preserveState:true
    // },
    // ),500));

</script>

<template>
    <MainLayout>
        <Toast/>

        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Application List</h3>
            </div>

            <ol class="flex items-center justify-end whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <Link :href="route('dashboard')" class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500">
                        Dashboard
                    </Link>
                    <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </li>

                <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
                    aria-current="page">
                    Application List
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->


        <div class="card space-y-6">
            <div class="flex justify-between items-center">
                <h3>Application List</h3>
                <Link :href="route('application.create')" class="btn-primary" data-hs-overlay="#createModal">Create Application</Link>
            </div>

            <!-- <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                            <div class="py-3 px-4 flex justify-between">

                                <div class="inputDropdown">
                                    <select id="select" v-model="searchInput.select" class="input w-32 py-2 rounded-sm">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>

                                <div class="relative max-w-xs">
                                    <label class="sr-only">Search</label>
                                    <input type="text" name="hs-table-with-pagination-search" v-model="searchInput.input"
                                        id="hs-table-with-pagination-search"
                                        class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-sm text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
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
                                                Cost</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Status</th>
                                            <th scope="col" width="10%"
                                                class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-400 uppercase ">
                                                Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                        <tr v-for="(service, index) in services.data" :key="index">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400"> {{ index+1 }}</td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ service.name }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ service.code }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ service.cost }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <span v-if="service.status === 'active'" class="badge-success dark:outline-success">Actice</span>
                                                <span v-else class="badge-danger dark:outline-danger">Inactive</span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3">
                                               <Link :href="route('service.update', {'service': service.id})" method="delete" preserve-scroll="true" preserve-state="true" type="button" as="button" class="py-2 px-3 bg-red-600 text-white rounded-md dark:outline-danger">Delete</Link>
                                               <Link :href="route('service.edit', {'service':service.slug})" preserve-scroll preserve-state class="py-2 px-3 bg-blue-600 text-white rounded-md dark:outline-primary">Edit</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="py-3 px-4">
                                <nav class="flex items-center space-x-2">
                                    <Link :href="link.url" preserve-scroll preserve-state :class="{'bg-gray-300 dark:bg-[#141b2b] dark:text-blue-800':link.active == true}" v-for="(link, index) in services.links" :key="index"
                                        class="py-2 px-3 inline-flex items-center text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white dark:hover:text-blue-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <span aria-hidden="true" v-html="link.label"></span>
                                    </Link>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->
        </div>


    </MainLayout>
</template>

<style scoped>

</style>
