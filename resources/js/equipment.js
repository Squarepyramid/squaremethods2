
import './bootstrap';
import { createApp } from 'vue';
import EquipmentProcedureManager
    from "./components/user_dashboard/Equipment_procedure_manager/EquipmentProcedureManager.vue";


const app = createApp({});
app.component('equipmentsop',EquipmentProcedureManager)


app.mount('#app');
