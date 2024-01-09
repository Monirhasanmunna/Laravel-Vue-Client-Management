<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue'
    import {reactive} from 'vue';
    import { Link,useForm } from '@inertiajs/vue3';

    const props = defineProps({
        service : Object
    });
    
    const form = useForm({
        name : props.service.name ?? '',
        code : props.service.code ?? '',
        description : props.service.description ?? '',
        status : props.service.status,
        cost : props.service.cost ?? '',
    });
    
    const formSubmit = ()=>{
        form.put(route('service.update',props.service.id), {
            preserveScroll : true,
        });
    }
</script>

<template>
    <MainLayout>
        <!-- Breadcrumb -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="dark:text-gray-100">Service Create</h3>
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
                    Service Create
                </li>
            </ol>
        </div>
        <!-- Breadcrumb -->

        <div class="card space-y-5">
            <div class="flex justify-between items-center">
                <h3>Service Create</h3>
                <Link :href="route('service.index')" class="btn-secondary">Back</Link>
            </div>

            <div class="card">
                <form @submit.prevent="formSubmit">
                    <div class="form-wrapper space-y-4">
                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink md:w-6/12">
                                <label for="name" class="label">Name</label>
                                <input type="text" id="name" v-model="form.name" class="input w-full" placeholder="Enter Service Name">
                                <p v-if="form.errors.name" class="text-sm text-red-600">{{ form.errors.name }}</p>
                            </div>
                            <div class="group shrink md:w-6/12">
                                <label for="code" class="label">Code</label>
                                <input type="text" id="code" v-model="form.code" class="input w-full" placeholder="Enter Service Code">
                                <p v-if="form.errors.code" class="text-sm text-red-600">{{ form.errors.code }}</p>
                            </div>
                        </div>

                        <div class="input-row flex gap-3 flex-col md:flex-row">
                            <div class="group shrink md:w-6/12">
                                <label for="cost" class="label">Cost</label>
                                <input type="number" id="cost" v-model="form.cost" class="input w-full" placeholder="Enter Service Cost">
                                <p v-if="form.errors.cost" class="text-sm text-red-600">{{ form.errors.cost }}</p>
                            </div>
                            <div class="group shrink md:w-6/12">
                                <label for="status" class="label">Status</label>
                                <select name="status" id="status" class="input w-full" v-model="form.status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-row">
                            <label for="description" class="label">Description</label>
                            <textarea name="description" id="description" v-model="form.description" class="input" placeholder="Type description...." rows="5"></textarea>
                            <p v-if="form.errors.description" class="text-sm text-red-600">{{ form.errors.description }}</p>
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