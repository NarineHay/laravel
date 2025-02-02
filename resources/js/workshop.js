import { createApp } from 'vue';
import App from './workshop/components/App.vue';
import router from './workshop/router';

const app = createApp(App);
app.use(router);
app.mount('#workshop');
