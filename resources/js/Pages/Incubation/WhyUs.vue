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
                    <div class="swiper-navigation d-flex justify-content-between">
                        <a class="slider__prev">
                            <img src="@/img/back.png" alt="back" />
                        </a>

                        <a class="slider__next">
                            <img src="@/img/next.png" alt="back" />
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <section class="slider">
                    <div class="slider__flex">
                        <div class="slider__images">
                            <div class="swiper-container" data-nav="false"> <!-- Слайдер с изображениями -->
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide" v-for="content in page.contents">
                                        <figure class="rounded h-100"><img class="h-auto" :src="content.image" alt="" /><a
                                                class="item-link" :href="content.image" data-glightbox
                                                data-gallery="product-group"><i class="uil uil-focus-add"></i></a>
                                        </figure>
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
            contents: this.page.contents
        };
    },
    setup() {

    },
    mounted() {
        theme.init()
        console.log(this.page)
        const swipper = new Swiper('.slider__images .swiper-container', { // ищем слайдер превью по селектору
            direction: 'vertical',
            slidesPerView: 1,
            spaceBetween: 32,
            mousewheel: true,
            navigation: {
                nextEl: '.slider__next',
                prevEl: '.slider__prev'
            },
            grabCursor: true,
            breakpoints: {
                0: {
                    direction: 'horizontal',
                },
                768: {
                    direction: 'vertical',
                }
            },
            on: {
                slideChange: () => {
                    this.active_slide = swipper.activeIndex
                    this.active_slide_content = this.contents[swipper.activeIndex]
                    console.log(swipper.activeIndex)
                }
            }
        })

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


<style>
.slider {
    padding: 32px;
    color: #fff;
}

.slider .swiper-container {
    width: 100%;
    height: 100%;
}

.slider__flex {
    display: flex;
    align-items: flex-start;
}

.slider__col {
    display: flex;
    flex-direction: column;
    width: 150px;
    margin-right: 32px;
}

.slider__prev,
.slider__next {
    cursor: pointer;
    text-align: center;
    font-size: 14px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.slider__prev:focus,
.slider__next:focus {
    outline: none;
}

.slider__thumbs {
    height: calc(400px - 96px);
}

.slider__thumbs .slider__image {
    transition: 0.25s;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
    opacity: 0.5;
}

.slider__thumbs .slider__image:hover {
    opacity: 1;
}

.slider__thumbs .swiper-slide-thumb-active .slider__image {
    -webkit-filter: grayscale(0%);
    filter: grayscale(0%);
    opacity: 1;
}

.slider__images {
    height: 400px;
}

.slider__images .slider__image img {
    transition: 3s;
}

.slider__images .slider__image:hover img {
    transform: scale(1.1);
}

.slider__image {
    width: 100%;
    height: 100%;
    border-radius: 30px;
    overflow: hidden;
}

.slider__image img {
    display: block;
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
}

@media (max-width: 767.98px) {
    .slider__flex {
        flex-direction: column-reverse;
    }

    .slider__col {
        flex-direction: row;
        align-items: center;
        margin-right: 0;
        margin-top: 24px;
        width: 100%;
    }

    .slider__images {
        width: 100%;
    }

    .slider__thumbs {
        height: 100px;
        width: calc(100% - 96px);
        margin: 0 16px;
    }

    .slider__prev,
    .slider__next {
        height: auto;
        width: 32px;
    }
}

.swiper-button {
    display: none !important;
    ;
}
</style>
