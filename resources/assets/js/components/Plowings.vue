<template>
    <div>
        <div class="panel panel-default col-md-3 ">
            <div class="panel-heading">
                <h3 class="panel-title">Filters</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="plot">Plot name</label>
                    <input v-model="plot" class="form-control" id="plot">
                </div>

                <div class="form-group">
                    <label for="crop">Seeding name</label>
                    <input v-model="crop" class="form-control" id="crop">
                </div>

                <div class="form-group">
                    <label for="tractor">Truck name</label>
                    <input v-model="tractor" class="form-control" id="tractor">
                </div>

                <div class="form-group">
                    <label for="from">From date</label>
                    <input v-model="fromDate" class="form-control datepicker" id="from">
                </div>

                <div class="form-group">
                    <label for="to">To date</label>
                    <input v-model="toDate" class="form-control datepicker" id="to">
                </div>

                <div class="form-group text-right">
                    <label class="hidden-sm hidden-xs">&nbsp;</label>
                    <button class="btn btn-success form-control" @click="getResults()">Search</button>
                </div>
            </div>
        </div>

        <div class="panel panel-default col-md-9" v-if="dataReady">
            <div class="panel-heading">
                <h3 class="panel-title">Statistics</h3>
            </div>
            <div class="panel-body">
                <template v-if="plowings.length">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Field Name</th>
                                <th>Seeding Name</th>
                                <th>Plowing date</th>
                                <th>Truck Name</th>
                                <th>Field Area</th>
                                <th v-if="isLogged" class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                <plowing v-for="plowing in plowings" :data="plowing" :key="plowing.id" @deleted="removePlowing"></plowing>
                            </tbody>
                        </table>
                        <span>Total area: {{ totalArea }}</span>
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
    import Plowing from "./Plowing.vue";

    export default {
        components : { Plowing },

        data() {
            return {
                plowings: [],
                laravelData: {},
                plot: '',
                crop: '',
                tractor: '',
                fromDate: '',
                toDate: '',
                dataReady: false,
                totalArea: 0
            }
        },

        created() {
            this.getResults();
        },

        methods: {
            getResults(page) {
                page = page || 1;

                axios.get('plot-tractor', {
                    params: {
                        page: page,
                        plot: this.plot,
                        crop: this.crop,
                        tractor: this.tractor,
                        fromDate: this.fromDate,
                        toDate: this.toDate
                    }
                }).then((response) => {
                    this.laravelData = response.data.paginate;
                    this.plowings = response.data.paginate.data;
                    this.totalArea = response.data.totalArea;
                }).catch((error) => {
                    console.log(error);
                }).then(() => {
                    this.dataReady = true;
                });
            },
            removePlowing() {
                this.getResults(this.page);
            }
        }
    }
</script>
