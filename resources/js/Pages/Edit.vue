<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { watchEffect } from 'vue';

const props = defineProps({
    student:Object,
})
const form = useForm({
    fname: props.student.fname,
    lname:props.student.lname,
});
const update = ()=>{
    form.put(route('student.update',props.student.id))
};
</script>
<template>
    <div>
        <form @submit.prevent="update">
            <label for="fname" >First Name</label>
            <input type="text" id="lname" v-model="form.fname">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" v-model="form.lname">
            <button type="submit">Submit</button>
        </form>
    </div>
</template>
