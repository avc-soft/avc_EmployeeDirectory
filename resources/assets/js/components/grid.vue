<template>
    <div class="grid">

        <a href="/employees/create" class="btn btn-success pull-left">Add new</a>

        <div class="input-group search-field pull-right">
            <span class="input-group-addon" id="search-addon">Search for</span>
            <input v-model="searchQuery" type="text" class="form-control" placeholder="something..." aria-describedby="search-addon">
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th @click="sortBy('name')">Name</th>
                <th @click="sortBy('position_id')">Position</th>
                <th @click="sortBy('salary')">Salary</th>
                <th @click="sortBy('hired_at')">Hired At</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="employee in employees" :key="employee.id">
                <td>{{ employee.name }}</td>
                <td>{{ employee.position.name }}</td>
                <td>{{ employee.salary }}</td>
                <td>{{ employee.hired_at }}</td>
                <td>
                    <a :href="'/employees/'+employee.id+'/edit'" class="btn btn-xs btn-primary">Edit</a>
                    <a href="#" @click="deleteEntry(employee.id)" class="btn btn-xs btn-danger">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>

        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                dataSet: false,
                employees: [],
                sort: '',
                searchQuery: ''
            };
        },
        created() {
            this.fetch();
        },
        watch: {
            searchQuery() {
                if (this.searchQuery.length > 3){
                    this.fetch();
                }
            }
        },
        methods: {
            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },
            url(page) {
                if (!page) {
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1;
                }
                return `/employees${this.getParams(page)}`;
            },
            getParams(page = 0){
                return `?page=${page}&sortBy=${this.sort}&searchQuery=${this.searchQuery}`;
            },
            refresh({data}) {
                this.dataSet = data;
                this.employees = data.data;
            },
            sortBy(field) {
                this.sort = (this.sort.indexOf('-') !== 0? '-' : '') + field;
                this.fetch();
            },
            deleteEntry(id) {
                if (confirm("Do you really want to delete it?")) {
                    axios.delete(`/employees/${id}`)
                        .then(
                            // reload because of flash message, need to fix that
                            //this.fetch
                            function () {
                                location.reload();
                            }
                        );
                }
            }
        }
    }
</script>
<style>
    .search-field {
        max-width: 500px;
    }
</style>