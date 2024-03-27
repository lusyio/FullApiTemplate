import { createRouter, createWebHistory } from 'vue-router';
import WelcomePage from '@/components/pages/welcome-page.vue';
import AuthPage from '@/components/pages/auth-page.vue';
import InfoPage from '../components/pages/info-page.vue';

import store from '@/store';


const routes = [
  {
    path: '/',
    name: 'Welcome page',
    component: WelcomePage,
    meta: { title: 'Web-app platform...' }
  },
  {
    path: '/auth',
    name: 'Auth page',
    component: AuthPage,
    meta: { title: 'Authorization' }
  },
  {
    path: '/info',
    name: 'Info page',
    component: InfoPage,
    meta: { title: 'About' }
  }
];


const router = createRouter({
  history: createWebHistory(),
  routes
});



router.beforeEach((to, from, next) => {
  if(to) {
      if (to.meta && (to.meta.title || to.meta.meta_title)) {
          store.commit('page', to.meta);
      }
  } 
  next();
});

export default router;
