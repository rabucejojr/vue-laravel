<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Add from './Add.vue';
import Show from './Show.vue';

</script>

<template>
    <Head title="Add" />

    <AuthenticatedLayout>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900">
                    <Add/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
