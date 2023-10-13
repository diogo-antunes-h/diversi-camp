<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex p-5 h-64  dark:text-white justify-center items-center">
                        <span>Curso em progresso</span>
                    </div>
                </div>

                <div class="p-5 mt-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg  overflow-x-auto">
                    <div class="flex w-fit dark:text-white">
                        <div v-for="i in 11" :key="i" class="p-2 mb-5 mr-5 last:mr-0 w-64 h-32 bg-gray-200 dark:bg-gray-900 rounded-lg">
                            <span>Curso em progresso</span>
                        </div>
                    </div>
                </div>

                <div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex p-5 h-64 dark:text-white justify-center items-center">
                        <span>Materiais</span>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
