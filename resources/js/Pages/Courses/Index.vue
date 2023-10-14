<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, usePage } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Courses">
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        {{ course.title }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
        >
          <div class="grid grid-cols-4 gap-2">
            <div class="col-span-3 w-full">
              <iframe
                class="p-2 w-full h-full center"
                v-bind:src="actualVideo?.path"
                v-bind:title="actualVideo?.name"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              ></iframe>
            </div>
            <div class="w-full p-5">
              <div
                class="p-2"
                v-for="lesson in course.lessons"
                :key="lesson.id"
                :id="lesson.id"
              >
                <img
                  class="w-full"
                  v-bind:src="getVideoThumbnail(lesson.path)"
                  v-bind:alt="lesson.title"
                />
                <button
                  v-on:click="changeLesson(lesson)"
                  class="p-2 w-full center bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                >
                  {{ lesson.title }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
        >
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2
              class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
              Discussão
            </h2>
          </div>
          <div>
            <section
              class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased"
            >
              <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                  <h2
                    class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white"
                  >
                    Discussão (4)
                  </h2>
                </div>
                <div class="mb-6">
                  <div
                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700"
                  >
                    <label for="comment" class="sr-only">Seu comentário</label>
                    <textarea
                      id="comment"
                      rows="6"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                      placeholder="Escreva um comentário..."
                      v-model="formComment.comment"
                      required
                    ></textarea>
                  </div>
                  <button
                    type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                    v-on:click="postComment"
                  >
                    Postar
                  </button>
                </div>
                <div
                  v-for="comments in actualVideo?.lessonComments"
                  :key="comments.id"
                  :id="comments.id"
                >
                  <article
                    class="p-6 text-base bg-white rounded-lg dark:bg-gray-900"
                  >
                    <footer class="flex justify-between items-center mb-2">
                      <div class="flex items-center">
                        <p
                          class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"
                        >
                          <img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://dummyimage.com/200x200/000/fff"
                            v-bind:alt="comments.name"
                          />{{ comments.name }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                          <time
                            pubdate
                            v-bind:datetime="comments.date"
                            v-bind:title="comments.date"
                            >{{ comments.date }}</time
                          >
                        </p>
                      </div>
                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">
                      {{ comments.comment }}
                    </p>
                    <div class="flex items-center mt-4 space-x-4">
                      <button
                        type="button"
                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium"
                        v-on:click="replieTextArea = !replieTextArea"
                      >
                        <svg
                          class="mr-1.5 w-3.5 h-3.5"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 20 18"
                        >
                          <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"
                          />
                        </svg>
                        Responder
                      </button>
                    </div>
                  </article>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
  props: {
    course: Object,
    video: Number
  },
  data() {
    return {
      actualVideo: (this.video) ? this.course.lessons.filter((lesson) => (lesson.id === this.video))[0]: this.course.lessons[0],
      discussion: [
        {
          id: 1,
          name: "Liutenant Dan",
          date: new Date().toLocaleString(),
          comment: "Loren ipsum dolor sit amet, consectetur adipiscing elit.",
          replies: [
            {
              id: 1,
              name: "Liutenant Ripley",
              date: new Date().toLocaleString(),
              comment: "Loren ipsum dolor sit amet",
            },
          ],
        },
      ],
      formComment: useForm({
        'lesson_id': this.actualVideo?.id,
        'user_id': this.$page.props.auth.user.id,
        'comment': ''
      }),
      user: this.$page.props.auth.user.name,
    };
  },
  methods: {
    postComment() {
      this.formComment.post('asd');
      this.formComment.reset();
    },
    getVideoThumbnail(video) {
      let videoId = video.split("/").pop();
      return `https://img.youtube.com/vi/${videoId}/0.jpg`;
    },
    changeLesson(lesson) {
      this.actualVideo = lesson;
      this.$inertia.visit(
        route('courses.watch', { slug: this.course.slug }),
        {
          preserveScroll: true,
          preserveState: true,
          data: { video: lesson.id }
        },
        { replace: true }
      );
    }
  },
};
</script>
