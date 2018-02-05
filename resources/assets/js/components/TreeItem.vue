<template>
    <div class="tree-item" v-cloak>
        <div class="tree-item-label row"
             :style="indent"
             @click="toggleChildren(employee.id)"
        >
            <div class="avatar pull-left">
                <img src="/storage/artist-icon.png" alt="">
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
                return this.depth < 1;
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
                this.showChildren = true;
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
                if (this.children.length == 0) {
                    console.log(`fetching data for ${id}`);
                    this.fetch(id);
                }
                this.showChildren = !this.showChildren;
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
        min-width: 400px;
        cursor: pointer;
        padding: 0 10px;
        border: 1px solid #d3e0e9;
        border-radius: 5px;
    }
    .tree-item .avatar {
        width: 100px;
        margin-right: 10px;
    }
    .tree-item .avatar img {
        width: 100%;
    }
</style>