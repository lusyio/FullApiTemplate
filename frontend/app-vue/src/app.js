import { createApp } from 'vue'
import './styles/style.scss'
import App from './components/App.vue'
import router from './router/router';
import registry from './plugins/registry';
import http from './modules/http';
import store from './store';

const websiteApp = createApp(App);
registry(websiteApp);
websiteApp.use(store);
websiteApp.use(router);
websiteApp.mount('#app');
