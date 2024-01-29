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
            <div class="grid grid-cols-5">
                <div class="box border-gray-500 dark:border-gray-200 gap-4 p-2 bg-white">
                    
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>

</style>
