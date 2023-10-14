<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
  <AppLayout title="Courses">
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Meus cursos
      </h2>
    </template>

    <div class="mt-10 mx-5 p-5 bg-white dark:bg-gray-800 dark:text-white overflow-hidden shadow-xl sm:rounded-lg">
      <div class="text-lg font-bold">
        <span>Cursos inscritos</span>
      </div>
      
      <div class="my-5 w-full grid md:grid-cols-4">
        <template v-for="course in courses" :key="course.id">
          <Link :href="route('courses.watch', {slug: course.slug})">
            <div class="w-64 h-64 p-5 border border-gray-200">
                <img class="rounded-t-lg object-cover"
                  src="https://d36ai2hkxl16us.cloudfront.net/thoughtindustries/image/upload/a_exif,c_fill,w_750,h_361/v1/course-uploads/4338ce4e-f809-4f5a-80f4-1d317c4a390d/lsczjuajit2k-38a0f59507j0-php-course-thumbnail.png"
                  alt="" />
              <div>
                <span>{{ course.title }}</span>
              </div>
            </div>
          </Link>
        </template>
      </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
  props: {
    courses: Array,
  },
};
</script>
