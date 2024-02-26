<template>
    <section class="wrapper bg-light">
        <div class="">
            <div class="card  mt-2 mb-2 mb-md-17">
                <div class="card-body p-md-10 py-xl-11 px-xl-15">
                    <div class="row gx-lg-8 gx-xl-0 gy-10 align-items-center">
                        <div class="col-lg-8 order-lg-2 d-flex position-relative">

                            <div class="bg-soft-primary rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 500px; height: 500px;">
                                <img class="img-fluid " src="@/img/photos/incubator.png"
                                    srcset="@/img/photos/incubator.png 2x" alt="" data-cue="fadeIn" width="300">
                                <div data-cue="slideInRight" data-delay="300">
                                </div>

                                <div class="card shadow-lg position-absolute rounded-circle bg-primary text-white text-center"
                                    style="bottom: 10%; right: 16%;width: 200px;">
                                    <div class="card-body fs-16 fw-medium">
                                        <p>
                                            Have a great idea?
                                        </p>
                                        <p>
                                            We finance it
                                        </p>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.card -->
                            </div>
                            <!--/div -->
                        </div>
                        <!--/column -->
                        <div class="col-lg-4 text-center text-lg-start" data-cues="slideInDown" data-group="page-title"
                            data-delay="600">
                            <h1 class="display-2 mb-0 fw-light text-primary">Let's Make</h1>
                            <h1 class="display-2 mb-5 fw-bold text-primary">Something great.</h1>
                            <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown"
                                data-group="page-title-buttons" data-delay="900">
                                <p>Incubation program that bring your idea to life. We provide two-way NDA to ensure your
                                    idea remains yours. No matter what!</p>
                            </div>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!--/.card-body -->
            </div>
            <!--/.card -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-12">
                        <div class="col-md-8 col-sm-6 col-12">
                            <div class="page-title" style="min-height: 300px;">
                                <h1 class="text-primary fw-light fs-32">{{ active_slide_content.title }}</h1>
                                <div class="text-start fs-16 mt-5">
                                    {{ active_slide_content.description }}
                                </div>
                                <div class="d-flex justify-content-center justify-content-lg-start mt-5"
                                    data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">
                                    <span><a href="/portofolio"
                                            class="btn btn-sm btn-primary rounded-pill me-2">Portofolio</a></span>
                                    <span><a href="/incubator/cohort"
                                            class="btn btn-sm btn-outline-primary rounded-pill">Start a
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
                                                                <a class="item-link" :href="content.image" data-glightbox
                                                                    href="#" data-gallery="product-group"><i
                                                                        class="uil uil-focus-add"></i>
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
        </div>
        <!-- /.container -->
    </section>
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
