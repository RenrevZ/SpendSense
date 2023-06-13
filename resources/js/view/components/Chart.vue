<template>
    <div>
        <GChart :type="type" :data="chartData" :options="chartOptions" :width="chartWidth" :height="chartHeight" />
    </div>
</template>

<script>
    import { GChart } from 'vue-google-charts';

    export default {
        name: 'GoogleChart',
        components: {
            GChart,
        },
        props: {
            type: {
                type: String,
                required: true,
            },
            chartData: {
                type: Array,
                required: true,
            },
            chartOptions: {
                type: Object,
                default: () => ({}),
            },
            chartWidth: {
                type: String,
                default: '100%',
            },
            chartHeight: {
                type: String,
                default: '300px',
            },
        },
    };
</script>
