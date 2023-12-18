<template>
    <h1>asd</h1>
</template>

<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { ref, onMounted } from 'vue'


export default {
    layout: FrontLayout,
    setup() {
        const count = ref(0)
        return {
            count
        }
    },

}

</script>
