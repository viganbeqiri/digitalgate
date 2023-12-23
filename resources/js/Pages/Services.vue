<template>
    <section class="wrapper bg-light container-fluid mt-5">
        <div class="d-flex justify-content-between align-items-center pb-3">
            <div>
                <Link v-if="data.previous_page" :href="route(data.previous_page)">
                <img src="@/img/back.png" alt="back" />
                </Link>
            </div>
            <div>
                <div>
                    <img src="@/img/background/desktop-app-development.png"
                        style="height: 100%;width: 100%; object-fit: none" class="img-fluid" alt="desktop-app" />
                </div>
            </div>
            <div>
                <Link v-if="data.next_page" :href="route(data.next_page)">
                <img src="@/img/next.png" alt="next" />
                </Link>
            </div>
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
import { usePage, Head, Link, router } from '@inertiajs/vue3'
//local storage


export default {
    name: "Services",
    layout: FrontLayout,
    components: {
        Link
    },
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

