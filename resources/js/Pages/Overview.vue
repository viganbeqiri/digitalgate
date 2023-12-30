<template>
    <section class="wrapper bg-gradient-primary">
        <div class="container-fluid  pb-8 text-center">
            <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center" data-cues="fadeIn" data-interval="-200">
                <div class="col-md-10 offset-md-1 offset-lg-1 col-lg-5 text-center text-lg-start">
                    <h2 class="display-3 mb-5 mx-md-n5 mx-lg-0 text-uppercase" style="color: var(--bs-primary);">Create Your
                        brand
                    </h2>

                    <h1 class="display-4 mb-5 mx-md-n5 mx-lg-0 text-uppercase"
                        style="font-size: 80px;color: var(--bs-primary)">Awarness
                    </h1>


                    <p class="lead fs-lg mb-7">Out with the old, in with the new, in few simple step.</p>
                    <span><a class="btn btn-primary me-2">Get Started</a></span>
                    <span><a class="btn btn-outline-primary me-2">Try now</a></span>
                </div>
                <div class="col-lg-6">
                    <figure><img class="w-auto" data-cue="fadeIn" src="@/img/illustrations/b1.png"
                            srcset="@/img/illustrations/b1@2x.png 2x" alt="" /></figure>
                </div>
                <!-- /column -->

                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { ref, onMounted } from 'vue'


export default {
    layout: FrontLayout,
    props: {
        auth: Object,
    },
    setup() {
        const count = ref(0)
        return {
            count
        }
    },
    mounted() {
        theme.init()

    }

}

</script>
