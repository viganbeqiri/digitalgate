<template>
    <section class="wrapper bg-light">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center pb-3">
                <div>
                    <a href="">
                        <img src="@/img/back.png" alt="back" />
                    </a>
                </div>
                <div>
                    <div>
                        <img src="@/img/background/desktop-app-development.png" style="height: 100%;width: 100%; object-fit: none" class="img-fluid" alt="desktop-app" />
                    </div>
                </div>
                <div>
                    <a href="">
                        <img src="@/img/next.png" alt="next" />
                    </a>
                </div>
            </div>

            <div class="d-flex flex-sm-column flex-lg-row justify-content-between py-5 my-5">
                <div class="card text-center w-25 mx-2">
                    <div class="card-body">
                        <img src="@/img/icons/icon-1.png" alt="" height="60px"/>
                        <p class="text-primary fs-18 fw-medium pt-3">Enhance Performance and Reliability</p>
                        <p class="fs-14">
                            Experience superior performance with our desktop app development. Design for stability and speed,
                            our apps ensure your business operation run smoothly, with our without internet connectivity.
                        </p>
                    </div>
                </div>
                <div class="card text-center w-25 mx-2">
                    <div class="card-body">
                        <img src="@/img/icons/icon-2.png" alt="" height="60px"/>
                        <p class="text-primary fs-18 fw-medium pt-3">Offline Accessibility</p>
                        <p class="fs-14">
                            Experience superior performance with our desktop app development. Design for stability and speed,
                            our apps ensure your business operation run smoothly, with our without internet connectivity.
                        </p>
                    </div>
                </div>
                <div class="card text-center w-25 mx-2">
                    <div class="card-body">
                        <img src="@/img/icons/icon-2.png" alt="" height="60px"/>
                        <p class="text-primary fs-18 fw-medium pt-3">Robust Security</p>
                        <p class="fs-14">
                            Experience superior performance with our desktop app development. Design for stability and speed,
                            our apps ensure your business operation run smoothly, with our without internet connectivity.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto text-center">
                    <h3 class="display-4 text-primary">Desktop App Development</h3>
                    <h2 class="fs-15 text-muted mb-3">Desktop App Development Pricing schedule</h2>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="pricing-wrapper position-relative pb-lg-5 pb-sm-3">
                <div class="row gy-6 mt-3 mt-md-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="pricing card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Basic Plan</h4>
                                <div class="prices text-dark">
                                    <div class="price price-show"><span class="fs-28 text-primary">MKD 5900</span></div>

                                </div>
                                <div class="row">
                                    <span class="text-muted">Starter Website Package</span>
                                </div>
                                <!--/.prices -->
                                <div class="text-primary py-5">
                                    <p class="mb-0">Wordpress installation</p>
                                    <p class="mb-0">10GB Bandwidth</p>
                                    <p class="mb-0">1 Domain, 1 Email *</p>
                                </div>
                                <a href="#" class="btn btn-outline-primary rounded-pill">
                                    <span class="px-3">Order</span>
                                </a>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.pricing -->
                    </div>
                    <!--/column -->

                    <div class="col-md-6 col-lg-4">
                        <div class="pricing card text-center border border-3 border-primary shadow shadow-lg">
                            <div class="card-body">
                                <h4 class="card-title">Basic Plan</h4>
                                <div class="prices text-dark">
                                    <div class="price price-show"><span class="fs-28 text-primary">MKD 5900</span></div>

                                </div>
                                <div class="row">
                                    <span class="text-muted">Starter Website Package</span>
                                </div>
                                <!--/.prices -->
                                <div class="text-primary py-5">
                                    <p class="mb-0">Wordpress installation</p>
                                    <p class="mb-0">10GB Bandwidth</p>
                                    <p class="mb-0">1 Domain, 1 Email *</p>
                                </div>
                                <a href="#" class="btn btn-primary rounded-pill">
                                    <span class="px-3">Order</span>
                                </a>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.pricing -->
                    </div>
                    <!--/column -->

                    <div class="col-md-6 col-lg-4">
                        <div class="pricing card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Basic Plan</h4>
                                <div class="prices text-dark">
                                    <div class="price price-show"><span class="fs-28 text-primary">MKD 5900</span></div>

                                </div>
                                <div class="row">
                                    <span class="text-muted">Starter Website Package</span>
                                </div>
                                <!--/.prices -->
                                <div class="text-primary py-5">
                                    <p class="mb-0">Wordpress installation</p>
                                    <p class="mb-0">10GB Bandwidth</p>
                                    <p class="mb-0">1 Domain, 1 Email *</p>
                                </div>
                                <a href="#" class="btn btn-outline-primary rounded-pill">
                                    <span class="px-3">Order</span>
                                </a>
                            </div>
                            <!--/.card-body -->
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
import { ref, onMounted } from 'vue'


export default {
    layout: FrontLayout,
    setup() {
        const count = ref(0)
        return {
            count
        }
    },

}

</script>
