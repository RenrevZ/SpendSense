<template>
    <div>
        <div class="example">
            <apexcharts
                width="100%"
                height="350"
                type="bar"
                :options="chartOptions"
                :series="series"
            ></apexcharts>
        </div>
    </div>
</template>

<script>
    import VueApexCharts from "vue-apexcharts";
    export default {
        components: {
            apexchart: VueApexCharts,
        },
        data: function() {
            return {
                chartOptions: {
                    chart: {
                        id: "basic-bar",
                        animations: {
                            speed: 200
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    plotOptions: {
                        bar: {
                            distributed: true
                        }
                    },
                    xaxis: {
                        categories: [1991, 1992, 1993, 1994, 1995]
                    }
                },
                series: [
                    {
                        name: "series-1",
                        data: [30, 40, 45, 30, 49]
                    }
                ]
            };
        },
        methods: {
            updateTheme(e) {
                this.chartOptions = {
                    theme: {
                        palette: e.target.value
                    }
                };
            }
        }
    }
</script>

<style scoped>

</style>
