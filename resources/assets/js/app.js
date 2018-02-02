
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('grid', require('./components/grid.vue'));
import 'vue-tree-halower/dist/halower-tree.min.css';// you can customize the style of the tree
import VTree from 'vue-tree-halower';

Vue.use(VTree)

var app = new Vue({
    el: '#app',
    data: {
        searchQuery: '',
        gridColumns: ['name', 'power'],
        gridData: [
            { name: 'Chuck Norris', power: Infinity },
            { name: 'Bruce Lee', power: 9000 },
            { name: 'Jackie Chan', power: 7000 },
            { name: 'Jet Li', power: 8000 }
        ]
    }
})

/*
export default {
    name: 'vue-tree',
    data () {
        return {
            searchword: '',
            treeData: [{
                title: 'node1',
                expanded: true,
                children: [{
                    title: 'node 1-1',
                    expanded: true,
                    children: [{
                        title: 'node 1-1-1'
                    }, {
                        title: 'node 1-1-2'
                    }, {
                        title: 'node 1-1-3'
                    }]
                }, {
                    title: 'node 1-2',
                    children: [{
                        title: "<span style='color: red'>node 1-2-1</span>"
                    }, {
                        title: "<span style='color: red'>node 1-2-2</span>"
                    }]
                }]
            }]
        }
    },
    methods: {
        tpl (node, ctx) {
            let titleClass = node.selected ? 'node-title node-selected' : 'node-title'
            if (node.searched) titleClass += ' node-searched'
            return <span>
            <button style='color:blue; background-color:pink' onClick={() => this.$refs.tree.addNode(node, {title: 'sync loading'})}>+</button>
            <span class={titleClass} domPropsInnerHTML={node.title} onClick={() => {
                ctx.parent.nodeSelected(ctx.props.node)
                console.log(ctx.parent.getSelectedNodes())
            }}></span>
            <button style='color:green; background-color:pink' onClick={() => this.asyncLoad(node)}>async loading</button>
            <button style='color:red; background-color:pink' onClick={() => this.$refs.tree.delNode(node.parent, node)}>delete</button>
            </span>
        },
        async asyncLoad (node) {
            // method1:
            this.$refs.tree.addNodes(node, await this.$api.demo.getChild())
            // method2:
            // this.$set(node, 'loading', true)
            // let data = await this.$api.demo.getChild()
            // this.$set(node, 'children', data)
            // this.$set(node, 'loading', false)
            // method3: use concat
        },
        search () {
            this.$refs.tree.searchNodes(this.searchword)
        }
    }
}*/
