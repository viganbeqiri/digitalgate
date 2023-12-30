<template>
    <div class="container">
        <div class="title text-center">
            <h1 class="text-primary fw-light ps-40">Popular Works</h1>
            <p>Showcasing some of our works</p>
        </div>
    </div>
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { ref, onMounted, defineProps } from 'vue'
import { usePage, Head, Link, router } from '@inertiajs/vue3'
export default {
    name: "Portofolio",
    layout: FrontLayout,
    components: {
        Link
    },
}
</script>
