<template>
    <div class="container">
        <div class="title text-center">
            <h1 class="text-primary fw-light ps-40">Popular Works</h1>
            <p>Showcasing some of our works</p>
        </div>
        <div class="row">
            <div :class="'col-md-' + repeatedPattern()[index]" class="col-sm-6 col-12 mb-4 "
                v-for="(portofolio, index) in portofolios" :key="portofolio">
                <div class="card portofolio-card">
                    <div class="card-body ">
                        <div class="content d-flex"
                            :class="repeatedPattern()[index] == 8 ? 'justify-content-between' : 'align-items-end flex-column'">
                            <div class="text-start">
                                <h3 class="text-primary fw-light">{{ portofolio.title }}</h3>
                                <p>{{ portofolio.subtitle }}</p>

                            </div>
                            <div class="image-logo">
                                <img class="img" :src="portofolio.image_url" alt="" height="100" width="auto" />
                            </div>
                        </div>
                        <div class="button mt-5">
                            <a class="btn btn-primary btn-sm">View</a>

                        </div>

                        <!-- button view-->
                    </div>
                </div>
            </div>
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
    props: {
        portofolios: Object
    },
    data() {
        return {
            pattern: [8, 4, 4, 8, 8, 4, 4, 8],
            numRepeats: this.$props.portofolios.length, // Default number of repeats
        };
    },
    mounted() {
        this.getMaxHeight();
    },
    methods: {
        repeatedPattern() {
            // Create an array by repeating the pattern
            return Array(this.numRepeats).fill().flatMap(() => this.pattern);
        },

        getMaxHeight() {
            const cardElements = document.getElementsByClassName('portofolio-card');
            if (cardElements && cardElements.length > 0) {
                const maxHeight = Array.from(cardElements).reduce(
                    (max, card) => Math.max(max, card.clientHeight),
                    0
                );

                for (let i = 0; i < cardElements.length; i++) {
                    cardElements[i].style.minHeight = maxHeight + 'px';
                }

            } else {
            }
        },


    },
    watch: {
        numRepeats(newVal) {
            // Handle changes in numRepeats
            if (newVal < 1) {
                // Ensure numRepeats is at least 1
                this.numRepeats = 1;
            }
        },
    },
}
</script>
