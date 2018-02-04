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
                axios.get('/employees/root').then(this.refresh);
            },
            refresh(response) {
                this.employee = response.data;
            }
        },
        components: {
            TreeItem
        }
    }
</script>