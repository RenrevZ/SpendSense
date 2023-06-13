import './bootstrap';

import { createApp } from 'vue';
import Index from './view/Index.vue';
import router from './router/routes';
import VueGoogleCharts from 'vue-google-charts';


const app = createApp(Index);
app.use(router);
app.use(VueGoogleCharts);
app.mount('#app');



