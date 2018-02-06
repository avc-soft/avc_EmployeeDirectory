<template>
    <tree-item :employee="employee" :key="employee.id" :depth="0" ></tree-item>
</template>
<script>
    import TreeItem from './TreeItem.vue'

    export default {
        data() {
            return {
                employee: []
            }
        },

        created(){
            this.fetch();
        },
        methods: {
            fetch() {
                axios.get('/tree/root').then(this.refresh);
            },
            refresh(response) {
                console.log(response);
                this.employee = response.data;
            }
        },
        components: {
            TreeItem
        }
    }
</script>