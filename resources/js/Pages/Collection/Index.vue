<script setup>
    import { Link,router } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue'
    import DataFilterByClient from '@/Components/DataFilterByClient.vue';
    import Toast from '@/Components/Toast.vue';
    import { ref,watch,reactive, onMounted } from 'vue';
    import {debounce} from 'lodash'
    import axios from 'axios';
    import { HSOverlay } from 'preline';

    const props = defineProps({
        dues : {Object},
        clients : Array
    });

    const searchInput = reactive({
        input : '',
        select : 20,
    });

    watch(searchInput, debounce(()=> router.get(route('collection.index'), searchInput, {
        preserveScroll: true,
        preserveState: true
    }), 500));


    const searchDataByClient = (client_id) =>{
        router.get(route('collection.index'),client_id,{
            preserveScroll:true,
            preserveState:true
        });
    }

    const selectApplication = reactive({
        id : '',
        application_no : '',
        service_name : '',
        client_name : '',
        ammount : '',
    });

    const getAppInfo = (id)=>{
        axios.get(route('collection.get-application', id))
        .then(res => {
            console.log(res.data),
            selectApplication.id = res.data.id,
            selectApplication.application_no = res.data.application_no,
            selectApplication.service_name = res.data.service.name,
            selectApplication.client_name = res.data.client.name,
            selectApplication.ammount = res.data.due,
            HSOverlay.open('#hs-basic-modal')
        });
    }


    const dataFilter = ref(null);

    const dueSubmit = () =>{
        const appInfo = reactive({
            id : selectApplication.id,
            payAmmount : selectApplication.ammount
        });

        axios.post(route('collection.due-payment'), appInfo)
        .then(res => {
            if(res.status == 200){
                HSOverlay.close('#hs-basic-modal');
                appInfo.id = '';
                appInfo.payAmmount = '';
                dataFilter.value.restFormFilter();
            }
        });
    }
    
</script>

<template>
    <MainLayout>
        <Toast/>

        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Due Collection</h3>
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
                    Due Collection
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->


        <div class="card space-y-6">
            <div class="flex justify-between items-center">
                <h3>Due Collection</h3>
                <!-- <Link :href="route('account.create')" class="btn-primary" data-hs-overlay="#createModal">Create Account</Link> -->
            </div>


            <div class="flex flex-col">
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

                                <div class="">
                                    <DataFilterByClient @searchDataByClient = "searchDataByClient" :clients="clients" ref="dataFilter" />
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
                                                Application No.</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Client</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Service</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                Ammount</th>
                                            
                                            <th scope="col" width="10%"
                                                class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-400 uppercase ">
                                                Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                        <tr v-for="(due, index) in dues.data" :key="index">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400"> {{ index+1 }}</td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ due.application_no }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ due.client.name }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ due.service.name }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ due.due }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3">
                                               <a href="javascript:void(0)" @click="getAppInfo(due.id)" class="py-2 px-3 bg-blue-600 text-white rounded-md dark:outline-primary">Show</a>
                                            </td>
                                        </tr>

                                        <tr v-if="!dues.data.length > 0">
                                            <td class="text-gray-600 dark:text-gray-100 text-center text-sm py-3" colspan="8">No data found</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="py-3 px-4 " v-if="dues.data.length > 0">
                                <nav class="flex items-center space-x-2">
                                    <Link :href="link.url" :class="{'bg-gray-300 dark:bg-[#141b2b] dark:text-blue-800':link.active == true}" v-for="(link, index) in dues.links" :key="index"
                                        class="py-2 px-3 inline-flex items-center text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white dark:hover:text-blue-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <span aria-hidden="true" v-html="link.label"></span>
                                    </Link>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
            <form @submit.prevent="dueSubmit">
                <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                    Application Info
                    </h3>
                    <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="w-full border-1 border-gray-800 dark:border-gray-300 text-gray-700 dark:text-gray-200 p-[10px] rounded-sm ">
                        <div class="flex justify-between gap-x-3">
                            <div class="left space-y-4 w-9/12">
                                <div class="flex justify-between  w-full">
                                    <h6 class="text-[15px]">App No. :</h6>
                                    <h6 class="text-[14px] w-8/12 ">{{ selectApplication.application_no }}</h6>
                                </div>

                                <div class="flex justify-between w-full">
                                    <h6 class="text-[15px]">Service :</h6>
                                    <h6 class="text-[14px] w-8/12 ">{{ selectApplication.service_name }}</h6>
                                </div>

                                <div class="flex justify-between w-full">
                                    <h6 class="text-[15px]">Client :</h6>
                                    <h6 class="text-[14px] w-8/12 ">{{ selectApplication.client_name }}</h6>
                                </div>

                                <div class="flex justify-between w-full">
                                    <h6 class="text-[15px]">Date :</h6>
                                    <h6 class="text-[14px] w-8/12 ">12.06.2024</h6>
                                </div>
                            </div>

                            <div class="border-t sm:border-t-0 sm:border-s border-gray-200 dark:border-gray-700"></div>

                            <div class="right space-y-3">
                                <div class="flex justify-between w-full bg-green-800 text-gray-50 rounded-md p-2">
                                    <h6 class="text-[19px]">Due :</h6>
                                    <h6 class="text-[18px] ">{{ selectApplication.ammount }}</h6>
                                </div>

                                <div class="flex-inline justify-center">
                                    <label for="ammount" class="label">Pay :</label>
                                    <input type="number" readonly autofocus class="input" v-model="selectApplication.ammount">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-basic-modal">
                    Cancel
                    </button>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Paid
                    </button>
                </div>
                </div>
            </div>
            </form>
        </div>

    </MainLayout>
</template>

<style scoped>

</style>
