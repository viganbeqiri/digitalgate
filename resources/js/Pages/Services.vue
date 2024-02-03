<template>
    <section class="wrapper bg-light container pt-10">
        <div class="d-flex justify-content-between align-items-center pb-3">
            <div class="col-1">
                <Link :class="page.previous_page ? '' : 'disabled'" class="btn btn-outline-primary btn-circle"
                    :href="page.previous_page ? route(page.previous_page) : ''">
                <vue-feather type="arrow-left"></vue-feather>
                </Link>
            </div>
            <div class="col-10">
                <div class="" v-if="page.slug === 'desktop-app-development'">
                    <div class="d-flex justify-content-between container">
                        <div class="page-title">
                            <div class="col-6">
                                <h1 class="text-primary fw-light" style="font-size: 50px;">{{ page.title }}</h1>

                            </div>
                        </div>
                        <div class="cta-button align-items-end d-flex">
                            <button @click="handleClick" class="btn btn-primary">Get Quote</button>

                        </div>
                    </div>
                    <div class="mt-0 d-flex justify-content-between col-9">

                        <img src="@/img/background/desktop-app-development.png"
                            style="width: 444px; height: 400px; object-fit: cover; object-position: -20% 0;"
                            class="img-fluid" alt="desktop-app" />
                        <div class="text-start fs-21 ms-5">
                            {{ page.description }}
                        </div>

                    </div>
                </div>

                <div class="" v-if="page.slug === 'web-development'">
                    <div class="d-flex justify-content-between container">
                        <div class="page-title">
                            <div class="col-6">
                                <h1 class="text-primary fw-light" style="font-size: 50px;">{{ page.title }}</h1>

                            </div>
                        </div>
                        <div class="cta-button align-items-end d-flex">
                            <button @click="handleClick" class="btn btn-primary">Get Quote</button>
                        </div>
                    </div>
                    <div class="mt-0 d-flex justify-content-between col-9 container mt-5"
                        style="background: url(/assets/img/background/web-app-dev.png);background-size: cover;">

                        <div class="text-start fs-21 ms-5 mt-5">
                            {{ page.description }}
                        </div>

                    </div>
                </div>
                <div class="" v-if="page.slug === 'cross-platform-development'"
                    style="background: url(/assets/img/background/cross-app-dev.png);background-size: cover;min-height: 450px;">
                    <div class="d-flex justify-content-between container">
                        <div class="page-title">
                            <h1 class="text-primary fw-light" style="font-size: 50px;">{{ page.title }}</h1>
                            <div class="text-start fs-21 mt-5 col-8">
                                {{ page.description }}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="" v-if="page.slug === 'mobile-app-development'"
                    style="background: url(/assets/img/background/mobile-app-dev.png);background-size: cover;min-height: 450px;">
                    <div class="d-flex justify-content-between container">
                        <div class="col-6">
                            <div class="page-title">
                                <h1 class="text-primary fw-light" style="font-size: 50px;">{{ page.title }}</h1>
                                <div class="text-start fs-21  mt-5">
                                    {{ page.description }}
                                </div>
                                <div class="cta-button align-items-end d-flex mt-5">
                                    <button @click="handleClick" class="btn btn-primary">Get Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" v-if="page.slug === 'design-service'"
                    style="background: url(/assets/img/background/design-service.png);background-size: cover;min-height: 450px;">
                    <div class="d-flex justify-content-between container">
                        <div class="col-6">
                            <div class="page-title">
                                <h1 class="text-primary fw-light" style="font-size: 50px;">{{ page.title }}</h1>
                                <div class="text-start fs-21  mt-5">
                                    {{ page.description }}
                                </div>
                                <div class="cta-button align-items-end d-flex mt-5">
                                    <button @click="handleClick" class="btn btn-primary">Get Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-1">
                <Link :class="page.next_page ? '' : 'disabled'" :href="page.next_page ? route(page.next_page) : ''"
                    class="btn btn-primary btn-circle">
                <vue-feather type="arrow-right"></vue-feather>

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

            <div class="row mt-5 pt-5 " ref="pageContent">
                <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto text-center">
                    <h3 class="display-4 text-primary text-uppercase">{{ page.title }}</h3>
                    <h2 class="fs-15 text-muted mb-3">{{ page.subtitle }}</h2>
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
                                <h4 class="card-title text-uppercase">{{ product.name }}</h4>
                                <div class="prices text-dark">
                                    <div class="price price-show"><span class="fs-28 text-primary"> {{ new
                                        Intl.NumberFormat('en-US', {
                                            style: 'currency', currency: 'MKD', maximumSignificantDigits: 3
                                        }).format(product.price,) }}
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
                                <button @click="doOrder(product)" class="btn rounded-pill"
                                    :class="product.highlighted ? 'btn-primary' : 'btn-outline-primary'">
                                    <span class="px-3">Order</span>
                                </button>
                            </div>
                        </div>
                        <div class="row" v-if="page.slug == 'design-service'">
                            <div class="col-12 p-3" v-for="child_product in product.child_product">
                                <div class="pricing card text-center border"
                                    :class="child_product.highlighted && !child_product.mandatory ? 'border border-3 border-primary shadow shadow-lg' : ''">
                                    <div class="card-header d-flex justify-content-start align-items-center"
                                        v-if="child_product.image">
                                        <img :src="child_product.image_url" alt="" height="24px" />
                                    </div>
                                    <div class="card-body p-3"
                                        :class="!child_product.mandatory ? 'pricing-body' : 'shadow-xl'">
                                        <h4 class="card-title text-primary">{{ child_product.name }}</h4>

                                        <div class="row">
                                            <span class="text-muted">{{ child_product.subtitle }}</span>
                                        </div>

                                    </div>
                                    <!--/.card-body -->
                                    <div class="card-footer d-flex justify-content-between align-items-center"
                                        v-if="child_product.mandatory == false">
                                        <span class="fs-28 text-primary" v-if="child_product.pricing_scheme == '1'">
                                            {{ new Intl.NumberFormat('en-US', {
                                                style: 'currency', currency: 'MKD', maximumSignificantDigits: 3
                                            }).format(product.price,) }}

                                            {{ child_product.pricing_scheme == '2' ? '/month' : '' }}</span>

                                        <span class="fs-14 text-primary" v-if="child_product.pricing_scheme == '3'">contact
                                            us for price</span>

                                        <div class="order-btn">
                                            <a @click="doOrder(child_product, product)"
                                                class="btn btn-primary rounded-pill">
                                                <span class="px-3">{{ child_product.pricing_scheme == '1' ? 'Order' :
                                                    'Request Quote' }}</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
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
import { usePage, Head, Link, router } from '@inertiajs/vue3'
import { ref, onMounted, onBeforeUnmount, watch } from 'vue';  // Import the watch function
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

