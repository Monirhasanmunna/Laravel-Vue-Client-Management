<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import {Link, Head, useForm} from '@inertiajs/vue3';

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = () => {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };

</script>

<template>
    <Head title="Login"/>
    <GuestLayout>
        <div class="flex justify-center items-center w-[500px]">
            <main class="w-full max-w-md mx-auto p-6">
                <div
                    class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 sm:p-7 space-y-4">
                        <div class="text-center pb-3">
                            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                        </div>
                        <div class="mt-5">
                            <!-- Form -->
                            <form @submit.prevent="submit">
                                <div class="grid gap-y-4">
                                    <!-- Form Group -->
                                    <div>
                                        <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                        <div class="relative">
                                            <input type="email" id="email" v-model="form.email" autofocus autocomplete="username" class="input" aria-describedby="email-error">
                                        </div>
                                        <p v-if="form.errors.email" class="text-sm text-red-600">{{ form.errors.email }}</p>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                        </div>
                                        <div class="relative">
                                            <input type="password" id="password" v-model="form.password" autocomplete="current-password" class="input" aria-describedby="password-error">
                                        </div>
                                        <p v-if="form.errors.password" class="text-sm text-red-600">{{ form.errors.password }}</p>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Checkbox -->
                                    <div class="flex items-center">
                                        <div class="flex">
                                            <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                        </div>
                                        <div class="ms-3">
                                            <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->

                                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign in</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>

                        <div class="text-center">
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Don't have an account yet?
                                <Link class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    :href="route('register')">
                                    Sign up here
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
