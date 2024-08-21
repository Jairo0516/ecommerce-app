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

        <!-- One section -->
        <section class="bg-white-600 py-20">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <h1 class="text-black font-bold text-5xl leading-tight mb-6">Discover the world's best coffee</h1>
                        <p class="text-black text-xl mb-8">From hand-picked farms to your cup, we source the finest beans and
                            roast them to perfection.</p>
                        <a href="#index_product"
                           class="px-6 py-3 bg-black text-white text-black-600 font-bold rounded-full hover:bg-black-700 transition duration-200">Shop
                            now</a>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://plus.unsplash.com/premium_photo-1675716443562-b771d72a3da7" alt="Coffee beans"
                             class="w-full rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </section>


        <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0" style="width: 50%" id="index_product">
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


        <!-- Two section -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Products List</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div  v-for="item in $page.props.products" class="bg-white rounded-lg shadow-md overflow-hidden">

                        <a  :href="route('product/show', {product:item.id})">
                            <img :src="item.image" alt="Coffee"
                                 class="w-full h-64 object-cover">
                        </a>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{item.name}}</h3>
                            <p class="text-gray-700 text-base">{{item.description}}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-gray-700 font-medium">${{item.value.toLocaleString('es-US')}}</span>
                                <a :href="route('product/show', {product:item.id})"
                                    class="px-4 py-2 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-200">More information</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </AuthenticatedLayout>
</template>
