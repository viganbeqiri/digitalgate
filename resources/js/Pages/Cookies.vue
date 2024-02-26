<template>
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white"
        data-image-src="./assets/img/photos/bg3.jpg">
        <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">Cookie policy
                    </h1>
                    <nav class="d-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb text-white">
                            <li class="breadcrumb-item">
                                <Link :href="route('home')">Home</Link>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cookie policy</li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <section id="snippet-1" class="wrapper pt-16">
        <div class="container">

            <div class="card">
                <div class="card-body mb-n2">
                    <div class="fusion-text fusion-text-1">
                        <p><strong>What are cookies?</strong></p>
                        <p>Cookies are small text files placed on your computer or mobile phone by the websites you visit.
                            These text files can be read by the web pages you visit and help identify you when you open the
                            web page again. These text files can be “permanent” or “temporary”. Permanent cookies remain on
                            your computer even when you turn off the browser (go offline), while temporary cookies are
                            deleted as soon as you close the internet browser. Cookies are used for several purposes, such
                            as to remember your activities and preferences (inclusions, language preferences, font size or
                            how the page is displayed to you), to provide personalized/customized content on the website and
                            to display the navigation history of the same.</p>
                        <p><strong>Why do we use cookies?</strong></p>
                        <p>We use cookies on this website for the following reasons:</p>
                        <ul>
                            <li>For technical functioning of the website;</li>
                            <li>For the collection of aggregate and anonymous statistical data;</li>
                            <li>To remember your preferences for how the page is displayed (display settings preferences),
                                such as color contrast or font size;</li>
                            <li>To remember, whether you agree (or not) with our use of cookies on this website.</li>
                        </ul>
                        <p>When you visit our website, we may collect some data from your search, such as your IP address,
                            which content of the AZLP website you visited, when you visited it, and from which website you
                            were redirected.</p>
                        <p>When you visit our website, we use the third-party service Google Analytics to collect standard
                            information about access and details about visitor behavior, but in a way that does not allow
                            anyone to be identified, nor is it possible for Google to reveal the identity of those who
                            visited it. our website.</p>
                        <p><strong>What kind of cookies do we use?</strong></p>
                        <p>We use persistent cookies, which remember the search/session when the user closes the browser, in
                            order to maintain the user’s state.</p>
                        <p><strong>Can you delete or control cookies?</strong></p>
                        <p>Information related to cookies is not used for your personal identification. Accepting these
                            cookies is not necessary for the website to work, but they would provide you with a better
                            browsing experience. If you want these cookies you can delete or block them, but if you do so
                            some features of this website may not work properly.</p>
                        <p>You can delete all the cookies that are already on your computer and you can set most of the
                            browsers to prevent them. If you do this, you may need to manually adjust your preferences each
                            time you visit a website, and some services and functionality may not work.</p>
                    </div>
                    <!--/.accordion -->
                </div>
                <!--/.card-body -->


                <!--/.card-footer -->
            </div>
        </div>

        <!--/.card -->
    </section>
</template>

<script>
import { Link, router } from '@inertiajs/vue3';
import FrontLayout from '../Shares/FrontLayout.vue';
export default {
    layout: FrontLayout,
    mounted() {
        theme.init();
    },
    components: { Link }
}
</script>
