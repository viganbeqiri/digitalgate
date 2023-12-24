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
                        <h3 class="display-4 text-primary px-lg-10">Login</h3>
                        <h2 class="fs-15 text-muted mb-3">Welcome Home</h2>
                    </div>
                    <!--/column -->
                </div>

                <form @submit.prevent="storeLogin">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-5">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div v-if="errors.message" class="alert alert-danger">
                                        {{ errors.message }}
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input id="email" name="email" type="text" class="form-control"
                                            placeholder="Your Email" v-model="loginForm.email">
                                        <label for="email">Your Email</label>
                                        <div v-if="errors.email" class="alert alert-danger">
                                            {{ errors.email }}
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input id="password" name="password" type="password" class="form-control"
                                            placeholder="Password" v-model="loginForm.password">
                                        <label for="password">Password</label>
                                        <div v-if="errors.password" class="alert alert-danger">
                                            {{ errors.password }}
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <a href="/sign-in" class="text-primary mx-3">Reset Password</a>
                                    </div>

                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.sign up -->

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
        loginForm: Object,
        auth: Object
    },
    setup() {
        const loginForm = reactive({
            email: '',
            password: '',
        });
        const storeLogin = () => {
            router.post('auth/login', {
                email: loginForm.email,
                password: loginForm.password,
            });
        }
        return {
            loginForm,
            storeLogin
        }
    },
    mounted() {
    }
}
</script>

<style scoped></style>
