import Vuex from 'vuex';
import page from './modules/page';
import device from './modules/device';
import user from './modules/user';



const store = new Vuex.Store({
    modules: {
        page, device, user
    },
    state: {
        year: (new Date()).getFullYear(),
        appReady: false,
        appBroken: false
    },
    mutations: {
        changeCoreProps(state, data) {
            Object.assign(state, data);
        }
    },
    actions: {
        async init(store) {
            store.dispatch('initDevice');
            await store.dispatch('initApp');
            store.commit('changeCoreProps', { appReady: true });
        },
        async initApp(store) {
            let resp = await window._$http.get('/get-app-data');
            console.log('Resp is');
            console.log(resp);
            if (resp) {
                store.commit('setUser', resp.user);
                store.commit('changeCoreProps', { appReady: true });
                return;
            }
            store.commit('changeCoreProps', { appBroken: true, appReady: true });
            console.log('App state is')
            console.log(store.state);
        }
    }
});


export default store;
