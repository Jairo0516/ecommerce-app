<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    reports: {
        type: Array,
    }
});
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Reportes" />
        <br>
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex" v-if="$page.props.auth.user.user_type === 1">
            <a  type="button"
                :href="route('reports/CreateReport')"
                class="text-center bg-green-400
                 text-white
                  text-sm
                  leading-6
                  font-medium
                  py-1 px-2
                  rounded-lg
                  text-black-50">
                New Report
            </a>
        </div><br>

        <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
            <table class="w-full table-fixed">
                <thead>
                <tr class="bg-gray-100">
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Id</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Report</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Date Ini</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Date End</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="item in reports">
                        <td class="py-4 px-6 border-b border-gray-200">{{ item.name }}</td>
                        <td class="py-4 px-6 border-b border-gray-200 truncate">
                            <a href="/reports-export" target="_blank"   class="text-center bg-orange-400
                             text-white
                              text-sm
                              leading-6
                              font-medium
                              py-1 px-2
                              rounded-lg
                              text-black-50">
                                Descargar
                            </a>
                        </td>
                        <td class="py-4 px-6 border-b border-gray-200">{{ item.date_ini }}</td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            {{ item.date_end }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </AuthenticatedLayout>
</template>
