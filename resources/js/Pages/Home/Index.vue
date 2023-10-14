<script setup>
import { Link } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

const page = usePage()

const internalHomeLink = computed(() => {
    return page.props.auth.user ? route('dashboard') : route('register')
})

</script>


<template>

    <div class="p-home font-sans text-[#140420]/[0.87] text-base">
        <header class=" w-full h-24 bg-white grid grid-cols-[auto_1fr_auto] items-center px-28">
            <img class="h-[50px] w-auto" src="logo.png" alt="logo diversatlas">

            <nav class="grid justify-end px-8">
                <ul class="grid grid-cols-[auto_auto_auto] items-center gap-4 p-0 m-0">
                    <Link
                        v-if="$page.props.auth.user"
                        class="flex px-4 py-3 items-center justify-items-center text-center text-base font-semibold hover:text-[#FE6A7A]"
                        :href="route('dashboard')"
                    >
                        Dashboard
                    </Link>

                    <template v-else>
                        <li>
                            <Link
                                class="flex px-4 py-3 items-center justify-items-center text-center text-base font-semibold hover:text-[#FE6A7A]"
                                :href="route('login')"
                            >
                                Login
                            </Link>
                        </li>
                        <li class="a-divider w-[1px] h-[50%] bg-slate-300"></li>
                        <li>
                            <Link
                                class="flex px-4 py-3 items-center justify-items-center text-center text-base font-semibold hover:text-[#FE6A7A]"
                                :href="route('register')"
                            >
                                Cadastre-se
                            </Link>
                        </li>
                    </template>
                </ul>
            </nav>

            <img class="w-[40px] h-[40px]" src="logo-atlas.svg" alt="logo da atlas techonologies">
        </header>

        <main class="w-full p-28">
            <section class="grid grid-cols-2">
                <header class="grid gap-6 text-left">
                    <h1 class="text-5xl font-black text-[#05EBFD]/[0.87]">Título CTA vai aqui neste lugar</h1>

                    <p class="text-xl text-[#ffff]/[0.87]">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>

                    <Link
                        class="flex px-6 py-3 bg-[#FFCB32] text-[#140420]/[0.87] w-fit rounded-lg text-base font-bold"
                        :href="route('register')"
                    >
                        Faça parte
                    </Link>
                </header>

                <div class="w-full max-w-full">

                </div>
            </section>

            <section class="o-section pt-28">
                <div class="o-wrapper grid grid-cols-3 gap-5">

                    <article class="o-card grid gap-6 text-[#ffff]/[0.87] p-6 rounded-lg border border-[#ffffff]/[0.2] bg-[#fff]/[0.05]">
                        <header class="m-card__header">
                            <img src="icon-courses.svg" alt="ícone nossos cursos" class="a-card-icon w-[62px] h-[62px]">
                        </header>
                        <div class="m-card__body grid gap-4">
                            <h3 class="a-card-title text-[#05EBFD]/[0.87] text-2xl font-black">Nossos cursos</h3>
                            <p class="a-card-text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                        </div>
                    </article>

                    <article class="o-card grid gap-6 text-[#ffff]/[0.87] p-6 rounded-lg border border-[#ffffff]/[0.2] bg-[#fff]/[0.05]">
                        <header class="m-card__header">
                            <img src="icon-events.svg" alt="ícone nossos eventos" class="a-card-icon w-[62px] h-[62px]">
                        </header>
                        <div class="m-card__body grid gap-4">
                            <h3 class="a-card-title text-[#05EBFD]/[0.87] text-2xl font-black">Nossos eventos</h3>
                            <p class="a-card-text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                        </div>
                    </article>

                    <article class="o-card grid gap-6 text-[#ffff]/[0.87] p-6 rounded-lg border border-[#ffffff]/[0.2] bg-[#fff]/[0.05]">
                        <header class="m-card__header">
                            <img src="icon-mission.svg" alt="ícone nossa missão" class="a-card-icon w-[62px] h-[62px]">
                        </header>
                        <div class="m-card__body grid gap-4">
                            <h3 class="a-card-title text-[#05EBFD]/[0.87] text-2xl font-black">Nossa missão</h3>
                            <p class="a-card-text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                        </div>
                    </article>

                </div>
            </section>

            <section class="o-section pt-28 text-[#ffff]/[0.87]">
                <div class="o-wrapper grid gap-5 text-center">
                    <h2 class="text-5xl font-black text-[#05EBFD]/[0.87]">Lorem ipsum dolor sit amet</h2>

                    <p>Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                </div>
            </section>

            <section class="o-section pt-28">
                <div class="o-wrapper grid grid-cols-3 gap-5">

                    <article class="o-card grid gap-6 text-[#ffff]/[0.87] p-6 rounded-lg border border-[#ffffff]/[0.2] bg-[#fff]/[0.05]">
                        <header class="m-card__header">
                            <img src="image-diversidade-1.jpg" alt="" class="a-card-icon w-full h-[140px]">
                        </header>
                        <div class="m-card__body grid gap-4">
                            <h3 class="a-card-title text-[#05EBFD]/[0.87] text-2xl font-black">
                                <Link class="hover:text-[#FE6A7A]" :href="internalHomeLink">Curso 1</Link>
                            </h3>
                            <p class="a-card-text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                        </div>
                    </article>

                    <article class="o-card grid gap-6 text-[#ffff]/[0.87] p-6 rounded-lg border border-[#ffffff]/[0.2] bg-[#fff]/[0.05]">
                        <header class="m-card__header">
                            <img src="image-tech-1.jpg" alt="" class="a-card-icon w-full h-[140px]">
                        </header>
                        <div class="m-card__body grid gap-4">
                            <h3 class="a-card-title text-[#05EBFD]/[0.87] text-2xl font-black">
                                <Link class="hover:text-[#FE6A7A]" :href="internalHomeLink">Curso 2</Link>
                            </h3>
                            <p class="a-card-text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                        </div>
                    </article>

                    <article class="o-card grid gap-6 text-[#ffff]/[0.87] p-6 rounded-lg border border-[#ffffff]/[0.2] bg-[#fff]/[0.05]">
                        <header class="m-card__header">
                            <img src="image-working-1.jpg" alt="" class="a-card-icon w-full h-[140px]">
                        </header>
                        <div class="m-card__body grid gap-4">
                            <h3 class="a-card-title text-[#05EBFD]/[0.87] text-2xl font-black">
                                <Link class="hover:text-[#FE6A7A]" :href="internalHomeLink">Curso 3</Link>
                            </h3>
                            <p class="a-card-text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                        </div>
                    </article>

                </div>
            </section>

            <section class="o-section pt-28">
                <div class="o-wrapper grid grid-cols-3 gap-5">

                    <article class="o-testimonial grid gap-6 text-[#ffff]/[0.87] p-6">
                        <header class="m-testimonial__header">
                            <img src="avatar-1.png" alt="" class="a-testimonial__avatar w-[100px] h-[100px]">
                        </header>
                        <div class="m-testimonial__body grid gap-4">
                            <p class="a-testimonial__text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                            <p class="a-testimonial__autor text-sm font-bold">Lorem ipsum</p>
                        </div>
                    </article>

                    <article class="o-testimonial grid gap-6 text-[#ffff]/[0.87] p-6">
                        <header class="m-testimonial__header">
                            <img src="avatar-2.png" alt="" class="a-testimonial__avatar w-[100px] h-[100px]">
                        </header>
                        <div class="m-testimonial__body grid gap-4">
                            <p class="a-testimonial__text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                            <p class="a-testimonial__autor text-sm font-bold">Lorem ipsum</p>
                        </div>
                    </article>

                    <article class="o-testimonial grid gap-6 text-[#ffff]/[0.87] p-6">
                        <header class="m-testimonial__header">
                            <img src="avatar-3.png" alt="" class="a-testimonial__avatar w-[100px] h-[100px]">
                        </header>
                        <div class="m-testimonial__body grid gap-4">
                            <p class="a-testimonial__text">Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>
                            <p class="a-testimonial__autor text-sm font-bold">Lorem ipsum</p>
                        </div>
                    </article>

                </div>
            </section>

            <section class="o-section pt-28 text-[#ffff]/[0.87]">
                <div class="o-wrapper grid gap-5 text-center justify-items-center">
                    <h2 class="text-5xl font-black text-[#05EBFD]/[0.87]">Lorem ipsum dolor sit amet</h2>

                    <p>Lorem ipsum dolor sit amet consectetur. Laoreet morbi amet suspendisse egestas varius sit tellus turpis. Adipiscing morbi quis eu eu ridiculus ornare quam.</p>

                    <Link
                        class="flex px-6 py-3 bg-[#FFCB32] text-[#140420]/[0.87] w-fit rounded-lg text-base font-bold"
                        :href="route('register')"
                    >
                        Faça parte
                    </Link>
                </div>
            </section>
        </main>
    </div>

</template>

<style scoped>
.p-home {
    background: no-repeat 100% 0% url("bg-circles.png"), no-repeat -40% 50% url("bg-circles.png"), no-repeat -30% 100% url("bg-circles.png"), linear-gradient(180deg, rgba(145, 0, 255, 0.20) 0%, rgba(255, 105, 122, 0.20) 100%), #6412A2;
}

.o-card {
    box-shadow: 0px 30px 100px 0px rgba(0, 0, 0, 0.20);
}

.a-testimonial__text {
    /*  */
    position: relative;
    left: 20px
}

.a-testimonial__text::before {
    content: "";
    width: 5px;
    height: 100%;
    background-color: #FFCB32;
    position: absolute;
    left: -20px;
}
</style>
