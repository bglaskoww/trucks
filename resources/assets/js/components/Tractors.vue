<template>
    <div>
        <div class="panel panel-default" v-if="dataReady">
            <div class="panel-heading">
                <h3 class="panel-title">Trucks</h3>
            </div>
            <div class="panel-body">
                <template v-if="tractors.length">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tractor v-for="tractor in tractors" :data="tractor" :key="tractor.id"></tractor>
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
    import Tractor from "./Tractor.vue";

    export default {
        components : { Tractor },

        data() {
            return {
                tractors: [],
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

                axios.get('tractors', {
                    params: {
                        page: page,
                        search: this.search,
                    }
                }).then((response) => {
                    this.laravelData = response.data;
                    this.tractors = response.data.data;
                }).catch((error) => {
                    console.log(error);
                }).then(() => {
                    this.dataReady = true;
                });
            }
        }
    }
</script>