<template>
    <div class="container">
        <!-- search form -->
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-md" placeholder="Search" v-model="params.search">
                </div>
            </div>
        </div>
        <div class="table-responsive border p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" @click="sort('id')">
                            ID
                            <i class="uil uil-angle-down" v-if="params.field == 'id' && params.direction == 'asc'"></i>
                            <i class="uil uil-angle-up" v-if="params.field == 'id' && params.direction == 'desc'"></i>
                        </th>
                        <th scope="col" @click="sort('order_no')">
                            Order No
                            <i class="uil uil-angle-down"
                                v-if="params.field == 'order_no' && params.direction == 'asc'"></i>
                            <i class="uil uil-angle-up" v-if="params.field == 'order_no' && params.direction == 'desc'"></i>
                        </th>
                        <th scope="col" @click="sort('service_type')">Service Type</th>
                        <th scope="col" style="text-align: right" @click="sort('total_price')">
                            Price
                            <i class="uil uil-angle-down"
                                v-if="params.field == 'total_price' && params.direction == 'asc'"></i>
                            <i class="uil uil-angle-up"
                                v-if="params.field == 'total_price' && params.direction == 'desc'"></i>
                        </th>
                        <th scope="col" @click="sort('status')">
                            Order Status
                            <i class="uil uil-angle-down" v-if="params.field == 'status' && params.direction == 'asc'"></i>
                            <i class="uil uil-angle-up" v-if="params.field == 'status' && params.direction == 'desc'"></i>
                        </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order in orders.data">
                        <th scope="row">{{ order.id }}</th>
                        <td>{{ order.order_no }}</td>
                        <td>{{ order.order_type }}</td>
                        <td style="text-align: right">MKD {{ formatNumber(order.total_price) }}</td>
                        <td>{{ order.order_status }}</td>
                        <td>
                            <Link :href="`/order/${order.id}`" class="btn btn-primary btn-sm">View</Link>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="row">
                <div class="vtl-paging-info col-sm-12 col-md-4">
                    <div role="status" aria-live="polite">Showing {{ orders.to }} of {{ orders.total }}</div>

                </div>
                <div class="col-sm-12 col-md-8">
                    <div aria-label="Page navigation example " class="pagination-wrapper d-flex justify-content-end"
                        v-if="links.length > 3">
                        <ul class="pagination">
                            <li class="page-item" v-for="(link, key) in links" :key="key">
                                <div v-if="link.url === null" class="page-link disabled" v-html="link.label"
                                    :style="link.label == '« Previous' || link.label == 'Next &raquo;' ? 'width: 100px' : 'asd'" />

                                <Link v-else class="page-link" :class="{ 'bg-white': link.active }" :href="link.url"
                                    v-html="link.label" />
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
import FrontLayout from "../Shares/FrontLayout.vue";
import { defineComponent, reactive } from "vue";
import { Link, router, usePage, useForm } from "@inertiajs/vue3";

const sampleData1 = (offst, limit) => {
    let data = usePage().props.orders;
    return data;
};

// Fake Data for 'desc' sortable
const sampleData2 = (offst, limit) => {
    let data = usePage().props.orders;

    return data;
};
export default {
    layout: FrontLayout,
    components: {
        Link

    },
    props: {
        errors: Object,
        auth: Object,
        orders: Object,
        query: Object,

    },
    setup() {

    },
    data() {
        return {
            params: {
                search: this.query?.search,
                limit: 10,
                offst: 0,
                field: 'id',
                direction: 'asc',
                page: 1
            },
            links: this.orders.links
        }
    },
    watch: {
        params: {
            handler() {
                this.$inertia.get('/order', this.params, {
                    replace: true,
                    preserveState: true
                })
            },
            deep: true
        }
    },
    mounted() {
        console.log(this.orders)
    },
    methods: {
        sort(field) {
            console.log(this.params.direction)
            this.params.field = field
            this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc'
            console.log(this.params)

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
    }
}
</script>
