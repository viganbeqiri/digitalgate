<template>
    <section class="wrapper bg-light">
        <div class="swiper-container swiper-hero dots-over" data-margin="0" data-autoplay="true" data-autoplaytime="7000"
            data-nav="true" data-dots="true" data-items="1">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image"
                        v-for="sliderContent in sliderContents" v-bind:data-image-src="sliderContent.media_url">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div
                                    class="col-md-8 offset-md-1 col-lg-7 offset-lg-0 col-xl-6 col-xxl-5 text-center text-lg-start justify-content-center align-self-center align-items-start">
                                    <h2
                                        class="display-1 fs-56 mb-4 text-white animate__animated animate__slideInDown animate__delay-1s">
                                        {{ sliderContent.title }}</h2>
                                    <p
                                        class="lead fs-23 lh-sm mb-7 text-white animate__animated animate__slideInRight animate__delay-2s">
                                        {{ sliderContent.subtitle }}
                                    </p>
                                    <div class="animate__animated animate__slideInUp animate__delay-3s"><a href="#"
                                            class="btn btn-lg btn-outline-white rounded-pill">Read More</a></div>
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!--/.container -->
                    </div>
                    <!--/.swiper-slide -->
                </div>
                <!--/.swiper-wrapper -->
            </div>
            <!-- /.swiper -->
        </div>
        <!-- /.swiper-container -->
    </section>
    <section class=" bg-light">
        <div class="container py-4">

            <div class="d-flex flex-sm-column flex-lg-row justify-content-between py-5 my-5">
                <div class="card text-center w-25 mx-2" v-for="content in contents">
                    <div class="card-body">
                        <img :src="content.image" alt="" height="60px" />
                        <p class="text-primary fs-18 fw-medium pt-3">{{ content.title }}</p>
                        <p class="fs-14">
                            {{ content.description }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto text-center">
                    <h3 class="display-4 text-primary">{{ data.title }}</h3>
                    <h2 class="fs-15 text-muted mb-3">{{ data.subtitle }}</h2>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="pricing-wrapper position-relative pb-lg-5 pb-sm-3">
                <div class="row gy-6 mt-3 mt-md-5">
                    <div class="col-md-6 col-lg-4" v-for="product in products">
                        <div class="pricing card text-center border"
                            :class="product.highlighted && !product.mandatory ? 'border border-3 border-primary shadow shadow-lg' : ''">
                            <div class="card-header d-flex justify-content-start align-items-center" v-if="product.image">
                                <img :src="product.image_url" alt="" height="24px" />
                            </div>
                            <div class="card-body mx-1 mr-1" :class="!product.mandatory ? 'pricing-body' : 'shadow-xl'">
                                <h4 class="card-title">{{ product.name }}</h4>
                                <div class="prices text-dark">
                                    <div class="price price-show"><span class="fs-28 text-primary">MKD {{
                                        parseInt(product.price) }}
                                            {{ product.pricing_scheme == '2' ? '/month' : '' }}</span></div>

                                </div>
                                <div class="row">
                                    <span class="text-muted">{{ product.subtitle }}</span>
                                </div>
                                <!--/.prices -->
                                <div class="text-primary py-5">
                                    <p class="mb-0" v-for="additional_info in product.additional_info">- {{ additional_info
                                    }}
                                    </p>
                                </div>

                            </div>
                            <!--/.card-body -->
                            <div class="card-footer" v-if="product.mandatory == false">
                                <a href="#" class="btn btn-outline-primary rounded-pill">
                                    <span class="px-3">Order</span>
                                </a>
                            </div>
                        </div>
                        <!--/.pricing -->
                    </div>
                    <!--/column -->

                </div>
                <!--/.row -->
            </div>
            <!--/.pricing-wrapper -->
        </div>


    </section>
</template>

<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { ref, onMounted, defineProps } from 'vue'
import { usePage, Head } from '@inertiajs/vue3'
//local storage


export default {
    name: "Services",

    layout: FrontLayout,
    data() {
        return {
        }

    },
    setup() {
        const data = usePage().props.data
        const products = usePage().props.products
        const sliderContents = JSON.parse(data.slider_contents)
        const contents = JSON.parse(data.contents)
        return {
            sliderContents,
            contents,
            data,
            products
        }
    },

    props: {
        user: Object,
        data: Object
    },
    beforeMount() {
        console.log(this.data)
    },
    computed() {
        console.log(this.data)
    },

    mounted() {
        theme.init()
        this.getMaxHeight()

    },
    methods: {
        getMaxHeight() {
            const cardElements = document.getElementsByClassName('pricing-body');
            if (cardElements && cardElements.length > 0) {
                const maxHeight = Array.from(cardElements).reduce(
                    (max, card) => Math.max(max, card.clientHeight),
                    0
                );

                for (let i = 0; i < cardElements.length; i++) {
                    cardElements[i].style.minHeight = maxHeight + 'px';
                }

                console.log(cardElements)
                console.log('Max Height:', maxHeight);
            } else {
                console.warn('No card elements found.');
            }


        },
    }

}

</script>

<script setup>
</script>

