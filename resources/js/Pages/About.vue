<template>
    <!-- /section -->

    <section class="wrapper bg-light " style="background-image: url('/assets/img/Background.png');height: 100vh;no-repeat   center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
        <div class="container ">

            <div class="d-flex justify-content-center">
                <div class="" style="width: 70%;">
                    <p class="mb-6 fs-21">Choose DigitalGate for a blend of innovation, expertise, and personalized service.
                        We
                        stand out by offering tailor-made solutions that precisely fit your unique business needs. Our
                        commitment to cutting-edge technology, coupled with a deep understanding of market trends, ensures
                        your projects are not just current, but future-ready.</p>
                    <div class="row">
                        <div class="col-md-4 col-6 d-flex align-items-center">
                            <div class="w-100">
                                <div class="card w-100 shadow-lg " style="border-radius: 10%;">
                                    <div class="card-body ">
                                        <!-- get image-->
                                        <div class="images w-100 text-center">
                                            <img src="@/img/icons/brainstrom-brain-think-design.png" alt="why-us"
                                                width="100">
                                        </div>
                                        <div class="item-title mt-3 text-center">
                                            <strong class="">Design & Marketing</strong>

                                        </div>
                                        <div class="item-desc mt-2">
                                            <p class="text-justify">
                                                We customize design and marketing strategies to meed the needs of your
                                                audience
                                            </p>
                                        </div>
                                        <div class="button-more">
                                            <a href="#" class="btn btn-soft-ash rounded-pill text-primary">
                                                MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-6 d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="card w-100 shadow-lg " style="border-radius: 10%;">
                                        <div class="card-body ">
                                            <!-- get image-->
                                            <div class="images w-100 text-center">
                                                <img src="@/img/icons/loudspeaker.png" alt="why-us" width="100">
                                            </div>
                                            <div class="item-title mt-3 text-center">
                                                <strong class="">More Communication</strong>

                                            </div>
                                            <div class="item-desc mt-2">
                                                <p class="text-justify">
                                                    Make your mark in your community. We assist in aplify your voice
                                                </p>
                                            </div>
                                            <div class="button-more">
                                                <a href="#" class="btn btn-soft-ash rounded-pill text-primary">
                                                    MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card w-100 shadow-lg " style="border-radius: 10%;">
                                        <div class="card-body ">
                                            <!-- get image-->
                                            <div class="images w-100 text-center">
                                                <img src="@/img/icons/audience.png" alt="why-us" width="100">
                                            </div>
                                            <div class="item-title mt-3 text-center">
                                                <strong>Outsourcing Services</strong>

                                            </div>
                                            <div class="item-desc mt-2">
                                                <p class="text-justify">
                                                    Optimize your business cost by outsourcing to us.
                                                </p>
                                            </div>
                                            <div class="button-more">
                                                <a href="#" class="btn btn-soft-ash rounded-pill text-primary">
                                                    MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 d-flex align-items-center">
                            <div class="w-100">
                                <div class="card w-100 shadow-lg " style="border-radius: 10%;">
                                    <div class="card-body ">
                                        <!-- get image-->
                                        <div class="images w-100 text-center">
                                            <img src="@/img/icons/keybroad-eletronic-device-computer.png" alt="why-us"
                                                width="100">
                                        </div>
                                        <div class="item-title mt-3 text-center">
                                            <strong>Web Development</strong>

                                        </div>
                                        <div class="item-desc mt-2">
                                            <p class="text-justify">
                                                Evaluate your digital pressence. We specialize in crafting bespoke web
                                                solutions
                                            </p>
                                        </div>
                                        <div class="button-more">
                                            <a href="#" class="btn btn-soft-ash rounded-pill text-primary">
                                                MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- /.container -->
    </section>
    <!-- /.container -->
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
