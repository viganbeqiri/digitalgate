<template>
    <div class="container pt-10">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="pricing card text-center ">
                    <div class="card-body mx-1 mr-1">
                        <div class="prices text-dark text-start">
                            <div class="price price-show">
                                <span class="fs-18 text-primary">Cohort</span>
                            </div>
                        </div>
                        <div class="guidelines text-start mt-2">
                            <label>Guidelines</label><br>
                            <a href="#" class="text-primary">Team guide recomendation</a>
                        </div>
                        <div class="attachment text-start mt-2">
                            <label>Attachment</label><br>
                            <a href="#" class="text-primary">team profile.pptx</a>
                            <a href="#" class="text-primary">org-chart and shareholder status.pdf</a>
                        </div>
                    </div><!--/.card-body -->
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-12 mb-5">
                <form @submit.prevent="storeCohort">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-floating">
                                    <input id="full_name" name="full_name" v-model="submitCohort.founder_name" type="text"
                                        class="form-control" placeholder="Full name"><label for="founder_name">Founder
                                        Name</label>
                                    <div v-if="errors.founder_name" class="alert alert-danger">
                                        {{ errors.founder_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-select-wrapper mb-4">
                                    <div class="form-floating">
                                        <div class="form-group">
                                            <input type="file" name="file" id="founder_resume" class="input-file"
                                                @change="handleFileChange('founder_resume', $event)" ref="founder_resume">
                                            <label for="founder_resume" class="btn js-labelFile w-100"
                                                :class="!file_selected.founder_resume ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                <span class="js-fileName mx-2">Founder Resume / Portofolio</span>
                                                <vue-feather v-if="!file_selected.founder_resume"
                                                    type="upload-cloud"></vue-feather>
                                                <vue-feather v-if="file_selected.founder_resume" type="check"></vue-feather>
                                            </label>
                                            <div v-if="errors.founder_resume" class="alert alert-danger">
                                                {{ errors.founder_resume }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-floating">
                                    <input id="full_name" name="full_name" v-model="submitCohort.co_founder_name"
                                        type="text" class="form-control" placeholder="Full name"><label
                                        for="founder_name">Co-Founder
                                        Name</label>
                                    <div v-if="errors.co_founder_name" class="alert alert-danger">
                                        {{ errors.co_founder_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-select-wrapper mb-4">
                                    <div class="form-floating">
                                        <div class="form-group">
                                            <input type="file" name="file" id="co_founder_resume" class="input-file"
                                                @change="handleFileChange('co_founder_resume', $event)"
                                                ref="co_founder_resume">
                                            <label for="co_founder_resume" class="btn js-labelFile w-100"
                                                :class="!file_selected.co_founder_resume ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                <span class="js-fileName mx-2">Co-Founder Resume / Portofolio</span>
                                                <vue-feather v-if="!file_selected.co_founder_resume"
                                                    type="upload-cloud"></vue-feather>
                                                <vue-feather v-if="file_selected.co_founder_resume"
                                                    type="check"></vue-feather>
                                            </label>
                                            <div v-if="errors.co_founder_resume" class="alert alert-danger">
                                                {{ errors.co_founder_resume }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-floating">
                                    <input id="idea_age" name="idea_age" v-model="submitCohort.idea_age" type="text"
                                        class="form-control" placeholder="Full name"><label for="idea_age">How long have you
                                        been working on this idea</label>
                                    <div v-if="errors.idea_age" class="alert alert-danger">
                                        {{ errors.idea_age }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-floating">
                                    <input id="done_analysis" name="done_analysis" v-model="submitCohort.done_analysis"
                                        type="text" class="form-control" placeholder="Full name"><label
                                        for="done_analysis">Have
                                        you done market analysis</label>
                                    <div v-if="errors.done_analysis" class="alert alert-danger">
                                        {{ errors.done_analysis }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-select-wrapper mb-4">
                                    <div class="form-floating">
                                        <div class="form-group">
                                            <input type="file" name="file" id="market_analysis_file" class="input-file"
                                                @change="handleFileChange('market_analysis_file', $event)"
                                                ref="market_analysis_file">
                                            <label for="market_analysis_file" class="btn js-labelFile w-100"
                                                :class="!file_selected.market_analysis_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                <span class="js-fileName mx-2">Upload Market Analysis</span>
                                                <vue-feather v-if="!file_selected.market_analysis_file"
                                                    type="upload-cloud"></vue-feather>
                                                <vue-feather v-if="file_selected.market_analysis_file"
                                                    type="check"></vue-feather>
                                            </label>
                                            <div v-if="errors.market_analysis_file" class="alert alert-danger">
                                                {{ errors.market_analysis_file }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-floating">
                                    <input id="market_strategy" name="market_strategy"
                                        v-model="submitCohort.market_strategy" type="text" class="form-control"
                                        placeholder="Full name"><label for="market_strategy">Do you have Go-To-Market
                                        strategy? if yes how long do will you need</label>
                                    <div v-if="errors.market_strategy" class="alert alert-danger">
                                        {{ errors.market_strategy }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-floating">
                                    <input id="exit_strategy" name="exit_strategy" v-model="submitCohort.exit_strategy"
                                        type="text" class="form-control" placeholder="Full name"><label
                                        for="exit_strategy">Whats your exit strategy</label>
                                    <div v-if="errors.exit_strategy" class="alert alert-danger">
                                        {{ errors.exit_strategy }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-floating">
                                    <input id="org_chart_stage_holder_status" name="org_chart_stage_holder_status"
                                        v-model="submitCohort.org_chart_stage_holder_status" type="text"
                                        class="form-control" placeholder="Org-chart and shareholder status">
                                    <label for="org_chart_stage_holder_status">Org-chart and shareholder status</label>
                                    <div v-if="errors.org_chart_stage_holder_status" class="alert alert-danger">
                                        {{ errors.org_chart_stage_holder_status }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-select-wrapper mb-4">
                                    <div class="form-floating">
                                        <div class="form-group">
                                            <input type="file" name="file" id="org_chart_file" class="input-file"
                                                @change="handleFileChange('org_chart_file', $event)" ref="org_chart_file">
                                            <label for="org_chart_file" class="btn js-labelFile w-100"
                                                :class="!file_selected.org_chart_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                <span class="js-fileName mx-2">Upload Market Analysis</span>
                                                <vue-feather v-if="!file_selected.org_chart_file"
                                                    type="upload-cloud"></vue-feather>
                                                <vue-feather v-if="file_selected.org_chart_file" type="check"></vue-feather>
                                            </label>
                                            <div v-if="errors.org_chart_file" class="alert alert-danger">
                                                {{ errors.org_chart_file }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Go to incubation</button>
                </form>
            </div>


        </div>
    </div>
</template>
<script>
import FrontLayout from '../../Shares/FrontLayout.vue';
import { Link, router, usePage, useForm } from "@inertiajs/vue3";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    name: "Cohort",
    layout: FrontLayout,
    props: {
        errors: Object,
        order: Object,
        order_items: Object
    },
    data() {
        return {
            file_selected: {
                founder_resume: false,
                co_founder_resume: false,
                market_analysis_file: false,
                org_chart_file: false,
            },
            active_order: null,
        }
    },
    setup() {
        const submitCohort = useForm({
            founder_name: '',
            co_founder_name: '',
            founder_resume: '',
            co_founder_resume: '',
            idea_age: '',
            done_analysis: '',
            market_analysis_file: '',
            market_strategy: '',
            exit_strategy: '',
            org_chart_stage_holder_status: '',
            org_chart_file: '',
        });
        return {
            submitCohort
        }
    },
    methods: {
        storeCohort() {
            const formData = new FormData();
            formData.append('founder_name', this.submitCohort.founder_name);
            formData.append('co_founder_name', this.submitCohort.co_founder_name);
            formData.append('founder_resume', this.submitCohort.founder_resume);
            formData.append('co_founder_resume', this.submitCohort.co_founder_resume);
            formData.append('idea_age', this.submitCohort.idea_age);
            formData.append('done_analysis', this.submitCohort.done_analysis);
            formData.append('market_analysis_file', this.submitCohort.market_analysis_file);
            formData.append('market_strategy', this.submitCohort.market_strategy);
            formData.append('exit_strategy', this.submitCohort.exit_strategy);
            formData.append('org_chart_stage_holder_status', this.submitCohort.org_chart_stage_holder_status);
            formData.append('org_chart_file', this.submitCohort.org_chart_file);
            router.post('/order/cohort', formData, {
                onSuccess: () => {
                    console.log(this.$page.props)
                    // return false;
                    const order = this.$page.props.flash.order
                    const active_order = order.active
                    const order_items = order.items
                    this.saveCartToLocalStorage(active_order, 'active_order')
                    this.saveCartToLocalStorage(order_items, 'order_items')

                    // return false;
                    toast(this.$page.props.flash.messages);

                    router.visit('/incubator/incubation')
                }
            })
            console.log(this.errors)
        },
        handleFileChange(name) {
            console.log(name)
            // console.log(event.target.files[0])
            const fileInput = this.$refs[name];
            this.submitCohort[name] = fileInput.files[0];

            this.file_selected[name] = true
        },
        saveCartToLocalStorage(object, key) {
            if (localStorage.getItem(key)) {
                localStorage.removeItem(key);
            }
            localStorage.setItem(key, JSON.stringify(object));
        },
    }
}
</script>
