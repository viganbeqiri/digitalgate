<template>
    <div class="container mt-20">
        <div class="title text-start">
            <h1 class="text-primary fw-light ps-40">Team</h1>
            <p>Home is behind, the world ahead and there are many paths to tread through shadows to the edge</p>
        </div>
        <div class="row mt-10">
            <div class="col-md-4 col-sm-6 col-12 mb-4" v-for="team in teams" :key="team">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="img">
                        <img class="rounded-circle w-15 mx-auto mb-4" :src="team.image_url" alt="" height="auto"
                            width="10" />
                    </div>
                    <div class="desc ms-3 align-items-center h-100">
                        <h4 class="mb-1">{{ team.name }}</h4>
                        <div class="meta mb-2">{{ team.position }}</div>
                    </div>
                </div>
                <!-- hr if team index is > 3-->
                <hr v-if="teams.indexOf(team) < 3" style="margin: 0!important;">
            </div>
        </div>
    </div>
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { usePage } from '@inertiajs/vue3'
export default {
    layout: FrontLayout,
    props: {
        page: Object,
        teams: Object
    },
    setup() {
        const { data } = usePage()
        console.log(data)
    },
    mounted() {
        console.log(this.$props.teams)
    }
}
</script>
