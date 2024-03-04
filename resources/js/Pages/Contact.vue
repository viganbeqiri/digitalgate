<template>
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white"
        data-image-src="./assets/img/photos/bg3.jpg">
        <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">Get in Touch</h1>
                    <nav class="d-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb text-white">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
    <!-- /section -->
    <section class="wrapper bg-light angled upper-end">
        <div class="container pb-11">
            <div class="row mb-14 mb-md-16">
                <div class="col-xl-10 mx-auto mt-n19">
                    <div class="card">
                        <div class="row gx-0">
                            <div class="col-lg-6 align-self-stretch">
                                <div class="map map-full rounded-top rounded-lg-start">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2965.024116715737!2d20.957023076971506!3d41.99975797122866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDU5JzU5LjEiTiAyMMKwNTcnMzQuNiJF!5e0!3m2!1sen!2sid!4v1706976442005!5m2!1sen!2sid"
                                        style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                                </div>
                                <!-- /.map -->
                            </div>
                            <!--/column -->
                            <div class="col-lg-6">
                                <div class="p-10 p-md-11 p-lg-14">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                    class="uil uil-location-pin-alt"></i> </div>
                                        </div>
                                        <div class="align-self-start justify-content-start">
                                            <h5 class="mb-1">Address</h5>
                                            <address>Str Pollog 113/36 Б4/11, Tetovo <br class="d-none d-md-block" />North
                                                Macedonia,
                                                Macedonia</address>
                                        </div>
                                    </div>
                                    <!--/div -->
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                    class="uil uil-envelope"></i> </div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">E-mail</h5>
                                            <p class="mb-0"><span class="__cf_email__"
                                                    data-cfemail="463527282224293e06232b272f2a6825292b">info@digitalgate.mk</span>
                                            </p>

                                        </div>
                                    </div>
                                    <!--/div -->
                                </div>
                                <!--/div -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <h2 class="display-4 mb-3 text-center">Drop Us a Line</h2>
                    <p class="lead text-center mb-10">Reach out to us from our contact form and we will get back to you
                        shortly.</p>
                    <form @submit.prevent="submit" method="post" novalidate="">
                        <div class="messages"></div>

                        <div class="row gx-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_name" type="text" v-model="submitContact.first_name" name="name"
                                        class="form-control" placeholder="Jane" required>
                                    <label for="form_name">First Name *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your first name. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_lastname" type="text" v-model="submitContact.last_name" name="surname"
                                        class="form-control" placeholder="Doe" required>
                                    <label for="form_lastname">Last Name *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your last name. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" v-model="submitContact.email" name="email"
                                        class="form-control" placeholder="jane.doe@example.com" required>
                                    <label for="form_email">Email *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <!-- /column -->
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea id="form_message" name="message" class="form-control"
                                        placeholder="Your message" v-model="submitContact.message" style="height: 150px"
                                        required></textarea>
                                    <label for="form_message">Message *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your messsage. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                    value="Send message">
                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /form -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import FrontLayout from '../Shares/FrontLayout.vue';
import { toast } from 'vue3-toastify';

export default {
    layout: FrontLayout,
    setup() {
        const submitContact = useForm({
            first_name: '',
            last_name: '',
            email: '',
            message: '',
        })
        return { submitContact }
    },
    methods: {
        submit() {
            console.log(this.submitContact)
            this.submitContact.post(route('contact-us.send'), {
                onSuccess: () => {
                    this.submitContact.reset();
                    toast(this.$page.props.flash.messages);
                    console.log('success')
                },
                onError: () => {
                    console.log('error')
                }
            })
        }
    }
}
</script>
