<script setup>
import {reactive} from 'vue'
const emits = defineEmits(['searchDataByClient']);

const props = defineProps({
    clients : Array
});

const form = reactive({
    client_id : '',
});

const resetForm = reactive({
    client_id : null,
});

const formSubmit = () => {
    emits('searchDataByClient', form);
}

const restFormFilter = () => {
    emits('searchDataByClient', resetForm);
    form.client_id = ''
}

defineExpose({
    restFormFilter
});

</script>

<template>
    <form class="flex gap-x-7" @submit.prevent="formSubmit">
        <div class="input-group inline-flex gap-x-3">
            <label for="client" class="label">Client</label>
            <select id="client" class="input w-[250px] p-2" v-model="form.client_id">
                <option value="" hidden disabled>Choose one</option>
                <option v-for="(client, index) in clients" :key="index" :value="client.id">{{ client.name }}</option>
            </select>
        </div>

        <div class="input-group inline-flex gap-x-3">
            <button type="submit" class="btn-primary dark:outline-primary px-2 py-1">Search</button>
            <button type="reset" @click.prevent="restFormFilter" class="btn-secondary dark:outline-secondary py-1 px-2">Reset</button>
        </div>
    </form>
</template>

<style scoped>

</style>
