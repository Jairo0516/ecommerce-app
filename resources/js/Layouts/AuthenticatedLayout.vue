<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);

let products =  JSON.parse(localStorage.getItem("myShop"));


setInterval(()=>{
    products =  JSON.parse(localStorage.getItem("myShop"))
},4000)
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-black border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-white ">
                                    Dashboard
                                </NavLink>

                                <NavLink :href="route('product/list')" :active="route().current('product/list')" class="text-white ">
                                    Comprar
                                </NavLink>

                                <NavLink  v-if="$page.props.auth.user.user_type === 1" :href="route('report/list')" :active="route().current('product/list')" class="text-white ">
                                    Reportes
                                </NavLink>



                            </div>


                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-white ">
                            Dashboard
                        </ResponsiveNavLink>


                        <ResponsiveNavLink :href="route('product/list')" :active="route().current('product/list')" class="text-white ">
                            Comprar
                        </ResponsiveNavLink>

                        <ResponsiveNavLink  v-if="$page.props.auth.user.user_type === 1" :href="route('report/list')" :active="route().current('report/list')" class="text-white " >
                            Reportes
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-white">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink class="font-medium text-base text-white" :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink class="font-medium text-base text-white" :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>



            <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 pt-0 text-center">


                            <div class="px-4 py-2 border-b border-gray-200">
                                <h2 class="font-semibold text-gray-800">Productos a pagar</h2>
                            </div>
                            <div class="flex flex-col divide-y divide-gray-200">

                                <div v-for="item in products" class="flex items-center py-4 px-6">
                                    <img class="w-16 h-16 object-cover rounded" :src="item.image" alt="Product Image">
                                    <div class="ml-3">
                                        <h3 class="text-gray-900 font-semibold">{{item.name}}</h3>
                                        <p class="text-gray-700 mt-1">${{item.value}}</p>
                                    </div>
                                    <button class="ml-auto py-0 px-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between px-6 py-3 bg-gray-100">
                                <h3 class="text-gray-900 font-semibold">Total: $29.98</h3>
                                <button class="py-2 px-4 bg-green-500 hover:bg-blue-600 text-white rounded-lg">
                                    Pagar
                                </button>
                            </div>


                    </div>


                </div>
            </div>

            <!-- Page Content -->
            <main>
                <slot />
            </main>

            <footer>
                <div class="fixed bottom-4 right-4">
                    <button
                        class="px-4 py-2 bg-white border flex gap-2 border-slate-200 dark:border-slate-700 rounded-lg
                        text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150"
                        onclick="openModal('modelConfirm')">
                        <img class="w-6 h-6" src="https://st2.depositphotos.com/1114422/5830/v/450/depositphotos_58300529-stock-illustration-check-out-icon-symbol.jpg" loading="lazy" alt="google logo" >
                        <span class="text-black">Ir a pagar</span>
                    </button>
                </div>
            </footer>
        </div>
    </div>
</template>
