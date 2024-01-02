<script setup>
import { usePage } from '@inertiajs/vue3';
import {toast} from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

//  Array variable to store setting option for toastify 
const options = {
  'position': toast.POSITION.TOP_RIGHT,
  'autoClose' : 2000,
  'closeOnClick' : true,
  type : 'default'
}

const flash = usePage().props.flash;

const notify = (type, message) => {
  options['type'] = type,
  toast(message, options);
}

if(flash.success){
  notify('success', flash.success)
}

if(flash.error){
  notify('error', flash.error)
}

if(flash.info){
  notify('info', flash.info)
}

if(flash.warning){
  notify('warning', flash.warning)
}
</script>

<template>

</template>
