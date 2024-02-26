<template>
    <footer class="border-top border-secondary">
        <div class="container py-lg-10 py-md-6">
            <!--/div -->

            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <img class="mb-4" style="height: 1rem" src="@/img/digital-gate-logo.png"
                            srcset="@/img/digital-gate-logo.png 2x" alt="" />
                        <p class="mb-4 fs-16">Copyright ©<br class="d-none d-lg-block" />DigitalGate Macedonia</p>
                        <p>Str Pollog 113/36 Б4/11 </p>
                        <p><a href="mail:to:info@digitalgate.mk" class="link-body">info@digitalgate.mk</a></p>
                        <nav class="nav social social-muted">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-3 col-lg-2 text-color-primary">
                    <div class="widget">
                        <h4 class="widget-title text-ash mb-3">Product</h4>
                        <ul class="list-unstyled  mb-0">
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Personal License</a></li>
                            <li><a href="#">Business License</a></li>
                            <li><a href="#">Pricing Options</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-3 col-lg-2 text-color-primary">
                    <div class="widget">
                        <h4 class="widget-title text-ash mb-3">Company</h4>
                        <ul class="list-unstyled  mb-0">
                            <li>
                                <Link :href="route('about-us')">About</Link>
                            </li>
                            <li>
                                <Link :href="route('team')">Team</Link>
                            </li>
                            <li><a :href="route('gdrp')">GDRP</a></li>
                            <li>
                                <Link :href="route('contact-us')">Contact</Link>

                            </li>

                            <li>
                                <Link :href="route('privacy')">Privacy Policy</Link>
                            </li>
                            <li>
                                <Link :href="route('cookies')">Cookies Policy</Link>

                            </li>

                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-3 col-lg-2 text-color-primary">
                    <div class="widget">
                        <h4 class="widget-title text-ash mb-3">Support</h4>
                        <ul class="list-unstyled  mb-0">
                            <li><a href="#">Support Center</a></li>
                            <li><a href="#">Help Desk</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->

                <div class="col-md-4 col-lg-3">
                    <img src="@/img/background/world.png" alt="" />
                </div>
                <!-- /column -->

            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </footer>
</template>
<script>
import { Link, usePage } from '@inertiajs/vue3'

export default {
    components: {
        Link
    }
}
</script>

<style>
footer {
    color: var(--bs-primary);
}
</style>
