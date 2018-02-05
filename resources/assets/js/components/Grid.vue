<template>
    <div class="grid">

        <div class="input-group">
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
                    <button class="btn btn-xs btn-primary">Edit</button>
                    <button class="btn btn-xs btn-danger">Delete</button>
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
                this.fetch();
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
            refresh({data}) {
                this.dataSet = data;
                this.employees = data.data;
            },
            getParams(page = 0){
                return `?page=${page}&sortBy=${this.sort}&searchQuery=${this.searchQuery}`;
            },
            sortBy(field) {
                this.sort = (this.sort.indexOf('-') !== 0? '-' : '') + field;
                this.fetch();
            }
        }
    }
</script>

<style>
    /*table {
        border: 2px solid #42b983;
        border-radius: 3px;
        background-color: #fff;
    }

    th {
        background-color: #42b983;
        color: rgba(255,255,255,0.66);
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    td {
        background-color: #f9f9f9;
    }

    th, td {
        min-width: 120px;
        padding: 10px 20px;
    }

    th.active {
        color: #fff;
    }*/

    th.active .arrow {
        opacity: 1;
    }

    .arrow {
        display: inline-block;
        vertical-align: middle;
        width: 0;
        height: 0;
        margin-left: 5px;
        opacity: 0.66;
    }

    .arrow.asc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-bottom: 4px solid #fff;
    }

    .arrow.dsc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #fff;
    }
</style>
