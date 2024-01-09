<script setup>
import {reactive} from 'vue'
const emits = defineEmits(['searchDataByDate']);

const form = reactive({
    fromDate : new Date().toISOString().substr(0, 10),
    toDate : new Date().toISOString().substr(0, 10),
});

const resetForm = reactive({
    fromDate : null,
    toDate : null,
});

const formSubmit = () => {
    emits('searchDataByDate', form);
}

const restFormFilter = () => {
    emits('searchDataByDate', resetForm);
}

</script>

<template>
    <form class="flex gap-x-7" @submit.prevent="formSubmit">
        <div class="input-group inline-flex gap-x-3">
            <label for="from" class="label">From</label>
            <input type="date" id="from" v-model="form.fromDate" class="input py-2 w-full">
        </div>

        <div class="input-group inline-flex gap-x-3">
            <label for="from" class="label">To</label>
            <input type="date" id="from" v-model="form.toDate" class="input py-2 w-full">
        </div>

        <div class="input-group inline-flex gap-x-3">
            <button type="submit" class="btn-primary dark:outline-primary px-2 py-1">Search</button>
            <button type="reset" @click.prevent="restFormFilter" class="btn-secondary dark:outline-secondary py-1 px-2">Reset</button>
        </div>
    </form>
</template>

<style scoped>

</style>