//local storage

const addToOrder = (product) => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
}
export default {
    name: "Services",
    layout: FrontLayout,
    components: {
        Link
    },
    data() {
        return {
            orderItem: [],
        }

    },
    setup() {
        const { data } = usePage()
        const { page, products } = usePage().props

        const sliderContents = page.slider_contents
        const contents = page.contents

        return {
            sliderContents,
            contents,
            page,
            products,
        }
    },

    props: {
        user: Object,
        data: Object,
        auth: Object
    },
    state: {
        cart: []
    },
    beforeMount() {
    },

    beforeUnmount() {
        // saveCartToLocalStorage();
    },

    computed() {
        console.log(this.page)
    },

    mounted() {
        theme.init()
        this.getMaxHeight()

    },
    onMounted() {

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

            } else {
            }
        },
        doOrder(product, parent = null) {
            if (!parent) {
                parent = product.parent_product
            }
            console.log(product)
            if (!this.auth.user) {
                toast("You need to login first !", {
                    onClose: () => router.get('/sign-in'),
                });
                return false;
            }

            product.service = this.page
            this.orderItem = [product]
            if (parent) {
                parent.service = this.page
                this.orderItem.push(parent)
            }

            //get active order from local storage
            const active_order = localStorage.getItem('active_order')
            if (active_order) {
                localStorage.removeItem('active_order')
            }
            this.saveCartToLocalStorage()
            const currentRoute = usePage().url
            const orderUrl = currentRoute + '/order'
            router.visit(orderUrl)
        },
        saveCartToLocalStorage() {
            if (localStorage.getItem('order_items')) {
                localStorage.removeItem('order_items');
            }
            localStorage.setItem('order_items', JSON.stringify(this.orderItem));
        },
        handleClick() {
            this.$refs.pageContent.scrollIntoView({ behavior: 'smooth' });
        }

    }

}

</script>
<style>
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

.text-container {
    position: absolute;
    color: rgb(255, 255, 255);
    left: 18rem;
    top: 2rem;
    background-color: rgb(41, 41, 41, 0.8);
    padding: 0 1rem;
}
</style>

