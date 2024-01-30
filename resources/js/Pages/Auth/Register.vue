<script setup>
import {Link, Head, useForm} from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <Head title="Registration"/>
    
<GuestLayout>
    <div class="flex justify-center items center w-[500px]">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7 space-y-4">
                <div class="text-center pb-3">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
                </div>

                <div class="mt-5">
                    <!-- Form -->
                    <form @submit.prevent="submit">
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="userName" class="block text-sm mb-2 dark:text-white">User name</label>
                            <div class="relative">
                                <input type="text" id="userName" v-model="form.name"  autofocus autocomplete="name"  class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                            </div>
                            <p v-if="form.errors.name" class="text-sm text-red-600">{{ form.errors.name }}</p>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" v-model="form.email"  autocomplete="username" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" aria-describedby="email-error">
                            </div>
                            <p v-if="form.errors.email" class="text-sm text-red-600">{{ form.errors.email }}</p>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                            <div class="relative">
                                <input type="password" id="password" v-model="form.password" autocomplete="new-password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"  aria-describedby="password-error">
                            </div>
                            <p v-if="form.errors.password" class="text-sm text-red-600">{{ form.errors.password }}</p>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <label for="confirm-password" class="block text-sm mb-2 dark:text-white">Confirm Password</label>
                            <div class="relative">
                                <input type="password" id="confirm-password" v-model="form.password_confirmation" autocomplete="new-password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"  aria-describedby="confirm-password-error">
                            </div>
                            <p v-if="form.errors.password_confirmation" class="text-sm text-red-600">{{ form.errors.password_confirmation }}</p>
                        </div>
                        <!-- End Form Group -->

                        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign up</button>
                    </div>
                    </form>
                    <!-- End Form -->
                </div>
                <div class="text-center">
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <Link class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :href="route('login')">
                        Sign in here
                    </Link>
                    </p>
                </div>
                </div>
            </div>
        </main>
    </div>
</GuestLayout>
</template>

<style scoped>

</style>