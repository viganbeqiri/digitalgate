<template>
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
                                           v-model="submitNDAForm.full_name"
                                           type="text" class="form-control"
                                           placeholder="Full name"><label
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
                                    <label for="request_type">Request Type</label>
                                    <select class="form-select" aria-label="Default select example"
                                            v-model="submitNDAForm.request_type">
                                        <option disabled>Request type</option>
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
                                        <option selected>Do you have business license?</option>
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
                                            <input type="file" name="file" id="file" class="input-file" @change="handleFileChange('nda_file', $event)" ref="nda_file">
                                            <label for="file" class="btn js-labelFile w-100" :class="!file_selected.nda_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                                <span class="js-fileName mx-2">NDA FIle</span>
                                                <vue-feather v-if="!file_selected.nda_file" type="upload-cloud"></vue-feather>
                                                <vue-feather v-if="file_selected.nda_file" type="check"></vue-feather>
                                            </label>
                                        </div>
                                    </div>
                                    <div v-if="errors.nda_file" class="alert alert-danger">
                                        {{ errors.nda_file }}
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
                                        <input type="file" name="license_file" id="license_file" class="input-file" @change="handleFileChange('license_file', $event)" ref="license_file">
                                        <label for="file" class="btn js-labelFile w-100" :class="!file_selected.nda_file ? 'btn-outline-ash' : 'btn-outline-primary'">
                                            <span class="js-fileName">Business License</span>
                                            <vue-feather v-if="!file_selected.license_file" type="upload-cloud"></vue-feather>
                                            <vue-feather v-if="file_selected.license_file" type="check"></vue-feather>                                                            </label>
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

</template>
<script>
export default {
    props: ['auth', 'errors', 'current_step', 'submitNDAForm', 'file_selected', 'handleFileChange', 'storeNDA']

}
</script>
