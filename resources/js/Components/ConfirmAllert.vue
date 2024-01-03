<script setup>
const emits = defineEmits(['hideAlert', 'deleteItem'])

const hideFunction = ()=>{
    emits('hideAlert');
}

const deleteFunction = ()=>{
    emits('deleteItem');
    emits('hideAlert');
}
</script>

<template>
    <div class="absolute top-0 left-0 right-0  w-full h-dvh" style="background-color: rgba(0, 0, 0, 0.626);">
        <div class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2 duration-500 transition-all">
            <div class="max-w-xs p-4 bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700"
                role="alert">
                <div class="flex">
                    <div class="">
                        <h3 class="text-gray-800 font-semibold dark:text-white">
                            Do you want to delete?
                        </h3>
                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Notifications may include alerts, sounds and icon badges.
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex justify-between">
                        <button type="button" @click="hideFunction" class="p-1 px-2 bg-green-600 rounded text-gray-200 text-sm">
                            Don't allow
                        </button>
                        <button @click="deleteFunction" type="button" class="p-1 px-2 bg-red-600 rounded text-gray-200 text-sm">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
