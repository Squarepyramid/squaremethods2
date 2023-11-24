<template>
    <ul class="list-group">
        <li v-for="(item, index) in cover" :key="index" class="list-group-item">
            <div class="d-flex bd-highlight">
                <div class="p-2  bd-highlight">{{item.cover.text}}</div>
                <div class="p-2 flex-grow-1 bd-highlight"  style="text-align: right">
                    <div class="btn-group ml-auto" role="group" aria-label="Basic outlined example"> <!-- Apply 'ml-auto' to the btn-group -->
                        <button @click.once="unlink(item)" type="button" class="btn btn-outline-warning"><i class="fa fa-minus"></i> </button>
                        <button @click.once="remove(item)" type="button" class="btn btn-outline-danger"><i class="fa fa-times"></i> </button>
                        <button @click.once="view(item)" type="button" class="btn btn-outline-primary"><i class="fa fa-eye"></i></button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <form @submit.prevent="submit" method="post">
        <select v-model="selected_cover"  class="form-select" multiple aria-label="multiple select example">
            <option selected disabled hidden>Open this select menu</option>
            <option v-for="(item, index) in cover_data_data" :key="index" :value="item">{{item.text}}</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Add Procedure</button>
    </form>
    <dialog_loader :show="this.loader"/>
</template>

<script>
import dialog_loader from "../../opencomponent/dialog_loader/dialog_loader.vue";
export default {
    name: "EquipmentProcedureManager",
    props: ['cover_url','cover_data','form_url','equipment_id','my_cover','view'],
    components:{dialog_loader},
    data(){
        return{
            cover:[],
            cover_data_data:[],
            selected_cover:[],
            loader:false,

        }
    },
    mounted() {
        console.log(this.my_cover);
        this.cover=JSON.parse(this.my_cover);
        this.cover_data_data=JSON.parse(this.cover_data);
    },
    methods:{
        async submit() {
            let ids = this.selected_cover.map(item => item.id);
            this.loader = true;
            let res = await axios.post(this.form_url, {cover_ids: ids, equipment_id: this.equipment_id});
            this.cover = res.data;
            this.loader=false;
            console.log(res.data);
        },
        unlink(procedure){},
        remove(procedure){},
        view(procedure){
            window.open(this.view+"/"+procedure.cover.id, '_blank').focus();
        }
    }
}
</script>

<style scoped>

</style>
