<template>
    <div>
        <div class="panel panel-default" v-if="dataReady">
            <div class="panel-heading">
                <h3 class="panel-title">Fields</h3>
            </div>
            <div class="panel-body">
                <template v-if="plots.length">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Seeding</th>
                                    <th>Area</th>
                                </tr>
                            </thead>

                            <tbody>
                                <plot v-for="plot in plots" :data="plot" :key="plot.id"></plot>
                            </tbody>
                        </table>
                    </div>

                    <pagination :data="laravelData" v-on:pagination-change-page="getResults"></pagination>
                </template>

                <template v-else>
                    No results found!
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import Plot from "./Plot.vue";

    export default {
        components : { Plot },

        data() {
            return {
                plots: [],
                laravelData: {},
                dataReady: false
            }
        },

        created() {
            this.getResults();
        },

        methods: {
            getResults(page) {
                page = page || 1;

                axios.get('plots', {
                    params: {
                        page: page,
                        search: this.search,
                    }
                }).then((response) => {
                   let a = JSON.parse(JSON.stringify(response.data.data));
                    console.log(a);
                    this.laravelData = response.data;
                    this.plots = response.data.data;
                }).catch((error) => {
                    console.log(error);
                }).then(() => {
                    this.dataReady = true;
                });
            }
        }
    }
</script>