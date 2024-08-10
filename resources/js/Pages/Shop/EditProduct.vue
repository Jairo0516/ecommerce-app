<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Textarea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: {
        type : Array
    },
    status: {
        type : Boolean
    }
});

const form = useForm({
    id: props.product.id,
    name: props.product.name,
    description: props.product.description,
    image: props.product.image,
    tax: props.product.tax,
    manufacturing_cost: props.product.manufacturing_cost,
    value: props.product.value,
});

const submit = () => {
    form.put(route('product.update'), {
        onFinish: () => form.reset(
            'id',
            'name',
            'description',
            'image',
            'tax',
            'manufacturing_cost',
            'value',
        ),
    });
};


</script>

<template>
    <AuthenticatedLayout>
        <Head title="Edit" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Producto</h2>
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
                            <InputLabel for="Nombre" value="Nombre Producto" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="Product name"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="mt-4 grid grid-cols-3">
                            <div class="mt-3">
                                <InputLabel for="cost" value="Valor Producto (USD)" />
                                <TextInput
                                    id="value"
                                    type="number"
                                    class="mt-1"
                                    v-model="form.value"
                                    required
                                    autocomplete="$0.00"
                                />
                                <InputError class="mt-2" :message="form.errors.value" />
                            </div>
                            <div class="mt-3">
                                <InputLabel for="manufacturing_cost" value="Costo Fabricación" />
                                <TextInput
                                    id="manufacturing_cost"
                                    type="number"
                                    class="mt-1"
                                    v-model="form.manufacturing_cost"
                                    required
                                    autocomplete="$0.00"
                                />
                                <InputError class="mt-2" :message="form.errors.manufacturing_cost" />
                            </div>
                            <div class="mt-3">
                                <InputLabel for="tax" value="Tax" />
                                <TextInput
                                    id="tax"
                                    type="number"
                                    class="mt-1"
                                    v-model="form.tax"
                                    required
                                    autocomplete="$0.00"
                                />
                                <InputError class="mt-2" :message="form.errors.tax" />
                            </div>
                        </div>
                        <div class="mt-3">
                            <InputLabel for="image" value="Imagen" />
                            <TextInput
                                id="image"
                                type="text"
                                class="mt-1"
                                v-model="form.image"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.image" />
                        </div>
                        <div class="mt-3">
                            <InputLabel for="description" value="Descripción" />
                            <Textarea
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                required
                                autocomplete="$0.00"
                                maxlength="200"

                            />
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Editar Producto
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
