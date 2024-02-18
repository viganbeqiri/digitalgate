<template>
    <section class="wrapper bg-light mt-20">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <h2 class="display-4 mb-3 text-center">Request for Quotation</h2>
            <form @submit.prevent="submit" method="post" novalidate="">
                <input type="hidden" name="_token" :value="this.$page.props.csrf_token">
                <div class="messages"></div>
                <div class="row gx-4">
                    <div class="col-md-6">
                        <!-- label -->
                        <div class="form-select-wrapper mb-4"><select class="form-select" id="form-select"
                                v-model="submitQuotation.service_name" name="service_name" required="">
                                <option disabled="" value="" selected>Request for Quotation</option>
                                <option v-for="service in services" :key="services" :value="service.title">{{ service.title
                                }}
                                </option>
                            </select>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please select a service. </div>
                        </div>
                    </div><!-- /column -->
                    <div class="col-md-6">
                        <div class="form-floating mb-4"><input id="company_name" type="text" name="company_name"
                                v-model="submitQuotation.company_name" class="form-control" placeholder="Jane"
                                required=""><label for="company_name">Company Name
                                *</label>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please enter your company name. </div>
                        </div>
                    </div><!-- /column -->
                    <div class="col-md-6">
                        <div class="form-floating mb-4"><input id="requester_name" type="text" name="requester_name"
                                v-model="submitQuotation.requester_name" class="form-control" placeholder="Doe"
                                required=""><label for="requester_name">Requester
                                Name
                                *</label>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please enter your name. </div>
                        </div>
                    </div><!-- /column -->
                    <div class="col-md-6">
                        <div class="form-floating mb-4"><input id="form_email" type="email" name="email"
                                v-model="submitQuotation.email" class="form-control" placeholder="jane.doe@example.com"
                                required=""><label for="form_email">Email *</label>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please provide a valid email address. </div>
                        </div>
                    </div><!-- /column -->

                    <div class="col-md-6">
                        <div class="form-floating mb-4"><input id="phone" type="test" name="phone" class="form-control"
                                v-model="submitQuotation.phone" placeholder="+1 (123) 456-7890" required=""><label
                                for="form_email">Phone *</label>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please provide a valid phone. </div>
                        </div>
                    </div><!-- /column -->


                    <div class="col-12">
                        <div class="form-floating mb-4"><textarea id="form_message" name="message" class="form-control"
                                v-model="submitQuotation.message" placeholder="Your message" required=""
                                style="height: 150px;"></textarea><label for="form_message">Message *</label>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please enter your messsage. </div>
                        </div>
                    </div><!-- /column -->
                    <div class="col-12 text-center"><input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                            value="Send">
                        <p class="text-muted"><strong>*</strong> These fields are required.</p>
                    </div><!-- /column -->
                </div><!-- /.row -->
            </form><!-- /form -->
        </div>
    </section>
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { usePage, Head, Link, router, useForm } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify';

export default {
    name: "Outsourcing",
    layout: FrontLayout,
    components: {
        Link
    },
    props: {
        services: Object
    },
    setup() {
        const submitQuotation = useForm({
            service_name: '',
            company_name: '',
            requester_name: '',
            email: '',
            phone: '',
            message: '',
            _token: usePage().props.csrf
        });
        return {
            submitQuotation
        }
    },

    mounted() {
        theme.init()

    },

    methods: {
        submit() {
            console.log(this.submitQuotation)
            this.submitQuotation.post(route('outsourcing.quote'), {
                onSuccess: () => {
                    this.submitQuotation.reset();
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
