<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
// import CreateGceUser from '@/Components/CreateGceUser.vue';

const form = useForm({
    name: '',
    email: '',
    employee_id: '',
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link
                            :href="route('creategceuser')"
                            class="underline font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >Create New GCE User</Link
                        >

                        <table class="w-full text-left text-gray-500" style="margin-top: 20px;">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Employee ID</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="userInfo in gceUsers">
                                    <td>{{ userInfo.id }}</td>
                                    <td>{{ userInfo.name }}</td>
                                    <td>{{ userInfo.email }}</td>
                                    <td>{{ userInfo.employee_id }}</td>
                                    <td>
                                        <Link
                                            :href="route('gce-users.update', {'id': userInfo.id})"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        >
                                            Edit
                                        </Link> &nbsp;
                                        <Link
                                            href="javascript:"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            @click="deleteUser(userInfo)"
                                        >
                                            Delete
                                        </Link>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>

export default {
    props: {
        gceUsers: Object
    },
    methods: {
        deleteUser(userInfo) {
            let url = '/gce-users/' + userInfo.id;
            userInfo._method = 'DELETE';
            this.$inertia.post(url, userInfo, {
                onError: () => {
                    console.log('came back with failure');
                },
                onSuccess: () => {
                    console.log('came back with success');
                }
            });
        }
    }
}
</script>
