<template>
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
