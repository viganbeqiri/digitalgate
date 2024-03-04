<template>
    <section class="wrapper bg-light">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 col-12  pb-5">
                    <div class="programs">
                        <div class="page-title">
                            <h1 class="text-primary fw-light fs-20">Mentorship and Networking Program</h1>
                            <div class="text-start fs-16 mt-2">Learn from the ones who walked your path before. Leverage
                                from our international networking platform</div>

                        </div>
                    </div>
                    <div class="programs">
                        <div class="page-title">
                            <h1 class="text-primary fw-light fs-20">Infrastructure Support</h1>
                            <div class="text-start fs-16 mt-2">Provide startups with access to cutting-edge technological
                                resources and support. This could include software development tools, cloud services, and
                                technical expertise to help them develop, test, and deploy
                            </div>
                        </div>
                    </div>
                    <div class="programs">
                        <div class="page-title">
                            <h1 class="text-primary fw-light fs-20">Funding Support
                            </h1>
                            <div class="text-start fs-16 mt-2">Funding Support and Equity-Based Collaboration. At
                                DigitalGate, were committed to fueling the growth of startups through direct funding
                                support. Recognizing the challenges of securing capital, we offer al unique proposition
                                where startups receive the necessary funding without upfront costs. Instead, we engage in an
                                equity-based collaboration, where we obtain a proportional stake in the startup.
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center justify-content-lg-start mt-5" data-cues="slideInDown"
                        data-group="page-title-buttons" data-delay="900">
                        <span>
                            <Link :href="route('portfolio')" class="btn btn-sm btn-primary rounded-pill me-2">Portofolio
                            </Link>
                        </span>
                        <span>
                            <Link :href="route('incubator.cohort')" class="btn btn-sm btn-outline-primary rounded-pill">
                            Start a
                            Project</Link>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-12" style="background-image: url('/assets/img/rocket.png');no-repeat   center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">

                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { router } from "@inertiajs/vue3";
import frontLayout from "../../Shares/FrontLayout.vue";
import { Link, usePage } from '@inertiajs/vue3'


// Import Swiper styles

export default {
    layout: frontLayout,
    props: {
        page: Object,

    },
    components: {
        Link
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


        // theme.init()
    },
    methods: {
    }

}
</script>


<style>
.programs {
    margin-bottom: 30px;
}
</style>
