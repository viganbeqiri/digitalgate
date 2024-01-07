<template>
    <div class="container">
        <TableLite :is-loading="table.isLoading" :columns="table.columns" :rows="table.rows" :total="table.totalRecordCount"
            :sortable="table.sortable" :messages="table.messages" @do-search="doSearch"
            @is-finished="table.isLoading = false"></TableLite>
    </div>
    <div class="q-pa-md">

    </div>
</template>
<script>
import FrontLayout from "../Shares/FrontLayout.vue";
import TableLite from "../Components/TableLite.vue";
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
        TableLite
    },
    props: {
        errors: Object,
        auth: Object,
        orders: Object
    },
    setup() {
        console.log(usePage().props.orders)
        // Table config
        const table = reactive({
            isLoading: false,
            columns: [
                {
                    label: "ID",
                    field: "id",
                    width: "3%",
                    sortable: true,
                    isKey: true,
                },
                {
                    label: "Order No",
                    field: "order_no",
                    width: "10%",
                    sortable: true,
                },
                {
                    label: "Service Type",
                    field: "order_type",
                    width: "15%",
                    sortable: true,
                },

                {
                    label: "Price",
                    field: "total_price",
                    width: "15%",
                    sortable: true,
                },

                {
                    label: "Order Status",
                    field: "order_status",
                    width: "15%",
                    sortable: true,
                },


            ],
            rows: [],
            totalRecordCount: 0,
            sortable: {
                order: "id",
                sort: "asc",
            },
        });

        /**
         * Search Event
         */
        const doSearch = (offset, limit, order, sort) => {
            table.isLoading = true;
            setTimeout(() => {
                table.isReSearch = offset == undefined ? true : false;
                if (offset >= 10 || limit >= 20) {
                    limit = 20;
                }
                if (sort == "asc") {
                    table.rows = sampleData1(offset, limit);
                } else {
                    table.rows = sampleData2(offset, limit);
                }
                table.totalRecordCount = 20;
                table.sortable.order = order;
                table.sortable.sort = sort;
            }, 600);
        };

        // First get data
        doSearch(0, 10, 'id', 'asc');

        return {
            table,
            doSearch,
        };
    },
}
</script>
