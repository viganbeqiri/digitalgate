<template>
    <div class="q-pa-md">
        <q-table title="Treats" :rows="rows" :columns="columns" row-key="name" />
    </div>
</template>
<script>
import FrontLayout from "../Shares/FrontLayout.vue";
export default {
    layout: FrontLayout,
}
</script>
