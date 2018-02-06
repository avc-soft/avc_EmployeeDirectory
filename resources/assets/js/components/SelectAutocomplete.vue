<template>
    <autocomplete :classes="{ input: 'form-control' }"
            url="/employees"
            anchor="name"
            param="searchQuery"
            :min="4"
            :customParams="{ getAll: '' }"
            :on-select="getData"
            :onAjaxLoaded="ajaxLoaded">
    </autocomplete>

</template>


<script>

    import Autocomplete from 'vue2-autocomplete-js';

    export default {

        components: { Autocomplete },

        methods: {
            getData(data){
                console.log(data);
            },
            ajaxLoaded(data){
                console.log(data);
            }
        }
    };

</script>