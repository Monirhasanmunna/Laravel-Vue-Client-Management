<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue'
    import {watch, ref, computed, onMounted} from 'vue';
    import { Link, useForm, router } from '@inertiajs/vue3';
    import {debounce} from 'lodash';
    import axios from 'axios';

    const props = defineProps({
        services : Array,
        clients  : Array,
        application : Object,
        accounts : Array
    });
    
    const form = useForm({
        application_no  : props.application.application_no,
        cost            : props.application.cost,
        service         : props.application.service_id,
        client          : props.application.client_id,
        police_station  : props.application.police_station,
        payment         : props.application.payment,
        due             : props.application.due,
        date            : props.application.date,
        account         : props.application.account_id,
        status          : props.application.status,
    });


    watch(()=>form.service, ()=>{
        axios.get(route('service.cost', {'id' : form.service}))
        .then((res)=> form.cost = res.data.service.cost);
    });


    watch([()=> form.payment, ()=>form.cost], ()=> {
        if(form.payment <= form.cost){
            const calculateDue = computed(()=> form.cost - form.payment);
            form.due = calculateDue.value;
        }else{
            alert('Can not payment mor that service cost');
            form.payment = '';
        }
    });


    const formSubmit = ()=>{
        form.put(route('application.update', props.application.id), {
            preserveScroll : true,
        });
    }
</script>

<template>
    <MainLayout>
        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Application Edit</h3>
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
                    Application Edit
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->

        <div class="card space-y-5">
            <div class="flex justify-between items-center">
                <h3>Application Create</h3>
                <Link :href="route('application.index')" class="btn-secondary">Back</Link>
            </div>


            <div class="card">
                <form @submit.prevent="formSubmit">
                    <div class="form-wrapper space-y-4">
                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink  md:w-2/12">
                                <label for="application_no" class="label">Application No</label>
                                <input type="text" readonly id="application_no" v-model="form.application_no" class="input w-full">
                            </div>

                            <div class="group shrink md:w-4/12">
                                <label for="client" class="label">Client</label>
                                <select name="client" id="client" class="input w-full" v-model="form.client">
                                    <option disabled hidden value="">Chose Once</option>
                                    <option v-for="(client, index) in clients" :key="index" :value="client.id">{{ client.name }}</option>
                                </select>
                            </div>

                            <div class="group shrink md:w-4/12">
                                <label for="status" class="label">Service</label>
                                <select name="status" id="status" class="input w-full" v-model="form.service">
                                    <option disabled hidden value="">Choose One</option>
                                    <option v-for="(service, index) in services" :key="index" :value="service.id">{{ service.name }}</option>
                                </select>
                                <p v-if="form.errors.service" class="text-sm text-red-600">{{ form.errors.service }}</p>
                            </div>

                            <div class="group shrink md:w-4/12">
                                <label for="cost" class="label">Cost</label>
                                <input type="number" id="cost" v-model="form.cost" class="input w-full bg-gray-200 dark:bg-gray-900 dark:text-gray-100" readonly >
                                <p v-if="form.errors.cost" class="text-sm text-red-600">{{ form.errors.cost }}</p>
                            </div>

                        </div>

                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink md:w-4/12">
                                <label for="payment" class="label">Payment</label>
                                <input type="number" id="payment" v-model="form.payment" class="input w-full" placeholder="Enter Amount">
                                <p v-if="form.errors.payment" class="text-sm text-red-600">{{ form.errors.payment }}</p>
                            </div>

                            <div class="group shrink md:w-4/12">
                                <label for="due" class="label">Due</label>
                                <input type="number" id="due" v-model="form.due" class="input w-full bg-gray-200 dark:bg-gray-900 dark:text-gray-100" readonly>
                            </div>

                            <div class="group shrink md:w-3/12">
                                <label for="police_station" class="label">Police Station</label>
                                <input type="text" id="police_station" v-model="form.police_station" class="input w-full" placeholder="Enter Police Station">
                                <p v-if="form.errors.police_station" class="text-sm text-red-600">{{ form.errors.police_station }}</p>
                            </div>
                            <div class="group shrink md:w-3/12">
                                <label for="date" class="label">Date</label>
                                <input type="date" id="date" v-model="form.date" class="input w-full" >
                                <p v-if="form.errors.date" class="text-sm text-red-600">{{ form.errors.date }}</p>
                            </div>
                        </div>

                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink md:w-3/12 pr-2">
                                <label for="account" class="label">Account</label>
                                <select name="account" id="account" class="input w-full" v-model="form.account">
                                    <option disabled hidden value="">Chose Once</option>
                                    <option v-for="(account, index) in accounts" :key="index" :value="account.id">{{ account.account_name }}</option>
                                </select>
                                <p v-if="form.errors.account" class="text-sm text-red-600">{{ form.errors.account }}</p>
                            </div>

                            <div class="group shrink md:w-3/12 pr-2">
                                <label for="status" class="label">Status</label>
                                <select name="status" id="status" class="input w-full" v-model="form.status">
                                    <option value="received">Received</option>
                                    <option value="processing">Processing</option>
                                    <option value="Deliver">Deliver</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-row pt-4">
                            <button type="submit" class="btn-primary dark:outile-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </MainLayout>
</template>

<style scoped>

</style>