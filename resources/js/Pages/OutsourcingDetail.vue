<template>
    <section class="wrapper bg-light container-fluid">
        <div class="d-flex justify-content-start align-items-center pb-3 w-100">
            <div class="row w-100">
                <div class="col-1">
                    <div class="alig-items-start">
                        <Link :href="route('outsourcing.index')">
                        <img src="@/img/back.png" alt="back" />
                        </Link>
                    </div>
                </div>
                <div class="col-10 d-flex justify-content-center">
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
                <div class="row w-100 mb-5">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-12" v-for="content in contents">
                        <div class="card">
                            <div class="card-body text-justify">
                                <p>{{ content.subtitle }}</p>
                                <p class="text-primary ">{{ content.title }}</p>
                                <p class="text-muted">{{ content.description }}</p>
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
