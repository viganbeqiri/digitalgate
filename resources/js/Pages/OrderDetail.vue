<template>
    <div class="container mt-4">
        <h2 class="mb-4">Order Details</h2>

        <!-- Customer Information -->
        <div class="card mb-4">
            <div class="card-header">
                Order Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <p><strong>Order No:</strong> {{ order.order_no }}</p>
                        <p><strong>Status:</strong> {{ order.order_status }}</p>
                        <p><strong>Order Type:</strong> {{ order.order_type }}</p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                    </div>

                </div>

                <!-- Add more customer information fields as needed -->
            </div>
        </div>

        <!-- Item List -->
        <div class="card mb-4">
            <div class="card-header">
                Item List
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Service Type</th>
                            <th scope="col" class="text-end">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in order_items">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ item.product.name }}</td>
                            <td>{{ item.product.product_type }}</td>
                            <td class="text-end">MKD {{ formatNumber(item.price) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Subtotal</td>
                            <td class="text-end">MKD {{ formatNumber(order.subtotal) }}</td>
                        </tr>

                        <tr>
                            <td colspan="3" class="text-end">Tax</td>
                            <td class="text-end">MKD {{ formatNumber(order.tax) }}</td>
                        </tr>

                        <tr>
                            <td colspan="3" class="text-end text-bold"><strong>Grand Total</strong></td>
                            <td class="text-end text-bold"><strong>MKD {{ formatNumber(order.total_price) }}</strong></td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>

        <!-- Documents Section -->
        <div class="card mb-4">
            <div class="card-header">
                Documents
            </div>
            <div class="card-body">
                <ul>
                    <li v-for="document in documents"><a :href="document.url" target="_blank" class="text-capitalize">{{
                        document.name.replace('_url',
                            '').replace('_', ' ')
                    }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
export default {
    name: "OrderDetail",
    layout: FrontLayout,
    components: {

    },
    props: {
        order: Object,
    },
    data() {
        return {
            order_items: this.order.order_items,
            documents: this.order.documents,
            order_detail: this.order.order_detail
        }
    },
    mounted() {
        console.log(this.order)
    },
    methods: {
        formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>
