<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Textarea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    file: '',
    date_ini: '',
    date_end: '',
});

const submit = () => {
    form.post(route('reports.store'), {
        onFinish: () => form.reset(
            'name',
            'file',
            'date_ini',
            'date_end',
        ),
    });
};

const props = defineProps({
    status: {
        type : Boolean
    }
});

</script>

<template>
    <AuthenticatedLayout>
        <Head title="Crear Reporte" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Reporte</h2>
        </template>

        <div v-if="status" class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="p-6 border-l-4 border-green-500 -6 rounded-r-xl bg-green-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-sm text-green-600">
                            <p>Datos guardados correctamente</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="title" value="Nombre Reporte" />
                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="Product title"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="begin_date" value="Fecha Inicio" />
                            <TextInput
                                id="begin_date"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.date_ini"
                                required
                                autocomplete=""
                            />
                            <InputError class="mt-2" :message="form.errors.date_ini" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="end_date" value="Fecha Final" />
                            <TextInput
                                id="end_date"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.date_end"
                                required
                                autocomplete=""
                            />
                            <InputError class="mt-2" :message="form.errors.date_end" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Crear Reporte
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
