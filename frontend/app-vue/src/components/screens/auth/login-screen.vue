<template>
    <form @submit.prevent="submitForm" class="auth-form">
        <div class="auth-form--input-block">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="models.email">
        </div>
        <div class="auth-form--input-block">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="models.password">
        </div>
        <v-btn type="submit" text="Войти в кабинет" color="primary"></v-btn>
        <v-btn route="/auth?authScreen=registerScreen" text="Зарегистрироваться" color="white"></v-btn>

    </form>
</template>

<script>

export default {
    data() {
        return {
            models: this.getClearModels()
        }
    },
    created() {

    },
    methods: {
        getClearModels() {
            return {
                email: '',
                password: '',
            }
        },
        async submitForm() {
            let resp = await window._$http.post('/auth/sign-in-by-email', this.models);
            let formattedResp = window._$objectStructureFormatter.format({ result: false, msg: '', user: {} }, resp);
            if (formattedResp.result) {
                this.$store.commit('setUser', formattedResp.user);
                return;
            }
            alert(formattedResp.msg);
        }
    }
}
</script>