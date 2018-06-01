<template>
    <tr>
        <td>{{ plot.id }}</td>
        <td>{{ plot.name }}</td>
        <td>{{ plot.crop }}</td>
        <td>{{ plot.area }}</td>
    </tr>
</template>

<script>
    export default {
        props : ['data'],

        data() {
            return {
                plot: this.data
            }
        }
    }
</script>
