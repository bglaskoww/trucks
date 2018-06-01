<template>
    <tr>
        <td>{{ tractor.id }}</td>
        <td>{{ tractor.name }}</td>
    </tr>
</template>

<script>
    export default {
        props : ['data'],

        data() {
            return {
                tractor: this.data
            }
        }
    }
</script>
