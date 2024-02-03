<template>
    <section class="wrapper bg-light container-fluid">
        <div class="d-flex justify-content-start align-items-center pb-3 w-100 pt-10">
            <div class="row w-100">
                <div class="col-12 d-flex justify-content-center">
                    <div class=" w-100 text-center">
                        <h1 class="display-4 text-primary text-uppercase">{{ page.title }}</h1>
                        <p>{{ page.subtitle }}</p>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <div class="container py-4">
            <div class="d-flex justify-content-center mt-3 w-100">
                <div class="row w-100 mb-5 d-flex justify-content-center">
                    <div :class="contents.length === 3 ? 'col-4' : 'col-3'" v-for="content in contents"
                        v-if="page.slug != 'cybersecurity-service'">
                        <div class="card">
                            <div class="card-body text-justify">
                                <div class="icon mb-3" v-if="content.image">
                                    <img :src="content.image" alt="" />
                                </div>
                                <p v-if="content.subtitle">{{ content.subtitle }}</p>
                                <p class="text-primary ">{{ content.title }}</p>
                                <p class="text-muted">{{ content.description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center" v-if="page.slug == 'cybersecurity-service'">
                        <div class="image" v-for="slider in page.slider_contents">
                            <img :src="slider.media_url" alt="" />
                        </div>
                    </div>
                    <div class="col-9" v-if="page.slug == 'cybersecurity-service'">
                        <div class="col-12 d-flex justify-content-center mb-3" v-for="content in page.contents">
                            <div class="card">
                                <div class="card-body text-justify d-flex justify-content-between">
                                    <p v-if="content.subtitle">{{ content.subtitle }}</p>
                                    <div class="col-4 align-items-center d-flex text-center">
                                        <h3 class="text-primary fw-light">{{ content.title }}</h3>

                                    </div>
                                    <div class="col-8 text-end">
                                        <p class="text-muted">{{ content.description }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Get Quote</button>
            </div>
        </div>

        <!-- /.swiper-container -->
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
        }
    },

    mounted() {
        theme.init()
        console.log(usePage().props)
        console.log(this.page)
        this.getMaxHeight()

    },

    methods: {
        getMaxHeight() {
            const cardElements = document.getElementsByClassName('card-body');
            if (cardElements && cardElements.length > 0) {
                const maxHeight = Array.from(cardElements).reduce(
                    (max, card) => Math.max(max, card.clientHeight),
                    0
                );

                for (let i = 0; i < cardElements.length; i++) {
                    cardElements[i].style.minHeight = maxHeight + 'px';
                }

                console.log(cardElements)
            }
        },
    }

}
</script>
