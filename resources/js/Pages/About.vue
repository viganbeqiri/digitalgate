<template>
    <section class="wrapper bg-light">
        <div class="container">
            <div class="card  mt-2 mb-13 mb-md-17">
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
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-light">
        <div class="container-fluid  pb-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="heading-text container mb-5">
                        <p>
                            Choose DigitalGate for a blend of innovation, expertise, and personalized service. We stand out
                            by
                            offering tailor-made solutions that precisely fit your unique business needs. Our commitment to
                            cutting-edge technology, coupled with a deep understanding of market trends, ensures your
                            projects
                            are
                            not just current, but future-ready.
                        </p>
                        <p>
                            We prioritize seamless communication and transparency, ensuring a collaborative and trust-filled
                            partnership. With| DigitalGate, it's not just about delivering projects; it's about forging
                            lasting
                            relationships and driving your business towards lasting success. Let us be your gateway to
                            digital
                            excellence.

                        </p>
                    </div>
                    <figure class="rounded"><img src="@/img/photos/office.png" srcset="@/img/photos/office.png 2x" alt="" />
                    </figure>
                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400 text-white mt-n5 mt-lg-0 mt-lg-n50p mb-lg-n50p border-radius-lg-top"
                                data-image-src="./assets/img/photos/bg3.jpg">

                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!-- /column -->
                    </div>
                    <div class="text-heading container mt-5">
                        <p>
                            At DigitalGate, our vision is to be the catalyst for growth and innovation for SMEs and
                            individuals. We understand the unique challenges and immense potential in this sector, and we're
                            dedicated to unlocking that potential. Our goal is to empower these businesses and entrepreneurs
                            with state-of-the-art digital solutions that amplify their presence and
                            diverse business ecosystem.
                            impact in the global marketplace. We strive to provide tools and services that not only meet
                            their current needs but also anticipate and prepare them for future challenges and
                            opportunities. By partnering with us, SMEs and individuals can| transform their visions into
                            reality, making a significant mark in their respective fields and contributing to a vibrant,
                        </p>
                    </div>
                </div>

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</template>
<script>
import { faThermometer } from "@fortawesome/free-solid-svg-icons";
import FrontLayout from "../Shares/FrontLayout.vue";
export default {
    layout: FrontLayout,
    mounted() {
        theme.init();
    }
}
</script>
