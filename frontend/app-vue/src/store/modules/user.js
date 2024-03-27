import UserModel from "@/models/user-model";

export default {
    state: Object.assign({}, new UserModel()),
    mutations: {
        setUser(state, user) {
            let formattedUser = new UserModel(user);
            Object.assign(state, formattedUser);
        },
    },
    actions: {
        async logout(store) {
            await window._$http.post('/auth/sign-out');
            store.commit('setUser', new UserModel());
        }
    }
}
