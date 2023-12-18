<template>
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-14 pb-14 pb-md-16 text-center">
            <div class="row gx-lg-8 gx-xl-12 gy-10 gy-xl-0 mb-14 align-items-center">
                <div class="col-lg-7 order-lg-2">
                    <figure><img class="img-auto" src="@/img/illustrations/i28.png"
                            srcset="@/img/illustrations/i28@2x.png 2x" alt="" /></figure>
                </div>
                <!-- /column -->
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start">
                    <h1 class="display-1 fs-54 mb-5 mx-md-n5 mx-lg-0 mt-7">Create your brand <br class="d-md-none"><span
                            class="rotator-fade text-primary">Awarness, Valued, Remembered, Honored, Recognized,
                            Noticed</span></h1>
                    <p class="lead fs-lg mb-7">Out with the old, in with the new, in few simple step.</p>
                    <span><a class="btn btn-lg btn-primary rounded-pill me-2">Get Started</a></span>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <section class="wrapper image-wrapper bg-auto no-overlay bg-image text-center bg-map"
        data-image-src="./assets/img/map.png">
        <div class="container py-0 py-md-18">
            <div class="row">
                <div class="col-lg-6 col-xl-5 mx-auto">
                    <h1 class="display-4 mb-3 text-center">Get More Sales Now</h1>
                    <p class="lead mb-5 px-md-16 px-lg-3">Home is behind, the world ahead and there are many
                        paths to tread through. Time is now. Time is you.</p>
                    <a href="#" class="btn btn-primary rounded-pill">Get Started</a>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
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
    mounted() {
        console.log(this.count) // 0
        theme.init()
    }

}

</script>
