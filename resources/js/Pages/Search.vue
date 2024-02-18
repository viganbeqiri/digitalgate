<template>
    <div class="row text-center">
        <div class="col-xl-10 mx-auto">
            <h3 class="fs-21 text-uppercase text-muted mb-3">Search Result</h3>
        </div>
        <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-xl-10 mx-auto">
            <form class="filter-form mb-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Keyword</label>
                            <input type="text" class="form-control" placeholder="Keyword" v-model="keyword" name="keyword">
                        </div>
                    </div>
                    <!-- search button -->
                    <div class="col-md-6 d-flex align-items-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" @click="search">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="job-list mb-10" v-for="(result, index) in results">
                <h3 class="mb-4">{{ capitalized(index) }}</h3>
                <a href="#" @click="handleClick(data)" class="card mb-4 lift" v-for="data in result">
                    <div class="card-body p-5">
                        <span class="row justify-content-between align-items-center">
                            <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                                <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">{{ updateInitials(data.title)
                                }}</span> {{ capitalized(data.title) }}
                            </span>

                            <span class="col-7 col-md-4 col-lg-3 text-body d-flex align-items-center">
                                <i class="uil uil-dollar-alt" v-if="index == 'product'"></i>
                                {{ index == 'product' ? formatNumber(data.price) : '' }} </span>
                            <span class="d-none d-lg-block col-1 text-center text-body">
                                <i class="uil uil-angle-right-b"></i>
                            </span>
                        </span>
                    </div>
                    <!-- /.card-body -->
                </a>
            </div>
        </div>
    </div>
</template>
<script>
import { faThermometer } from "@fortawesome/free-solid-svg-icons";
import FrontLayout from "../Shares/FrontLayout.vue";
import { usePage, Head, Link, router } from '@inertiajs/vue3'

export default {
    layout: FrontLayout,
    props: {
        results: Array,
        query: String,
        auth: Object

    },
    data() {
        return {
            keyword: this.query,
            convertedInitials: '',
            orderItem: [],
            page: null
        }
    },

    methods: {
        updateInitials(text) {
            return text
                .split(' ')
                .slice(0, 2)
                .map(word => word.charAt(0))
                .join('');
        },
        updateAbbreviation(text) {
            this.abbreviatedText = text.replace(/graphic design/gi, 'GD');
        },
        capitalized(name) {
            const capitalizedFirst = name[0].toUpperCase();
            const rest = name.slice(1);

            return capitalizedFirst + rest;
        },
        formatNumber(number) {
            // Check if the input is a valid number
            if (!isNaN(number) && number !== '') {
                // Use toLocaleString to add thousand separators
                return Number(number).toLocaleString();
            } else {
                return '0';
            }
        },
        search() {
            this.$inertia.get(route('search', this.keyword))
        },
        doOrder(product, parent = null, page) {
            if (!parent) {
                parent = product.parent_product
            }
            // console.log(product)
            // return false
            if (!this.auth.user) {
                toast("You need to login first !", {
                    onClose: () => router.get('/sign-in'),
                });
                return false;
            }

            product.service = this.page
            this.orderItem = [product]
            if (parent) {
                parent.service = this.page
                this.orderItem.push(parent)
            }

            //get active order from local storage
            const active_order = localStorage.getItem('active_order')
            if (active_order) {
                localStorage.removeItem('active_order')
            }
            this.saveCartToLocalStorage()
            const currentRoute = 'services/' + page.slug
            const orderUrl = currentRoute + '/order'
            router.visit(orderUrl)
        },
        saveCartToLocalStorage() {
            if (localStorage.getItem('order_items')) {
                localStorage.removeItem('order_items');
            }
            localStorage.setItem('order_items', JSON.stringify(this.orderItem));
        },
        handleClick(data) {
            console.log(data)
            this.doOrder(data, data.parent_product, data.page)
        }
    },
    mounted() {
        console.log(this.results)
    }
}
</script>
