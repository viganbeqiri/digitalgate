<template></template>
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
