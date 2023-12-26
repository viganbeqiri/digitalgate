<template>
    
</template>
<script>
import FrontLayout from '../Shares/FrontLayout.vue';
import {usePage, Head, Link, router} from '@inertiajs/vue3'

export default {
    name: "Order",
    layout: FrontLayout,
    components: {
        Link
    },
    data() {
        return {
            order_item: [],
            order_step: [
                {
                    name: 'Download NDA',
                    default: true,
                    completed: false,
                    step: 1,
                    step_name: 'step 1',
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
                    additional_info: {}
                }
            ]
        }
    },
    mounted() {
        this.order_item = JSON.parse(localStorage.getItem('order_item'));
        if (!this.order_item) {
            const originRoute = usePage().url.replace('/order', '')
            router.get(originRoute, {}, {
                preserveScroll: true
            })
        }

        const order_items = this.order_item;
        const order_steps = this.order_step;
        const step = order_steps.find(item => item.step === 2);
        const last_item = order_items[order_items.length - 1];
        step.additional_info = order_items;
        step.name = last_item.name;
        console.log(order_steps)
    }
}
</script>
