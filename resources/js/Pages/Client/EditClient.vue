<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue'
    import {reactive} from 'vue';
    import { Link,useForm } from '@inertiajs/vue3';

    const props = defineProps({
        client : Object
    });
    
    const form = useForm({
        name : props.client.name ?? '',
        age : props.client.age ?? '',
        gender : props.client.gender ?? '',
        phone : props.client.phone ?? '',
        address : props.client.address ?? '',
    });
    
    const formSubmit = ()=>{
        form.put(route('client.update', props.client.id), {
            preserveScroll : true,
            preserveState : true
        });
    }
</script>

<template>
    <MainLayout>
        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Client Edit</h3>
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
                    Client Edit
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->

        <div class="card space-y-5">
            <div class="flex justify-between items-center">
                <h3>Client Edit</h3>
                <Link :href="route('client.index')" class="btn-secondary">Back</Link>
            </div>

            <div class="card">
                <form @submit.prevent="formSubmit">
                    <div class="form-wrapper space-y-4">
                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink w-full">
                                <label for="name" class="block text-sm text-gray-500 font-medium mb-2 dark:text-white">Name</label>
                                <input type="text" id="name" v-model="form.name" class="input w-full" placeholder="Enter Service Name">
                                <p v-if="form.errors.name" class="text-sm text-red-600">{{ form.errors.name }}</p>
                            </div>
                        </div>

                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink w-6/12">
                                <label for="age" class="block text-sm text-gray-500 font-medium mb-2 dark:text-white">Age</label>
                                <input type="number" id="age" v-model="form.age" class="input w-full" placeholder="Enter Age">
                                <p v-if="form.errors.age" class="text-sm text-red-600">{{ form.errors.age }}</p>
                            </div>
                            <div class="group shrink md:w-6/12">
                                <label for="gender" class="block text-sm text-gray-500 font-medium mb-2 dark:text-white">Gender</label>
                                <select name="gender" id="status" class="input w-full" v-model="form.gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <p v-if="form.errors.gender" class="text-sm text-red-600">{{ form.errors.gender }}</p>
                            </div>
                        </div>

                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink w-6/12">
                                <label for="phone" class="block text-sm text-gray-500 font-medium mb-2 dark:text-white">Phone</label>
                                <input type="number" id="phone" v-model="form.phone" class="input w-full" placeholder="Enter Phone">
                                <p v-if="form.errors.phone" class="text-sm text-red-600">{{ form.errors.phone }}</p>
                            </div>
                            <div class="group shrink w-6/12">
                                <label for="address" class="block text-sm text-gray-500 font-medium mb-2 dark:text-white">Address</label>
                                <input type="text" id="address" v-model="form.address" class="input w-full" placeholder="Enter Address">
                                <p v-if="form.errors.address" class="text-sm text-red-600">{{ form.errors.address }}</p>
                            </div>
                        </div>
                        
                        <div class="input-row">
                            <button type="submit" class="btn-primary dark:outile-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </MainLayout>
</template>

<style scoped>

</style>