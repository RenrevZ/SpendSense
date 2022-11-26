import './bootstrap';

import { createApp } from 'vue';
import Index from './view/Index.vue';
import router from './router/routes';

const app = createApp(Index);
app.use(router);
app.mount('#app');



