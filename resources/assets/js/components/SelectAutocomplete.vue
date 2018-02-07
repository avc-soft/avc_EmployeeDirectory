<template>
    <autocomplete :classes="{ input: 'form-control' }"
            url="/employees"
            anchor="name"
            label="position.name"
            param="searchQuery"
            :customParams="{ getAll: 'true' }"
            :min="4"
            :initValue="$attrs.value"
            :debounce="500"
            :on-select="getData">
    </autocomplete>

</template>


<script>

    import Autocomplete from 'vue2-autocomplete-js';
    require('vue2-autocomplete-js/dist/style/vue2-autocomplete.css')

    export default {

        components: { Autocomplete },

        methods: {
            getData(data){
                document.getElementById('boss_id').value = data.id;
            },
        }
    };

</script>
<style>
    .autocomplete ul {
        z-index: 9999;
    }
</style>