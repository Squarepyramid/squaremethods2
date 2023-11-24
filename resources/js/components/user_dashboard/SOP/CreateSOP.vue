<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">SOP</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <img class="rounded-circle mb-3 mt-4" :src="p_cover.url" width="160" height="320">
                        <input class="form-control" v-model="p_cover.text">
                        <div class="mb-3">
                            <Gallery1 @receive_cover="applySelected" :gallery_url="get_uploads" :uploader_url="upload_url" event_chanel="receive_cover" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">New Procedure</p>
                            </div>
                            <div class="card-body">
                                <blockquote v-for="(item, index) in dataArray" :key="index" class="custom-blockquote">
                                    <p>procedure {{index}}</p>
                                    <input v-model="item.procedure" class="form-control" type="text" placeholder="Procedure instruction" aria-label="default input example">
                                    <a :href="item.illustration.url"> {{item.illustration.url}}</a>
                                </blockquote>
                                <div class="mb-3">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <button  @click="addItem"  type="button" class="btn btn-outline-primary"><i class="fa fa-plus"/>&nbsp; procedure </button>
                                        <button @click="removeLastItem" type="button" class="btn btn-outline-danger"><i class="fa fa-minus"/>&nbsp;remove </button>
<!--                                        <button @click="gallery" type="button" class="btn btn-outline-primary"><i class="fa fa-plus"/>&nbsp;Illustration </button>-->
                                        <Gallery1 @receive_cover="applySelected" :gallery_url="get_uploads" :uploader_url="upload_url"  event_chanel="receive_cover" />
                                    </div>
                                    <div style="text-align: right">
                                        <button @click="publish" class="btn btn-primary btn-sm" type="button"><i class="fa fa-save"/>Publish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <dialog_loader :show="loader"/>
</template>

<script>
import Gallery1 from "../../opencomponent/gallery_dialog/Gallery.vue";
import Cover from "../Cover/cover.vue";
import cover from "../Cover/cover.vue";
import dialog_loader from "../../opencomponent/dialog_loader/dialog_loader.vue";

export default {
    name: "CreateSOP",
    components:{Cover, Gallery1,dialog_loader},
    props:['upload_url','get_uploads','sop_url']
    ,
    data() {
        return {
            dataArray: [],
            newItem: { id: 1, illustration: 'url', procedure: '' },
            selectedImages:[],
            procedureData:[],
            cover:false,
            p_cover:{'url':'assets/img/dogs/image2.jpeg','text':''},
            loader:false
        };
    },
    mounted() {
        console.log("upload_url",this.upload_url);
        console.log("get_uploads",this.get_uploads);
    }
    ,
    methods: {
        toast(text,bgColor){
            Toastify({
                text: text,
                className: "info",
                style: {
                    background: bgColor,
                }
            }).showToast();
        },
        receive_cover_(file){
            this.cover =file[0];
        },
        isImageFileType(file) {
            if (file.type && file.type.includes('image')) {
                return true;
            }
            return false;
        },
        applySelected(items_selected){
            if(this.cover) {
                //alert("hi");
                this.selectedImages = items_selected;
                // this.newItem.image=items_selected;
                this.dataArray[this.dataArray.length - 1].illustration = items_selected[0];
                console.log("image", this.dataArray);
            }
            else{
                //alert('cover');
                this.p_cover =items_selected[0];
                this.cover=true;
            }
        },
        removeLastItem() {
            if (this.dataArray.length > 0) {
                this.dataArray.pop(); // Remove the last item from the array
            }
        },
        addItem() {
            //alert('hi');
            this.dataArray.push({ ...this.newItem }); // Add a new item to the array
            //this.procedureData.push(...{'illustration_id':0,'cover_id':0,'procedure':''});
        },
        async publish() {
            // alert('hi');
            this.procedureData = [];
            this.dataArray.forEach((item) => {
                this.procedureData.push({
                    'illustration_id': item.illustration.id,
                    'cover_id': this.p_cover.id,
                    'procedure': item.procedure
                });
            })
            this.loader = true;
            let data = {'procedure': this.procedureData, 'cover_id': this.p_cover.id,'cover_text':this.p_cover.text};
            let res = await axios.post(this.sop_url, data);
            this.loader=false;
            this.toast(res.data.message,'green');
            //console.log(JSON.stringify(data));
        }
    }
}
</script>

<style scoped>
.custom-blockquote {
    border-left: 5px solid #0069d9; /* Adjust the color and width as needed */
    padding-left: 15px; /* Adjust the padding as needed */
    background-color: #f5f5f5; /* Optional background color */
}
</style>
