<template></template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
export default {
    name: "OrderDetail",
    layout: FrontLayout,
    components: {

    },
    props: {
        order: Object,
    },
    mounted() {
        console.log(this.order)
    }
}
</script>
