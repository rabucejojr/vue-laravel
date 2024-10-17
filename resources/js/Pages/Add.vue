<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    fname: '',
    lname:'',
});
const submit = ()=>{
    // console.log(form.fname);
    const formData = new FormData();
    formData.append('fname',form.fname);
    formData.append('lname',form.lname);
    form.post(route('student.store'),{
        forceFormData:true,
        onSuccess: (response) => {
            console.log('Success:', response);
            form.reset();
            form.get(route('student.index'));
        },
        onError: (errors) => {
            console.log('Error:', errors);
        },
    })
}
</script>
<template>
    <div>
        <form @submit.prevent="submit">
            <div class="">
                <label for="fname" class="p-2" >First Name</label>
                <input type="text" id="lname" v-model="form.fname">
                <label for="lname" class="p-2">Last Name</label>
                <input type="text" id="lname" v-model="form.lname">
                <button type="submit" class="p-2">Submit</button>
            </div>
        </form>
    </div>
</template>
