<template>
    <div class="container mb-10 pt-10">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-12">
                <div class="col-md-8 col-sm-6 col-12">
                    <div class="page-title" style="min-height: 300px;">
                        <h1 class="text-primary fw-light fs-32">{{ active_slide_content.title }}</h1>
                        <div class="text-start fs-16 mt-5">
                            {{ active_slide_content.description }}
                        </div>
                        <div class="d-flex justify-content-center justify-content-lg-start mt-5" data-cues="slideInDown"
                            data-group="page-title-buttons" data-delay="900">
                            <span><a href="/portofolio"
                                    class="btn btn-sm btn-primary rounded-pill me-2">Portofolio</a></span>
                            <span><a href="/incubator/cohort" class="btn btn-sm btn-outline-primary rounded-pill">Start a
                                    Project</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-8 d-flex justify-content-end align-items-center">
                    <div class="swiper-navigation d-flex justify-content-between w-100">
                        <a class="slider__prev btn btn-outline-primary btn-circle">
                            <vue-feather type="arrow-left"></vue-feather>
                        </a>
                        <a class="slider__next btn btn-primary btn-circle">
                            <vue-feather type="arrow-right"></vue-feather>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <section class="slider" style="margin-top: -300px;">
                    <div class="slider__flex" style="height: 720px;">
                        <div class="slider__images">
                            <div class="swiper-container" data-nav="false"> <!-- Слайдер с изображениями -->
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide" v-for="content in page.contents">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <figure class="rounded h-100">
                                                        <img class="h-auto" :src="content.image" alt="" />
                                                        <a class="item-link" :href="content.image" data-glightbox href="#"
                                                            data-gallery="product-group"><i class="uil uil-focus-add"></i>
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>

    </div>
</template>
<script>
import frontLayout from "../../Shares/FrontLayout.vue";

// Import Swiper styles

export default {
    layout: frontLayout,
    props: {
        page: Object
    },

    data() {
        return {
            active_slide: 0,
            active_slide_content: {
                title: '',
                description: '',
            },
        };
    },
    setup() {

    },
    mounted() {
        theme.init()
        console.log(this.page)
        this.contents = this.page.contents

        console.log(this.contents)

        const swipper = new Swiper('.slider__images .swiper-container', { // ищем слайдер превью по селектору
            mousewheel: true,
            navigation: {
                nextEl: '.slider__next',
                prevEl: '.slider__prev'
            },
            effect: 'coverflow',
            direction: 'vertical',
            loop: false,
            slideToClickedSlide: true,
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: -5,
                stretch: 270,
                depth: 100,
                modifier: 1,
                slideShadows: false
            },
            on: {
                slideChange: () => {
                    this.active_slide = swipper.activeIndex
                    this.active_slide_content = this.setActiveSlideContent(this.active_slide)
                }
            }




        })

        console.log(this.contents)





        this.active_slide_content = this.setActiveSlideContent(this.active_slide)

        console.log(this.active_slide_content)

        // sliderImages.on('slideChange', function (e) {
        //     // this.active_slide = e.activeIndex
        //     // this.active_slide_content = this.contents(e.activeIndex)
        //     // console.log(this.active_slide_content)
        //     console.log(this.contents)
        // })

        // theme.init()
    },
    methods: {
        onSlideChange() {
            console.log(123)
        },

        setActiveSlideContent(index) {
            return this.contents[index]
        }
    }

}
</script>


<style></style>
