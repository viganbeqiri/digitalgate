<template>
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-light-600 text-white"
        data-image-src="@/img/photos/bg18.png">
        <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h1 class="display-1 mb-3 text-primary">Sign Up</h1>
                    <span class="text-secondary">In with the new</span>
                    <!-- /nav -->
                </div>
                <!-- /column -->
                <div class="col-lg-6 mx-auto">
                    <h1 class="display-1 mb-3 text-primary">Sign In</h1>
                    <span class="text-secondary">Welcome home</span>
                    <!-- /nav -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row vertical-divider">
                <div class="col-lg-6 col-xl-6 col-xxl-5 mx-auto mt-n20">
                    <div class="card">
                        <div class="card-body p-11 text-center">
                            <form class="text-start mb-3" @submit.prevent="storeRegister">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" placeholder="First Name"
                                                v-model="registerForm.first_name" id="first_name">
                                            <label for="first_name">First Name</label>
                                            <div v-if="errors.first_name" class="alert alert-danger">
                                                {{ errors.first_name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" placeholder="Last Name" id="last_name"
                                                v-model="registerForm.last_name">
                                            <label for="last_name">Last Name</label>
                                            <div v-if="errors.last_name" class="alert alert-danger">
                                                {{ errors.last_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="signupEmail"
                                        v-model="registerForm.email">
                                    <label for="signupEmail">Email</label>
                                    <div v-if="errors.email" class="alert alert-danger">
                                        {{ errors.email }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating password-field mb-4">
                                            <input type="password" class="form-control" placeholder="Password"
                                                id="signupPassword" v-model="registerForm.password">
                                            <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                            <label for="signupPassword">Password</label>
                                            <div v-if="errors.password" class="alert alert-danger">
                                                {{ errors.password }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating password-field mb-4">
                                            <input type="password" class="form-control" placeholder="Repeat Password"
                                                id="sinupPasswordRepeat" v-model="registerForm.password_confirmation">
                                            <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                            <label for="sinupPasswordRepeat">Repeat Password</label>
                                            <div v-if="errors.password_confirmation" class="alert alert-danger">
                                                {{ errors.password_confirmation }}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2">Get
                                    Started</button>
                            </form>
                            <!-- /form -->
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>

                <div class="col-lg-6 col-xl-6 col-xxl-5 mx-auto mt-n20">
                    <div class="card">
                        <div class="card-body p-11 text-center">
                            <form class="text-start mb-3">
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Password" id="loginPassword">
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="loginPassword">Password</label>
                                </div>
                                <a class="btn btn-primary rounded-pill  w-50 mb-2">Get
                                    Started</a>
                                <a class="w-50 mb-2 ml-2" style="margin-left: 10px;">Reset password</a>
                            </form>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
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
import { ref, onMounted, reactive } from 'vue'

import { router } from '@inertiajs/vue3'

export default {
    layout: FrontLayout,
    inheritAttrs: false,
    props: {
        errors: Object,
        registerForm: Object
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

            });



        }
        return {
            registerForm,
            storeRegister
        }
    },

}

</script>

<style></style>
