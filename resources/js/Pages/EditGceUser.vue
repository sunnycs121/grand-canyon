<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    gceUser: Object
});

const form = useForm({
    name: props.gceUser.name,
    email: props.gceUser.email,
    employee_id: props.gceUser.employee_id,
});

const submit = () => {
    form.put(route('gce-users.update', props.gceUser.id), {
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <Head title="Edit GCE User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit GCE User</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="name" />

                                <!-- value="{{ gceUser.name }}" -->
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                    autofocus placeholder="Full Name" />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="email" value="email" />

                                <TextInput id="email" type="text" class="mt-1 block w-full" v-model="form.email" required
                                    placeholder="Email Address" />

                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="employee_id" value="employee_id" />

                                <TextInput id="employee_id" type="text" class="mt-1 block w-full" v-model="form.employee_id"
                                    placeholder="Employee ID" />

                                <InputError class="mt-2" :message="form.errors.employee_id" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Update GCE User
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
