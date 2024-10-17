<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    students:{
        type:Array,
        default:()=>[],
    }
});

const form = useForm({});

const edit = (id) =>{
    form.get(route('student.edit',id));
    // console.log('edit');
};
const deleteId = (id) =>{
    // console.log('delete');
    form.delete(`student/${id}`,{
        onSuccess:()=>{
            console.log('deleted successfully');
        },
        onError: (errors) => {
            console.log('failed to delete');
        }
    });
}
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Students"/>
        <div class="p-12">
            <div class="flex justify-center">
                <table class="w-3/5 text-center border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">First Name</th>
                                <th class="border border-gray-300 px-4 py-2">Last Name</th>
                                <th class="border border-gray-300 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in students" :key="student.id">
                                <td class="border border-gray-300 px-4 py-2">{{ student.id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.fname }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ student.lname }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <button class="bg-sky-500 w-12 rounded-lg" @click="edit(student.id)">Edit</button>
                                    <button class="bg-red-500 w-12 rounded-lg" @click="deleteId(student.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
