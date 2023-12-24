
import NavbarLayout from './NavbarLayout.vue';
<template>
    <div class="content-wrapper">
        <header class="wrapper bg-soft-primary">
            <NavbarLayout :user="auth" />
        </header>
        <slot />
        <FooterLayout />
    </div>
</template>

<script>
import FooterLayout from './FooterLayout.vue';
import NavbarLayout from './NavbarLayout.vue';
import { ref, onMounted } from 'vue'

export default {
    components: { NavbarLayout, FooterLayout },
    props: {
        auth: Object
    },
    setup() {
        const count = ref(0)
        return {
            count
        }
    },

    mounted() {
        console.log(this.auth) // 0
        theme.init()

    }
};
</script>
