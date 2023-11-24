<template>

</template>

<script>
import Gallery from "../../opencomponent/gallery_dialog/Gallery.vue";
export default {
    name: "cover",
    components:{Gallery},
    props:['upload_url','get_uploads'],
    methods:{
        receive_cover(file){
            alert("cover")
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
