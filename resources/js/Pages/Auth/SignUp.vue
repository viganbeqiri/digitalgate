<template>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <!--/.row -->
            <div class="pricing-wrapper position-relative">
                <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1" style="top: 2rem; right: -2.4rem;"></div>
                <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1" style="bottom: 0.5rem; left: -2.5rem;"></div>

                <div class="row mb-3">
                    <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto text-center">
                        <h3 class="display-4 text-primary px-lg-10">Sign Up</h3>
                        <h2 class="fs-15 text-muted mb-3">In with the new</h2>
                    </div>
                    <!--/column -->
                </div>

                <form>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First Name">
                                                <label for="first_name">First Name</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name">
                                                <label for="last_name">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input id="email" name="email" type="text" class="form-control" placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                                    <label for="password">First Name</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <input id="password_confirm" name="password_confirm" type="text" class="form-control" placeholder="Repeat Password">
                                                    <label for="password_confirm">Repeat Password</label>
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

    export default {
        layout: frontLayout
    }
</script>

<style scoped>

</style>
