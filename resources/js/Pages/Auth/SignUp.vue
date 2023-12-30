<template>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <!--/.row -->
            <div class="pricing-wrapper position-relative">
                <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1" style="top: 2rem; right: -2.4rem;">
                </div>
                <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1"
                    style="bottom: 0.5rem; left: -2.5rem;"></div>

                <div class="row mb-3">
                    <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto text-center">
                        <h3 class="display-4 text-primary px-lg-10">Sign Up</h3>
                        <h2 class="fs-15 text-muted mb-3">In with the new</h2>
                    </div>
                    <!--/column -->
                </div>

                <form @submit.prevent="storeRegister">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="first_name" name="first_name" type="text" class="form-control"
                                                    placeholder="First Name" v-model="registerForm.first_name">
                                                <label for="first_name">First Name</label>
                                                <div v-if="errors.first_name" class="alert alert-danger">
                                                    {{ errors.first_name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="last_name" name="last_name" type="text" class="form-control"
                                                    placeholder="Last Name" v-model="registerForm.last_name">
                                                <label for="last_name">Last Name</label>
                                                <div v-if="errors.last_name" class="alert alert-danger">
                                                    {{ errors.last_name }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="email" name="email" type="text" class="form-control"
                                                    placeholder="Your Email" v-model="registerForm.email">
                                                <label for="email">Your Email</label>
                                                <div v-if="errors.email" class="alert alert-danger">
                                                    {{ errors.email }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="password" name="password" type="password" class="form-control"
                                                    placeholder="Password" v-model="registerForm.password">
                                                <label for="password">Password</label>
                                                <div v-if="errors.password" class="alert alert-danger">
                                                    {{ errors.password }}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="password_confirm" name="password_confirm" type="password"
                                                    class="form-control" placeholder="Repeat Password"
                                                    v-model="registerForm.password_confirmation">
                                                <label for="password_confirm">Repeat Password</label>
                                                <div v-if="errors.password_confirmation" class="alert alert-danger">
                                                    {{ errors.password_confirmation }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.sign up -->

                            <div class="pt-4 text-center">
                                <button type="submit" class="btn btn-primary">Get Started</button>
                            </div>
                            <p class="py-2 text-center">
                                Already hava account?<a href="/sign-in" class="text-primary"> Sign In</a>
                            </p>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </form>
            </div>
            <!--/.pricing-wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</template>

<script>
import frontLayout from "../../Shares/FrontLayout.vue";
import { ref, onMounted, reactive } from 'vue'

import { router } from '@inertiajs/vue3'

export default {
    layout: frontLayout,
    inheritAttrs: false,
    props: {
        errors: Object,
        registerForm: Object,
        auth: Object
    },
    setup() {
        const registerForm = reactive({
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirmation: ''
        });
        const storeRegister = () => {

            router.post('auth/register', {
                first_name: registerForm.first_name,
                last_name: registerForm.last_name,
                email: registerForm.email,
                password: registerForm.password,
                password_confirmation: registerForm.password_confirmation

            }, {
                onError: errors => {
                    console.log(errors)
                }
            });


        }
        return {
            registerForm,
            storeRegister
        }
    },
    mounted() {
        if (this.auth.user) {
            router.get('/');
        }
    }
}
</script>

<style scoped></style>
