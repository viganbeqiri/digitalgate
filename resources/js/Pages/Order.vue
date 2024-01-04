<template>
    <div class="container-fluid d-flex justify-content-center pt-10">

        <div id="form-total" role="application" class="wizard clearfix">
            <div class="steps clearfix">
                <ul class="nav nav-tabs nav-pills d-flex justify-content-center">
                    <li class="nav-item m-3" v-for="order_step in order_step">
                        <a class="nav-link active " :class="order_step.completed ? 'border border-primary' : ''"
                            data-bs-toggle="tab" :href="'#tab1-' + order_step.step">
                            <div class="d-flex justify-content-start align-items-center">
                                <i class="uil uil-phone-volume pe-3"></i>
                                <div class="">
                                    <span class="text-muted"
                                        :class="current_step === order_step.step ? 'text-primary' : ''">{{
                                            order_step.name
                                        }}</span>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">{{ order_step.step_name }}</span>
                                        <span class="small text-primary" v-if="order_step.completed">[Completed]</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content clearfix pt-10">
                <div class="wizard-tab-content">
                    <div class="tab-content">
                        <div class="tab-pane fade " :class="current_step === 1 ? 'show active' : ''" id="tab1-1">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="pricing card text-center ">
                                        <div class="card-body mx-1 mr-1">
                                            <div class="prices text-dark text-start">
                                                <div class="price price-show">
                                                    <span class="fs-18 text-primary">Non Discourse Aggrement</span>
                                                </div>
                                            </div>
                                            <div class="guidelines text-start mt-2">
                                                <label>Guidelines</label><br>
                                                <a href="#" class="text-primary">download template</a>
                                            </div>
                                            <div class="attachment text-start mt-2">
                                                <label>Attachment</label><br>
                                                <a href="#" class="text-primary">NDA template</a>
                                            </div>
                                        </div><!--/.card-body -->
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-12 mb-5">
                                    <form @submit.prevent="storeNDA">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input id="full_name" name="full_name"
                                                            v-model="submitNDAForm.full_name" type="text"
                                                            class="form-control" placeholder="Full name"><label
                                                            for="first_name">Full Name</label>
                                                        <div v-if="errors.full_name" class="alert alert-danger">
                                                            {{ errors.full_name }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <div class="form-select-wrapper mb-4">
                                                        <select class="form-select" aria-label="Default select example"
                                                            v-model="submitNDAForm.request_type">
                                                            <option value="" selected disabled>Request type</option>
                                                            <option value="1">Web Development</option>
                                                            <option value="2">Cross Platform App</option>
                                                            <option value="3">Mobile Development</option>
                                                        </select>
                                                        <div v-if="errors.request_type" class="alert alert-danger">
                                                            {{ errors.request_type }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <div class="form-select-wrapper mb-4">
                                                        <select class="form-select" aria-label="Default select example"
                                                            v-model="submitNDAForm.has_business_license">
                                                            <option value="" disabled selected>Do you have business license?
                                                            </option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        <div v-if="errors.has_business_license" class="alert alert-danger">
                                                            {{ errors.has_business_license }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-select-wrapper mb-4">
                                                        <div class="form-floating">
                                                            <div class="form-group">
                                                                <input type="file" name="file" id="nda_file"
                                                                    class="input-file"
                                                                    @change="handleFileChange('nda_file', $event)"
                                                                    ref="nda_file">
                                                                <label for="nda_file" class="btn js-labelFile w-100"
                                                                    :class="!file_selected.nda_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                                    <span class="js-fileName mx-2">NDA FIle</span>
                                                                    <vue-feather v-if="!file_selected.nda_file"
                                                                        type="upload-cloud"></vue-feather>
                                                                    <vue-feather v-if="file_selected.nda_file"
                                                                        type="check"></vue-feather>
                                                                </label>
                                                                <div v-if="errors.nda_file" class="alert alert-danger">
                                                                    {{ errors.nda_file }}
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                </div>
                                                <div class="col" v-if="submitNDAForm.has_business_license === '1'">
                                                    <div class="form-floating">
                                                        <div class="form-group">
                                                            <input type="file" name="license_file" id="license_file"
                                                                class="input-file"
                                                                @change="handleFileChange('license_file', $event)"
                                                                ref="license_file">
                                                            <label for="license_file" class="btn js-labelFile w-100"
                                                                :class="!file_selected.license_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                                <span class="js-fileName mx-2">Business License</span>
                                                                <vue-feather v-if="!file_selected.license_file"
                                                                    type="upload-cloud"></vue-feather>
                                                                <vue-feather v-if="file_selected.license_file"
                                                                    type="check"></vue-feather>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div v-if="errors.license_file" class="alert alert-danger">
                                                        {{ errors.license_file }}
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit NDA</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.tab-pane -->
                        <div class="tab-pane fade" :class="current_step === 2 ? 'show active' : ''" id="tab1-2">
                            <div class="row container" v-if="active_order.order_type !== 'incubation'">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="col-12 pb-5" v-for="order_item in order_items">
                                        <div
                                            class="pricing card text-center border border border-3 border-primary shadow shadow-lg">
                                            <div class="card-header d-flex justify-content-start align-items-center"
                                                v-if="order_item.image">
                                                <img :src="order_item.image_url" alt="" height="24px" />
                                            </div>
                                            <div class="card-body mx-1 mr-1 pricing-body">
                                                <h4 class="card-title text-uppercase">{{ order_item.name }}</h4>
                                                <div class="prices text-dark">
                                                    <div class="price price-show"><span class="fs-28 text-primary"> {{
                                                        new
                                                            Intl.NumberFormat('en-US', {
                                                                style: 'currency',
                                                                currency: 'MKD',
                                                                maximumSignificantDigits: 3
                                                            }).format(order_item.price,)
                                                    }}
                                                            {{
                                                                order_item.pricing_scheme == '2' ? '/month' : ''
                                                            }}</span>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <span class="text-muted">{{ order_item.subtitle }}</span>
                                                </div>
                                                <!--/.prices -->
                                                <div class="text-primary py-5">
                                                    <p class="mb-0" v-for="additional_info in order_item.additional_info">-
                                                        {{
                                                            additional_info
                                                        }}
                                                    </p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-12">
                                    <form @submit.prevent="storeOrderDetail">
                                        <div class="card-body">
                                            <h3 class="text-primary fw-light">Business Detail</h3>
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input id="business_name" name="business_name"
                                                            v-model="submitOrderDetail.business_name" type="text"
                                                            class="form-control" placeholder="Business Name"><label
                                                            for="first_name">Business Name</label>
                                                        <div v-if="errors.business_name" class="alert alert-danger">
                                                            {{ errors.business_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-select-wrapper mb-4">
                                                        <select class="form-select" aria-label="Default select example"
                                                            v-model="submitOrderDetail.business_type">
                                                            <option value="" disabled>Type of Business</option>
                                                            <option value="1">Individual</option>
                                                            <option value="2">DOO</option>
                                                            <option value="3">DOEEL (LLC)</option>
                                                            <option value="4">SA</option>
                                                            <option value="5">NGO</option>
                                                        </select>
                                                        <div v-if="errors.business_type" class="alert alert-danger">
                                                            {{ errors.business_type }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input id="business_location" name="business_location"
                                                            v-model="submitOrderDetail.business_location" type="text"
                                                            class="form-control" placeholder="Business Location"><label
                                                            for="first_name">Business Location</label>
                                                        <div v-if="errors.business_location" class="alert alert-danger">
                                                            {{ errors.business_location }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input id="total_employees" name="total_employees"
                                                            v-model="submitOrderDetail.total_employees" type="text"
                                                            class="form-control" placeholder="Business Location"><label
                                                            for="first_name">Total Employees</label>
                                                        <div v-if="errors.total_employees" class="alert alert-danger">
                                                            {{ errors.total_employees }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input id="preferred_domain" name="preferred_domain"
                                                            v-model="submitOrderDetail.preferred_domain" type="text"
                                                            class="form-control" placeholder="Business Location"><label
                                                            for="first_name">{{ service_type === 'Development Service' ?
                                                                'Preferred Domain' : 'Website' }}</label>
                                                        <div v-if="errors.preferred_domain" class="alert alert-danger">
                                                            {{ errors.preferred_domain }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">

                                                    <div class=" form-floating" v-for="index in 5" :key="index">
                                                        <input id="emails" name="emails[]"
                                                            v-model="submitOrderDetail.emails[index]" type="text"
                                                            class="form-control" placeholder="Emails"><label
                                                            for="first_name">Email</label>
                                                        <div v-if="errors.emails" class="alert alert-danger">
                                                            {{ errors.emails }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mb-4" v-if="service_type === 'Design Service'">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"
                                                            v-for="(social_media_platform, index) in social_media_platforms">
                                                            <div class="pages_checkbox">
                                                                <div
                                                                    class="border border-ash-soft rounded p-2 d-flex justify-content-between">
                                                                    <span class="fs-14">{{
                                                                        social_media_platform.value
                                                                    }}</span>
                                                                    <input class="form-check-input" type="checkbox"
                                                                        v-model="submitOrderDetail.content_platform[index]['value']"
                                                                        :value="social_media_platform.value">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <h3 class="text-primary fw-light">Design Detail</h3>
                                            <div class="row mb-4">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="file" name="business_logo" id="business_logo"
                                                            class="input-file"
                                                            @change="handleFileChange('business_logo', $event)"
                                                            ref="business_logo">
                                                        <label for="business_logo" class="btn js-labelFile w-100"
                                                            :class="!file_selected.business_logo ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                            <span class="js-fileName mx-1">Business Logo</span>
                                                            <vue-feather v-if="!file_selected.business_logo"
                                                                type="upload-cloud"></vue-feather>
                                                            <vue-feather v-if="file_selected.business_logo"
                                                                type="check"></vue-feather>

                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="col-8" v-if="service_type === 'Development Service'">
                                                    <div class="form-floating">
                                                        <input id="business_name" name="business_name"
                                                            v-model="submitOrderDetail.business_logo_preferred" type="text"
                                                            class="form-control" placeholder="Business Name"><label
                                                            for="first_name">Enter
                                                            prefered color or fonts and/or font
                                                            type(if any)</label>
                                                        <div v-if="errors.business_logo_preferred"
                                                            class="alert alert-danger">
                                                            {{ errors.business_logo_preferred }}
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-8" v-if="service_type === 'Design Service'">
                                                    <div class="form-group">
                                                        <input type="file" name="company_profile" id="company_profile"
                                                            class="input-file"
                                                            @change="handleFileChange('company_profile', $event)"
                                                            ref="company_profile">
                                                        <label for="company_profile" class="btn js-labelFile w-100"
                                                            :class="!file_selected.business_logo ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                            <span class="js-fileName mx-1">Submit Company Profile</span>
                                                            <vue-feather v-if="!file_selected.company_profile"
                                                                type="upload-cloud"></vue-feather>
                                                            <vue-feather v-if="file_selected.company_profile"
                                                                type="check"></vue-feather>

                                                        </label>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row mb-4" v-if="service_type === 'Development Service'">
                                                <div class="col-4">
                                                    <div class="form-select-wrapper mb-4">
                                                        <select class="form-select" aria-label="Default select example"
                                                            v-model="submitOrderDetail.design_look">
                                                            <option value="" disabled>Design Look</option>
                                                            <option value="1">Modern</option>
                                                            <option value="2">Minimalis</option>
                                                            <option value="3">Professional</option>
                                                            <option value="4">Education</option>
                                                        </select>
                                                        <div v-if="errors.request_type" class="alert alert-danger">
                                                            {{ errors.design_look }}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-8">
                                                    <div class="form-floating">
                                                        <input id="business_name" name="business_name"
                                                            v-model="submitOrderDetail.design_look_preferred" type="text"
                                                            class="form-control" placeholder="Business Name"><label
                                                            for="first_name">Enter
                                                            prefered color or fonts and/or font
                                                            type(if any)</label>
                                                        <div v-if="errors.design_look_preferred" class="alert alert-danger">
                                                            {{ errors.business_logo_preferred }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="" v-if="service_type === 'Development Service'">

                                                <h3 class="text-primary fw-light">Functional and Content Requirements</h3>
                                                <div class="row mb-4">
                                                    <div class="col-4">
                                                        <div class="col">
                                                            <div class="border border-ash-soft rounded p-3">
                                                                <div
                                                                    class="pages-card align-items-center d-flex align-content-between w-100">
                                                                    <span>Pages</span>
                                                                    <vue-feather type="arrow-right"></vue-feather>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mt-3">
                                                            <div class="form-group">
                                                                <input type="file" name="content_file" id="content_file"
                                                                    class="input-file"
                                                                    @change="handleFileChange('content_file', $event)"
                                                                    multiple ref="content_file">
                                                                <label for="content_file" class="btn js-labelFile w-100"
                                                                    :class="!file_selected.content_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                                    <span class="js-fileName mx-1">Upload Content</span>
                                                                    <vue-feather v-if="!file_selected.content_file"
                                                                        type="upload-cloud"></vue-feather>
                                                                    <vue-feather v-if="file_selected.content_file"
                                                                        type="check"></vue-feather>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-4"
                                                                v-for="(development_requirement, index) in development_requirements">
                                                                <div class="pages_checkbox">
                                                                    <div
                                                                        class="border border-ash-soft rounded p-2 d-flex justify-content-between">
                                                                        <span class="fs-14">{{
                                                                            development_requirement.value
                                                                        }}</span>
                                                                        <input class="form-check-input" type="checkbox"
                                                                            v-model="submitOrderDetail.pages[index]['value']"
                                                                            :value="development_requirement.value">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>

                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="row container" v-else>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="pricing card text-center ">
                                            <div class="card-body mx-1 mr-1">
                                                <div class="prices text-dark text-start">
                                                    <div class="price price-show">
                                                        <span class="fs-18 text-primary">Pick Deck</span>
                                                    </div>
                                                </div>
                                                <div class="guidelines text-start mt-2">
                                                    <label>Guidelines</label><br>
                                                    <a href="#" class="text-primary">download template</a>
                                                </div>
                                                <div class="attachment text-start mt-2">
                                                    <label>Attachment</label><br>
                                                    <a href="#" class="text-primary">budget.xlsx</a><br>
                                                    <a href="#" class="text-primary">presentation.xlsx</a>
                                                </div>
                                            </div><!--/.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-12 mb-5">
                                        <form @submit.prevent="storePickDeck">
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <div class="form-floating">
                                                            <input id="startup_name" name="startup_name"
                                                                v-model="submitPickDeckDetail.startup_name" type="text"
                                                                class="form-control" placeholder="Startup Name"><label
                                                                for="startup_name">Startup Name</label>
                                                            <div v-if="errors.startup_name" class="alert alert-danger">
                                                                {{ errors.startup_name }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <div class="form-select-wrapper mb-4">
                                                            <select class="form-select" aria-label="Default select example"
                                                                v-model="submitPickDeckDetail.request_type">
                                                                <option value="" selected disabled>Request type</option>
                                                                <option value="1">Mentorship and networking</option>
                                                                <option value="2">Infrastructure Support</option>
                                                                <option value="3">Funding Support</option>
                                                            </select>
                                                            <div v-if="errors.request_type" class="alert alert-danger">
                                                                {{ errors.request_type }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-select-wrapper mb-4">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <input type="file" name="file"
                                                                        id="application_budget_file" class="input-file"
                                                                        @change="handleFileChange('application_budget_file', $event)"
                                                                        ref="application_budget_file">
                                                                    <label for="application_budget_file"
                                                                        class="btn js-labelFile w-100"
                                                                        :class="!file_selected.application_budget_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                                        <span class="js-fileName mx-2">Application
                                                                            Budget</span>
                                                                        <vue-feather
                                                                            v-if="!file_selected.application_budget_file"
                                                                            type="upload-cloud"></vue-feather>
                                                                        <vue-feather
                                                                            v-if="file_selected.application_budget_file"
                                                                            type="check"></vue-feather>
                                                                    </label>
                                                                    <div v-if="errors.application_budget_file"
                                                                        class="alert alert-danger">
                                                                        {{ errors.application_budget_file }}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <div class="form-select-wrapper mb-4">
                                                            <select class="form-select" aria-label="Default select example"
                                                                v-model="submitPickDeckDetail.has_business_license">
                                                                <option value="" disabled selected>Do you have business
                                                                    license?
                                                                </option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                            <div v-if="errors.has_business_license"
                                                                class="alert alert-danger">
                                                                {{ errors.has_business_license }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-select-wrapper mb-4">
                                                            <div class="form-floating">
                                                                <div class="form-group">
                                                                    <input type="file" name="file" id="presentation_file"
                                                                        class="input-file"
                                                                        @change="handleFileChange('presentation_file', $event)"
                                                                        ref="presentation_file">
                                                                    <label for="presentation_file"
                                                                        class="btn js-labelFile w-100"
                                                                        :class="!file_selected.presentation_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                                        <span class="js-fileName mx-2">Upload
                                                                            Presentation</span>
                                                                        <vue-feather v-if="!file_selected.presentation_file"
                                                                            type="upload-cloud"></vue-feather>
                                                                        <vue-feather v-if="file_selected.presentation_file"
                                                                            type="check"></vue-feather>
                                                                    </label>
                                                                    <div v-if="errors.presentation_file"
                                                                        class="alert alert-danger">
                                                                        {{ errors.presentation_file }}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                    </div>
                                                    <div class="col"
                                                        v-if="submitPickDeckDetail.has_business_license === '1'">
                                                        <div class="form-floating">
                                                            <div class="form-group">
                                                                <input type="file" name="business_license_file"
                                                                    id="business_license_file" class="input-file"
                                                                    @change="handleFileChange('business_license_file', $event)"
                                                                    ref="business_license_file">
                                                                <label for="business_license_file"
                                                                    class="btn js-labelFile w-100"
                                                                    :class="!file_selected.business_license_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                                    <span class="js-fileName mx-2">Business License</span>
                                                                    <vue-feather v-if="!file_selected.business_license_file"
                                                                        type="upload-cloud"></vue-feather>
                                                                    <vue-feather v-if="file_selected.business_license_file"
                                                                        type="check"></vue-feather>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div v-if="errors.business_license_file" class="alert alert-danger">
                                                            {{ errors.business_license_file }}
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-primary">Go To Application</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.tab-pane -->
                        <div class="tab-pane fade" :class="current_step === 3 ? 'show active' : ''" id="tab1-3">
                            <form @submit.prevent="storePaymentDetail">
                                <div class="container mb-3">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <div class="col-12 pb-1" v-for="order_item in order_items">
                                                <div class="card  shadow shadow-lg">
                                                    <div class="card-body p-5">
                                                        <div class="">
                                                            <p class="text-uppercase m-0">{{ order_item.name }}</p>
                                                            <p class="text-primary m-0">{{ order_item.service?.title }}</p>
                                                        </div>
                                                        <div class="prices text-dark">
                                                            <div class="price price-show"><span class="fs-32 text-primary">
                                                                    {{
                                                                        new
                                                                            Intl.NumberFormat('en-US', {
                                                                                style: 'currency',
                                                                                currency: 'MKD',
                                                                                maximumSignificantDigits: 3
                                                                            }).format(order_item.price,)
                                                                    }}
                                                                    {{
                                                                        order_item.pricing_scheme == '2' ? '/month' : ''
                                                                    }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 pb-5 mt-2">
                                                <div class="card mb-1">
                                                    <div class="card-body d-flex justify-content-between p-3">
                                                        <span class="text-primary">VAT 18%</span>
                                                        <span class="text-primary"> {{
                                                            numberFormatting(active_order.tax)
                                                        }} </span>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body d-flex justify-content-between p-3">
                                                        <span class="text-primary">Total</span>
                                                        <span class="text-primary"> {{
                                                            numberFormatting(active_order.total_price)
                                                        }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-12">
                                            <div class="card-body">
                                                <h3 class="text-primary fw-light">Enter your address detail</h3>
                                                <div class="row mb-4">
                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="first_name" name="first_name"
                                                                v-model="submitPaymentDetail.first_name" type="text"
                                                                class="form-control" placeholder="First Name"><label
                                                                for="first_name">First Name</label>
                                                            <div v-if="errors.first_name" class="alert alert-danger">
                                                                {{ errors.first_name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="last_name" name="last_name"
                                                                v-model="submitPaymentDetail.last_name" type="text"
                                                                class="form-control" placeholder="Last Name"><label
                                                                for="last_name">Last Name</label>
                                                            <div v-if="errors.last_name" class="alert alert-danger">
                                                                {{ errors.last_name }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="country" name="country"
                                                                v-model="submitPaymentDetail.country" type="text"
                                                                class="form-control" placeholder="Country"><label
                                                                for="country">Country</label>
                                                            <div v-if="errors.country" class="alert alert-danger">
                                                                {{ errors.country }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="country" name="city"
                                                                v-model="submitPaymentDetail.city" type="text"
                                                                class="form-control" placeholder="City"><label
                                                                for="country">City</label>
                                                            <div v-if="errors.city" class="alert alert-danger">
                                                                {{ errors.city }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-4 mb-3">
                                                        <div class="form-floating">
                                                            <input id="zip_code" name="zip_code"
                                                                v-model="submitPaymentDetail.zip_code" type="text"
                                                                class="form-control" placeholder="Zip Code"><label
                                                                for="country">Zip Code</label>
                                                            <div v-if="errors.zip_code" class="alert alert-danger">
                                                                {{ errors.zip_code }}
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-8">
                                                        <div class="form-floating">
                                                            <input id="address" name="address"
                                                                v-model="submitPaymentDetail.address" type="text"
                                                                class="form-control" placeholder="Address"><label
                                                                for="country">Address</label>
                                                            <div v-if="errors.address" class="alert alert-danger">
                                                                {{ errors.address }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-8" />
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="img">
                                                        <img src="@/img/icons/visa.png" alt="visa" />
                                                    </div>
                                                    <div class="card-number mt-2">
                                                        <p class="text-ash text-uppercase mb-0">Card Number</p>
                                                        <p class="text-primary mb-2">
                                                            {{ maskingNumber(submitPaymentDetail.card_number) }}</p>
                                                        <div class="card-detail d-flex justify-content-between">
                                                            <div class="card-holder">
                                                                <p class="text-ash mb-0 text-uppercase">Card Holder</p>
                                                                <p class="text-primary mb-0">
                                                                    {{ submitPaymentDetail.card_holder_name }}
                                                                </p>
                                                            </div>
                                                            <div class="card-expiry">
                                                                <p class="text-ash mb-0 text-uppercase">exp date</p>
                                                                <p class="text-primary mb-0">
                                                                    {{ submitPaymentDetail.card_expiration }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-12">
                                            <div class="card-body">
                                                <h3 class="text-primary fw-light">Enter your payment detail</h3>
                                                <div class="row mb-4">
                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="card_number" name="card_number"
                                                                v-model="submitPaymentDetail.card_number" type="text"
                                                                class="form-control" placeholder="Card Number"><label
                                                                for="card_number">Card Number</label>
                                                            <div v-if="errors.card_number" class="alert alert-danger">
                                                                {{ errors.card_number }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="holder_name" name="holder_name"
                                                                v-model="submitPaymentDetail.card_holder_name" type="text"
                                                                class="form-control" placeholder="Holder Name"><label
                                                                for="card_number">Holder Name</label>
                                                            <div v-if="errors.card_holder_name" class="alert alert-danger">
                                                                {{ errors.card_holder_name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="expiry" name="expiry"
                                                                v-model="submitPaymentDetail.card_expiration" type="month"
                                                                class="form-control" placeholder="Expiry Date"><label
                                                                for="card_number">Expiration Date</label>
                                                            <div v-if="errors.card_expiration" class="alert alert-danger">
                                                                {{ errors.card_expiration }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="form-floating">
                                                            <input id="cvv" name="cvv"
                                                                v-model="submitPaymentDetail.card_cvv" type="text"
                                                                class="form-control" placeholder="CVV"><label
                                                                for="card_number">CVV</label>
                                                            <div v-if="errors.card_cvv" class="alert alert-danger">
                                                                {{ errors.card_cvv }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fade" :class="current_step === 4 ? 'show active' : ''" id="tab1-4">
                            <div class="container mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title">
                                            <p class="text-ash mb-0">{{ order_step.find(item => item.step == 2).name }}</p>
                                            <p class="text-primary text-capitalize mb-0" v-for="item in order_items">
                                                {{ item.name }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="price">
                                                <h3 class="text-primary fw-light">
                                                    {{ numberFormatting(active_order.total_price) }}
                                                </h3>
                                            </div>
                                            <div class="greeting text-ash">
                                                <p>Thankyou for submitting your application</p>
                                                <p class="mb-0">to track the status, check under Profile > Orders.</p>
                                                <p>You will also receive an email notification when there's chnage to the
                                                    application status</p>
                                                <p>Good Luck</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.tab-pane -->
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import { Link, router, usePage, useForm } from "@inertiajs/vue3";
//local registration
import { FormWizard, TabContent } from 'vue3-form-wizard'
import 'vue3-form-wizard/dist/style.css'
import { reactive } from "vue";
import feather from 'feather-icons'
import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    layout: FrontLayout,
    components: {
        Link,
        FormWizard,
        TabContent
    },
    props: {
        user: Object,
        auth: Object,
        errors: Object

    },
    data() {
        return {
            order_items: [],
            order_step: [
                {
                    name: 'Download NDA',
                    default: true,
                    completed: false,
                    step: 1,
                    step_name: 'step 1',
                    current: true,
                    additional_info: [
                        {
                            title: 'Non Disclosure Agreement',
                            contents: [
                                {
                                    title: 'Guidelines',
                                    resource: {
                                        caption: 'download template',
                                        url: 'https://www.google.com'
                                    }
                                },
                                {
                                    title: 'Attachment',
                                    resource: {
                                        caption: 'NDA Template',
                                        url: 'https://www.google.com'
                                    }
                                }
                            ],
                        }
                    ]
                },
                {
                    name: 'Product Selection',
                    default: false,
                    completed: false,
                    step: 2,
                    step_name: 'step 2',
                    current: false,
                    additional_info: {}
                },
                {
                    name: 'Application Fee',
                    default: false,
                    completed: false,
                    current: false,
                    step: 3,
                    step_name: 'step 3',
                    additional_info: {}
                },
                {
                    name: 'Confirmation',
                    default: false,
                    completed: false,
                    current: false,
                    step: 4,
                    step_name: 'step 4',
                    additional_info: {}
                },


            ],
            current_step: 1,
            active_order: {},
            file_selected: {
                business_logo: false,
                license_file: false,
                nda_file: false,
                content_file: false,
                company_profile: false,
                application_budget_file: false,
                presentation_file: false,
                business_license_file: false

            },
            development_requirements: [
                {
                    key: 'homepage',
                    value: 'Homepage'
                },
                {
                    key: 'contact',
                    value: 'Contact'
                },
                {
                    key: 'products',
                    value: 'Products'
                },
                {
                    key: 'about_us',
                    value: 'About Us'
                },
                {
                    key: 'gallery',
                    value: 'Gallery'

                },
                {
                    key: 'services',
                    value: 'Services'
                },
                {
                    key: 'blog',
                    value: 'Blog'
                },
                {
                    key: 'faq',
                    value: 'FAQs'
                },
                {
                    key: 'team',
                    value: 'Team'
                },
                {
                    key: 'portfolio',
                    value: 'Portfolio'
                },
                {
                    key: 'careers',
                    value: 'Careers'
                },
                {
                    key: 'privacy_policy',
                    value: 'Privacy Policy'
                },
                {
                    key: 't_c',
                    value: 'T&C'
                },
                {
                    key: 'login_register',
                    value: 'Login/Register'
                },
                {
                    key: 'events_calendar',
                    value: 'Events Calendar'
                }

            ],
            social_media_platforms: [
                {
                    key: 'instagram',
                    value: 'Instagram'
                },
                {
                    key: 'facebook',
                    value: 'Facebook'
                },
                {
                    key: 'x',
                    value: 'X'
                },
                {
                    key: 'linkedin',
                    value: 'LinkedIn'
                }
            ],
            vat_rate: 18,
            vat: 0,
            sub_total: 0,
            total_price: 0,
            service_type: '',
            order_type: '',
        }
    },
    setup() {
        const submitNDAForm = useForm({
            full_name: '',
            request_type: '',
            has_business_license: '',
            nda_file: '',
            license_file: '',
        });

        const submitOrderDetail = useForm({
            business_name: '',
            business_type: '',
            business_location: '',
            total_employees: '',
            preferred_domain: '',
            emails: [],
            business_logo: '',
            business_logo_preferred: '',
            design_look: '',
            design_look_preferred: '',
            company_profile: '',
            pages: [
                {
                    key: 'homepage',
                    value: false
                },
                {
                    key: 'contact',
                    value: false
                },
                {
                    key: 'products',
                    value: false
                },
                {
                    key: 'about_us',
                    value: false
                },
                {
                    key: 'gallery',
                    value: false

                },
                {
                    key: 'services',
                    value: false
                },
                {
                    key: 'blog',
                    value: false
                },
                {
                    key: 'faq',
                    value: false
                },
                {
                    key: 'team',
                    value: false
                },
                {
                    key: 'portfolio',
                    value: false
                },
                {
                    key: 'careers',
                    value: false
                },
                {
                    key: 'privacy_policy',
                    value: false
                },
                {
                    key: 't_c',
                    value: false
                },
                {
                    key: 'login_register',
                    value: false
                },
                {
                    key: 'events_calendar',
                    value: false
                }
            ],
            content_platform: [
                {
                    key: 'instagram',
                    value: false
                },
                {
                    key: 'facebook',
                    value: false
                },
                {
                    key: 'x',
                    value: false
                },
                {
                    key: 'linkedin',
                    value: false
                }
            ],
            content_file: null,
        })

        const submitPaymentDetail = useForm({
            first_name: '',
            last_name: '',
            country: '',
            city: '',
            zip_code: '',
            address: '',
            card_number: '',
            card_holder_name: '',
            card_expiration: '',
            card_cvv: '',
        })

        const submitPickDeckDetail = useForm({
            startup_name: '',
            request_type: '',
            application_budget_file: '',
            has_business_license: '',
            presentation_file: '',
            business_license_file: '',
        })

        return {
            submitNDAForm,
            submitOrderDetail,
            submitPaymentDetail,
            submitPickDeckDetail
        }
    },
    mounted() {
        console.log(this.auth)
        if (!this.auth.user) {
            router.get('/sign-in')
        }
        const order_steps = this.order_step;
        // this.order_items = JSON.parse(localStorage.getItem('order_items')) || this.$props.flash.order_items;
        // return false

        const step = order_steps.find(item => item.step === 2);

        let active_order = localStorage.getItem('active_order');
        let order_items = JSON.parse(localStorage.getItem('order_items'))

        console.log(this.order_items)
        if (!this.order_items) {
            const originRoute = usePage().url.replace('/order', '')
            router.get(originRoute, {}, {
                preserveScroll: true
            })
        }

        this.order_items = order_items

        console.log(this.current_step)


        if (active_order) {

            this.active_order = JSON.parse(active_order)
            this.current_step = this.active_order.current_step
            order_steps.find(item => item.step === this.current_step).current = true
            order_steps.filter(item => item.step < this.current_step).forEach(item => {
                item.completed = true
            })
        }
        const first_item = order_items[0];
        step.additional_info = order_items;
        step.name = first_item.product_type;
        this.service_type = first_item.product_type
        if (active_order && active_order.order_type === 'normal') {

        } else if (active_order && active_order.order_type === 'incubation') {
            step.name = 'Pick Deck'
            this.service_type = active_order.order_type
        }


        if (this.current_step === 3) {
            let sub_total = 0;
            const price = this.order_items.map(item => {
                return sub_total += item.price
            })
            const sum_price = parseFloat(price.reduce((a, b) => a + b, 0));
            this.vat = sum_price * this.vat_rate / 100
            this.total_price = parseFloat(sub_total) + parseFloat(this.vat)
            console.log(this.total_price)
        }



        console.log(this.active_order)

    },
    filters: {
        formatCardNumber(value) {
            return value ? value.match(/.{1,4}/g).join(' ') : '';
        }
    },
    computed: {
        formatCardNumber() {
            return this.cardNumber ? this.cardNumber.match(/.{1,4}/g).join(' ') : '';
        }
    },
    methods: {
        updateValue(e) {
            this.cardNumber = e.target.value.replace(/ /g, '');
        },
        storeNDA() {
            const formData = new FormData();
            formData.append('full_name', this.submitNDAForm.full_name);
            formData.append('request_type', this.submitNDAForm.request_type);
            formData.append('has_business_license', this.submitNDAForm.has_business_license);
            formData.append('nda_file', this.submitNDAForm.nda_file);
            formData.append('license_file', this.submitNDAForm.license_file);
            formData.append('order_items', JSON.stringify(this.order_items));
            router.post('/order/nda', formData, {
                forceFormData: true,
                preserveScroll: false,
                onSuccess: () => {
                    this.updateStep(this.current_step)
                    this.active_order = this.$page.props.flash.order
                    const order = this.active_order
                    this.current_step = order.current_step
                    this.saveCartToLocalStorage(order, 'active_order')
                    toast(this.$page.props.flash.messages);
                    console.log(this.$page.props)
                }
            })
        },
        handleFileChange(name) {
            const order_steps = this.order_step;
            // this.order_items = JSON.parse(localStorage.getItem('order_items')) || this.$props.flash.order_items;
            // return false

            const step = order_steps.find(item => item.step === 2);

            console.log(this.current_step)
            // console.log(event.target.files[0])
            const fileInput = this.$refs[name];
            if (this.current_step === 1) {
                this.submitNDAForm[name] = fileInput.files[0];
            }

            if (this.current_step === 2) {
                this.submitOrderDetail[name] = fileInput.files[0];
            }

            if (step.name === 'Pick Deck') {
                this.submitPickDeckDetail[name] = fileInput.files[0];
            }
            this.file_selected[name] = true
        },
        updateStep(step) {
            this.order_step.find(item => item.step === step).completed = true;
            this.current_step = 2
        },
        storeOrderDetail() {
            const formData = new FormData();
            const orderDetailData = this.submitOrderDetail;
            formData.append('business_name', orderDetailData.business_name);
            formData.append('business_type', orderDetailData.business_type);
            formData.append('business_location', orderDetailData.business_location);
            formData.append('total_employees', orderDetailData.total_employees);
            formData.append('preferred_domain', orderDetailData.preferred_domain);
            formData.append('emails', JSON.stringify(orderDetailData.emails));
            formData.append('business_logo_preferred', orderDetailData.business_logo_preferred);
            formData.append('business_logo', orderDetailData.business_logo);
            formData.append('design_look_preferred', orderDetailData.design_look_preferred);
            formData.append('design_look', orderDetailData.design_look);
            formData.append('pages', JSON.stringify(orderDetailData.pages));
            formData.append('content_file', orderDetailData.content_file);
            formData.append('order_id', this.active_order.id);
            formData.append('company_profile', orderDetailData.company_profile);
            formData.append('content_platform', JSON.stringify(orderDetailData.content_platform));

            router.post('/order/details', formData, {
                forceFormData: true,
                preserveScroll: false,
                onSuccess: () => {
                    this.updateStep(this.current_step)
                    this.active_order = this.$page.props.flash.order
                    const order = this.active_order
                    this.current_step = order.current_step
                    this.saveCartToLocalStorage(order, 'active_order')
                    toast(this.$page.props.flash.messages);
                    console.log(this.$page.props)
                }
            })
        },
        storePaymentDetail() {
            const paymentDetail = this.submitPaymentDetail;
            paymentDetail.order_id = this.active_order.id
            router.post('/order/payment', paymentDetail, {
                forceFormData: true,
                preserveScroll: false,
                onSuccess: () => {
                    this.updateStep(this.current_step)
                    this.active_order = this.$page.props.flash.order
                    const order = this.active_order
                    this.current_step = order.current_step
                    this.saveCartToLocalStorage(order, 'active_order')
                    toast(this.$page.props.flash.messages);
                    console.log(this.$page.props)
                }
            })
            console.log(this.submitPaymentDetail)
        },
        storePickDeck() {
            // console.log(this.submitPickDeckDetail)
            // return false;
            // startup_name: '',
            // request_type: '',
            // application_budget_file: '',
            // has_business_license: '',
            // presentation_file: '',
            // business_license_file: '',
            const formData = new FormData();
            formData.append('startup_name', this.submitPickDeckDetail.startup_name);
            formData.append('request_type', this.submitPickDeckDetail.request_type);
            formData.append('application_budget_file', this.submitPickDeckDetail.application_budget_file);
            formData.append('has_business_license', this.submitPickDeckDetail.has_business_license);
            formData.append('presentation_file', this.submitPickDeckDetail.presentation_file);
            formData.append('business_license_file', this.submitPickDeckDetail.business_license_file);
            formData.append('order_id', this.active_order.id);
            router.post('/order/pickdeck', formData, {
                forceFormData: true,
                preserveScroll: false,
                onSuccess: () => {
                    this.updateStep(this.current_step)
                    this.active_order = this.$page.props.flash.order
                    const order = this.active_order
                    this.current_step = order.current_step
                    this.saveCartToLocalStorage(order, 'active_order')
                    toast(this.$page.props.flash.messages);
                    console.log(this.$page.props)
                }
            })

        },
        maskingNumber(number) {
            return number
        },
        saveCartToLocalStorage(object, key) {
            if (localStorage.getItem(key)) {
                localStorage.removeItem(key);
            }
            localStorage.setItem(key, JSON.stringify(object));
        },
        capitalize(string) {
            return string.split('_').map(item => item.charAt(0).toUpperCase() + item.slice(1)).join(' ')
        },

        numberFormatting(e) {
            return 'MKD ' + Number(parseFloat(e).toFixed(2)).toLocaleString('en-US');
        }
    }
}
</script>

<style>
body {
    margin: 0
}

.page-content {
    width: 100%;
    margin: 0 auto;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    background: #383a4f;
    flex-direction: column;
    -o-flex-direction: column;
    -ms-flex-direction: column;
    -moz-flex-direction: column;
    -webkit-flex-direction: column
}

.wizard-heading {
    color: #fff;
    font-family: open sans, sans-serif;
    font-weight: 700;
    font-size: 30px;
    padding-top: 85px;
    padding-bottom: 55px
}

.wizard-v6-content {
    width: 910px;
    box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
    -o-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
    -ms-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
    -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
    -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
    border-radius: 10px;
    -o-border-radius: 10px;
    -ms-border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    margin: 0 0 90px;
    font-family: open sans, sans-serif;
    font-size: 18px;
    font-weight: 400;
    position: relative;
    display: flex;
    display: -webkit-flex
}

.wizard-v6-content .wizard-form {
    width: 100%;
    background: #525575;
    border-radius: 10px;
    -o-border-radius: 10px;
    -ms-border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px
}

.form-register .steps {
    padding: 35px 50px 20px
}

.form-register .steps ul {
    display: flex;
    display: -webkit-flex;
    justify-content: space-between;
    -o-justify-content: space-between;
    -ms-justify-content: space-between;
    -moz-justify-content: space-between;
    -webkit-justify-content: space-between;
    list-style: none;
    padding-left: 0;
    margin-top: 0;
    width: 100%
}

.form-register .steps li,
.form-register .steps li.current {
    outline: none;
    -o-outline: none;
    -ms-outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    position: relative;
    width: 33.33%;
    margin-right: 20px;
    background: #fff
}

.btn-tertiary {
    color: #555;
    padding: 0;
    line-height: 40px;
    width: 300px;
    margin: auto;
    display: block;
    border: 2px solid #555;

    &:hover,
    &:focus {
        color: lighten(#555, 20%);
        border-color: lighten(#555, 20%);
    }
}

/* input file style */

.input-file {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;

}

.form-register .steps li:last-child {
    margin-right: 0
}

.form-register .steps li .current-info {
    display: none
}

.form-register .steps li a {
    text-decoration: none;
    outline: none;
    -o-outline: none;
    -ms-outline: none;
    -moz-outline: none;
    -webkit-outline: none
}

.form-register .steps li a .title {
    display: flex;
    display: -webkit-flex
}

.form-register .steps li a .title .step-icon {
    position: relative;
    outline: none;
    -o-outline: none;
    -ms-outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    box-shadow: 0 4px 11px 0 rgba(0, 0, 0, .14);
    -o-box-shadow: 0 4px 11px 0 rgba(0, 0, 0, .14);
    -ms-box-shadow: 0 4px 11px 0 rgba(0, 0, 0, .14);
    -moz-box-shadow: 0 4px 11px 0 rgba(0, 0, 0, .14);
    -webkit-box-shadow: 0 4px 11px 0 rgba(0, 0, 0, .14);
    font-size: 18px;
    color: #fff;
    font-size: 25px;
    background: #ccc;
    padding: 30px;
    margin: 0;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px
}

.form-register .steps li a .step-icon span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%)
}

.form-register .steps li.current a .step-icon,
.form-register .steps li.current a:active .step-icon,
.form-register .steps li.done a .step-icon,
.form-register .steps li.done a:active .step-icon {
    background: #55e8d5
}

.form-register .steps li a .step-text {
    color: #333;
    font-size: 16px;
    font-weight: 400;
    padding-top: 18px;
    padding-left: 20px
}

.form-register .content {
    padding: 0 50px
}

.form-register .content h2 {
    display: none
}

.inner .form-heading {
    display: flex;
    display: -webkit-flex;
    justify-content: space-between;
    -o-justify-content: space-between;
    -ms-justify-content: space-between;
    -moz-justify-content: space-between;
    -webkit-justify-content: space-between
}

.inner .form-heading h3 {
    font-weight: 700;
    font-size: 30px;
    color: #fff;
    margin: 0;
    padding: 0 0 35px
}

.inner .form-heading span {
    font-weight: 400;
    font-size: 18px;
    color: #ccc
}

.inner .form-row {
    display: flex;
    margin: 0 -15px;
    position: relative;
    margin-bottom: 25px
}

.inner .form-row .form-row-inner {
    position: relative
}

.inner .form-row .form-holder {
    width: 50%;
    padding: 0 15px;
    position: relative
}

.inner .form-row .form-holder.form-holder-2 {
    width: 100%;
    position: relative
}

.inner .form-row .form-holder .label {
    position: absolute;
    top: 6px;
    left: 10px;
    font-size: 16px;
    font-weight: 400;
    color: #fff;
    transform-origin: 0 0;
    transition: all .2s ease;
    -moz-transition: all .2s ease;
    -webkit-transition: all .2s ease;
    -o-transition: all .2s ease;
    -ms-transition: all .2s ease
}

.inner .form-row .form-holder label.special-label {
    display: block;
    float: none;
    padding-right: 20px;
    color: #fff;
    font-size: 16px;
    font-weight: 400;
    margin-bottom: 20px
}

.inner .form-row .form-holder label.special-label-1 {
    font-weight: 600;
    font-size: 14px;
    color: #55e8d5
}

.inner .form-images {
    margin-bottom: 20px
}

.inner .form-row .form-holder input,
.inner .form-row .form-holder select {
    width: 100%;
    padding: 11.5px 20px;
    border: none;
    appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    background: 0 0;
    border-bottom: 1px solid;
    border-bottom-color: rgba(255, 255, 255, .3);
    font-weight: 400;
    font-family: open sans, sans-serif;
    font-size: 16px;
    color: #fff;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box
}

.inner .form-row .form-holder .form-control:focus+.label,
.inner .form-row .form-holder .form-control:valid+.label {
    transform: translateY(-34px) scale(.9);
    -moz-transform: translateY(-34px) scale(.9);
    -webkit-transform: translateY(-34px) scale(.9);
    -o-transform: translateY(-34px) scale(.9);
    -ms-transform: translateY(-34px) scale(.9);
    color: #55e8d5
}

input::placeholder {
    color: #fff
}

input:-ms-input-placeholder {
    color: #fff
}

input::-ms-input-placeholder {
    color: #fff
}

/* .inner .form-row .form-holder select {
    background: #fff url(../images/wizard_v6_icon.png) no-repeat scroll;
    background-position: right 16px center;
    z-index: 1;
    cursor: pointer;
    color: #666;
    position: relative;
    font-weight: 400;
    font-size: 16px
} */

.inner .form-row .form-holder select#room,
.inner .form-row .form-holder #day,
.inner .form-row .form-holder select#time {
    background: 0 0;
    border-bottom: 1px solid;
    border-bottom-color: rgba(255, 255, 255, .3);
    color: #fff;
    position: relative;
    background: 0 0;
    z-index: 1;
    cursor: poiter
}

.inner .form-row .form-holder .select-btn {
    z-index: 0;
    position: absolute;
    top: 54.5%;
    right: 6%;
    font-size: 19px;
    cursor: pointer;
    color: #fff
}

.inner .form-row .form-holder.form-holder-2 .select-btn {
    right: 3.5%
}

.inner .form-row.form-row-date .form-holder select {
    float: none;
    width: 12.4%;
    margin-right: 20px;
    border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px
}

.inner .form-row.form-row-date .form-holder select#year {
    width: 13.6%
}

.inner .form-row .form-holder select option {
    background: #fff;
    color: #666
}

.inner .form-row .form-holder .ui-datepicker-trigger {
    background: 0 0;
    border: none;
    color: #fff;
    font-size: 19px;
    position: absolute;
    cursor: pointer;
    right: 5%;
    top: 54.5%;
    outline: none;
    -o-outline: none;
    -ms-outline: none;
    -moz-outline: none;
    -webkit-outline: none
}

.inner .form-row.table-responsive {
    border: none
}

.inner .table-responsive .table {
    width: 100%
}

.inner .table-responsive tbody {
    text-align: left
}

.inner .table-responsive tr.space-row {
    display: block
}

.inner .table-responsive tbody th {
    display: block;
    font-size: 16px;
    font-weight: 400;
    color: rgba(255, 255, 255, .5);
    padding-bottom: 0
}

.inner .table-responsive tbody td {
    color: #55e8d5;
    font-size: 18px;
    font-weight: 700;
    padding-bottom: 25px
}

.form-register .actions {
    padding: 0 45px 45px
}

.actions ul {
    list-style: none;
    padding-left: 0;
    margin: 15px 0 0;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center
}

.actions ul li.disabled,
.actions ul li:first-child {
    display: none
}

.actions ul li {
    padding: 0;
    border: none;
    display: inline-flex;
    height: 45px;
    width: 150px;
    justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    background: #43ccba;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600
}

.actions ul li:hover {
    background: #32998b
}

.actions ul li a {
    color: #fff;
    text-decoration: none;
    padding: 11px 55px
}

@media screen and (max-width: 991px) {
    .wizard-v6-content {
        width: 90%
    }

    .form-register .steps li a .title {
        flex-direction: column;
        -o-flex-direction: column;
        -ms-flex-direction: column;
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center
    }

    .form-register .steps li a .title .step-icon {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0
    }

    .form-register .steps li a .step-text {
        padding-bottom: 20px;
        padding-left: 0
    }

    .inner .form-row.form-row-date .form-holder select,
    .inner .form-row.form-row-date .form-holder select#year {
        width: 25%
    }
}

@media screen and (max-width: 575px) {
    .form-register .steps {
        padding: 35px 30px 20px
    }

    .form-register .steps li a .title .step-icon {
        padding: 20px;
        font-size: 20px
    }

    .form-register .content {
        padding: 0 30px
    }

    .inner .form-heading span {
        display: none
    }

    .inner .form-images {
        display: none
    }

    .inner .form-row {
        flex-direction: column;
        -o-flex-direction: column;
        -ms-flex-direction: column;
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        margin: 0
    }

    .inner .form-row .form-holder {
        width: 100%;
        padding: 0;
        margin-bottom: 30px
    }

    .inner .form-row.form-row-date .form-holder select,
    .inner .form-row.form-row-date .form-holder select#year {
        float: none;
        width: 100%;
        margin-bottom: 20px;
        margin-right: 0;
        display: block
    }

    .inner .form-row .form-holder .ui-datepicker-trigger {
        right: 0
    }

    .inner .form-row .form-holder .select-btn {
        right: 2%
    }
}
</style>
