<template>
    <tr>
        <td>{{ plowing.id }}</td>
        <td>{{ plowing.plot.name }}</td>
        <td>{{ plowing.plot.crop }}</td>
        <td>{{ dateFormat(plowing.plowing_date) }}</td>
        <td>{{ plowing.tractor.name }}</td>
        <td>{{ plowing.area }}</td>

        <th v-if="isLogged" class="text-right">
            <a class="btn btn-warning" :href="editLink(plowing.id)">Edit</a>
            <button class="btn btn-danger" @click.prevent="deletePlowing(plowing.id)">Delete</button>
        </th>
    </tr>
</template>

<script>
    export default {
        props : ['data'],

        methods : {
            editLink(id) {
                return 'plot-tractor/'+id+'/edit';
            },
            deletePlowing(id) {
                axios.delete('plot-tractor/'+id).then((response) => {
                    console.log(response.data.success);
                    this.$emit('deleted');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            dateFormat: function (date) {
                return moment(date, "MM/DD/YYYY").format('MM/DD/YYYY');
            }
        },

        data() {
            return {
                plowing: this.data
            }
        }
    }
</script>
