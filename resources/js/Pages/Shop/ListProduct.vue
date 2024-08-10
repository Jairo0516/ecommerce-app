<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const search = defineModel()
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Lista productos" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista productos</h2> <br>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex" v-if="$page.props.auth.user.user_type === 1">
                <Link
                    :href="route('product/create')" class="text-black-50">
                    Nuevo Producto
                </Link>

            </div>


        </template>


        <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0">
            <div class="relative flex">

                <input
                    type="search"
                    name="search"
                    v-model="search"
                    placeholder="Buscar"
                    class="bg-white dark:bg-white-800 h-10 flex px-5 w-full rounded-l-full  rounded-r-full text-sm focus:outline-none border-2 border-l-0 border-gray-500 dark:border-gray-600 "
                    autocomplete="off"
                    spellcheck="false"
                    required
                    step="any"
                    autocapitalize="none"
                    autofocus />
                <a :href="route('product/list',  {filter:search})"
                    type="button"
                    class="absolute inset-y-0 right-0 mr-2 flex items-center px-2">
                        <svg
                            class="h-4 w-4 fill-current dark:text-black"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1" id="Capa_1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966"
                            xml:space="preserve"
                            width="512px"
                            height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
                </a>
            </div>

        </section>

        <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0">

            <section
                class="p-5 md:p-0 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 items-start ">
                <section v-for="item in $page.props.products"
                         class="p-5 py-0.5 bg-purple-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer"
                >
                    <img :src="item.image" alt="">
                    <div class="space-x-1 flex justify-center mt-10">
                        <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-4 h-4 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-3xl my-5">{{item.name}}</h1>
                    <p class="mb-5 text-justify">{{item.description}}</p>
                    <h2 class="font-semibold mb-5">${{item.value}} USD</h2>
                    <Link
                        type="button"
                        class="p-2 px-6 bg-green-600 text-white rounded-md hover:bg-green-900"
                        :href="route('product/show', {product:item.id})"
                    >
                        Ver detalle
                    </Link>
                </section>

            </section>
        </section>
    </AuthenticatedLayout>
</template>
