<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
  <AppLayout :title="`Curso ${course.title}`">
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        {{ course.title }}
      </h2>
    </template>

    <div class="pb-10">
        <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-lg">
                <div class="mx-auto w-full max-w-5xl rounded-lg">
                    <img src="/storage/images/courses/banners/ff5c688d-5414-4eb7-83a0-ea32d90a8e92.png" :alt="course.title" class="w-full h-64" />
                </div>
            </div>
        </div>
        </div>

        <div class="mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl sm:rounded-lg">
                <div class="p-5">
                    <span class="text-bold text-lg">Informações</span>

                    <div class="mt-10 grid grid-cols-4 space-x-5">
                        <div class="flex flex-col">
                            <span class="font-bold">Título</span>
                            <span>{{ course.title }}</span>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-bold">Slug</span>
                            <span>{{ course.slug }}</span>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-bold">Criado em</span>
                            <span>{{ course.created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl sm:rounded-lg">
                <div class="p-5">
                    <span class="text-bold text-lg">Descrição</span>

                    <div class="mt-10 flex">
                        <span>{{ course.description }}</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
    props: {
        course: Object
    },
    data() {
        return {
        title: "PHP do básico ao avançado",
        video: "https://www.youtube.com/embed/zZ6vybT1HQs",
        classes: [
            {
            id: 1,
            name: "Instalando o ambiente",
            video: "https://www.youtube.com/embed/zZ6vybT1HQs",
            },
            {
            id: 2,
            name: "Apertando os cintos",
            video: "https://www.youtube.com/embed/zZ6vybT1HQs",
            },
            {
            id: 3,
            name: "Decolando",
            video: "https://www.youtube.com/embed/zZ6vybT1HQs",
            },
        ],
        };
    },
};
</script>
