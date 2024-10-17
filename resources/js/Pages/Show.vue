<script setup>
import { useForm } from "@inertiajs/vue3";

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
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students" :key="student.id">
                    <td>{{ student.id }}</td>
                    <td>{{ student.fname }}</td>
                    <td>{{ student.lname }}</td>
                    <td>
                        <button @click="edit(student.id)">Edit</button>
                        <button @click="deleteId(student.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
