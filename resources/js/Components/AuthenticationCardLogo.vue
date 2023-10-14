<script setup>
import { Link } from '@inertiajs/vue3';
import AtlasLogo from '@/Components/AtlasLogo.vue'
import DiversiCampLogo from '@/Components/DiversiCampLogo.vue'
</script>

<template>
    <Link :href="'/'">
        <div class="flex flex-col items-center">
            <AtlasLogo />

            <div class="mt-5">
                <DiversiCampLogo />
            </div>
        </div>
    </Link>
</template>
