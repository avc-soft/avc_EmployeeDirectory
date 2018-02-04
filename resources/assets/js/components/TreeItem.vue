<template>
    <div class="tree-item" v-cloak>
        <div class="tree-item-label row"
             :style="indent"
             @click="toggleChildren(employee.id)"
        >
            <div>
                <img src="/artist-icon.png" alt="">
            </div>
                <h4><strong>{{ employee.name }}</strong><br /><small>{{ employee.position.name }}</small></h4>
                <p>
                    Hired at: {{ employee.hired_at }} <br />
                    Salary: USD {{ employee.salary }}
                </p>
        </div>
        <tree-item
                v-if="showChildren"
                v-for="child in children"
                :employee="child"
                :key="child.id"
                :depth="depth + 1"
        ></tree-item>
    </div>
</template>
<script>
    export default {
        props: [ 'employee', 'depth' ],
        name: 'tree-item',
        computed: {
            indent() {
                return { transform: `translate(${this.depth * 50}px)` }
            },
            fetchNeeded() {
                return this.depth < 2;
            }
        },
        data() {
            return {
                showChildren: false,
                children: []
            }
        },
        created(){
            if(this.fetchNeeded){
                this.fetch(this.employee.id);
            }
        },
        beforeMount () {
        },
        methods: {
            fetch(id) {
                axios.get(`/employee/${id}/children`).then(this.refresh);
            },
            refresh(response) {
                this.children = response.data;
            },
            toggleChildren(id) {
                this.showChildren = !this.showChildren;
                this.fetch(id);
            }
        }
    }
</script>
<style>
    [v-cloak] {
        display: none;
    }
    .tree-item {
        margin: 10px;
    }

    .tree-item-label {
        display: inline-block;
        min-width: 300px;
        cursor: pointer;
        padding: 0 10px;
        border: 1px solid #d3e0e9;
        border-radius: 5px;
    }
</style>