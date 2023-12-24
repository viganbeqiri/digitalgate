<template>
    <section class="wrapper bg-light container pt-5">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-12">
                <div class="d-flex justify-content-center" v-for="slide_content in slider_contents">
                    <img :src="slide_content.media_url" class="img-fluid" alt="desktop-app" />
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-12 d-flex justify-content-start">
                <div class="row align-items-center">

                    <div class="col-12 pl-2">
                        <div class="card mt-3" v-for="(content, index) in contents"
                            :class="index == contents.length - 1 ? 'mb-5' : ''">
                            <div class="card-body d-flex justify-content-between p-0 align-items-center">
                                <div class="image-wrapper rounded-4-lg-start p-3">
                                    <img :src="content.image" alt="" height="60px" />
                                </div>
                                <div class="right p-3">
                                    <Link :href="route(content.link)" class="card-title  text-primary"
                                        style="font-size: 14pt;">
                                    {{ content.title }}
                                    </Link>
                                    <p class="card-text">
                                        {{ content.description }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { usePage, Head, Link, router } from '@inertiajs/vue3'
export default {
    name: "Outsourcing",
    layout: FrontLayout,
    components: {
        Link
    },
    setup() {
        const { page } = usePage().props
        const { contents, slider_contents } = page

        return {
            page,
            contents,
            slider_contents
        }
    },
    mounted() {
        theme.init()
        console.log(usePage().props)
        console.log(this.page)

    },
}
</script>
