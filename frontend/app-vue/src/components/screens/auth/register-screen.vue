<template>
    <form @submit.prevent="submitForm" class="auth-form">
        <div class="auth-form--title-block">
            <h1 class="auth-form--title">Регистрация</h1>
            <v-btn route="/info?infoScreen=accountScreen" text="Войти в аккаунт" color="white"></v-btn>
        </div>
        <div class="auth-form--input-block">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="models.email">
        </div>
        <div class="auth-form--input-block">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="models.password">
        </div>
        <v-btn type="submit" text="Продолжить" color="primary"></v-btn>
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
        this.redirectAuthenticated(this.$store.state.user.id);
    },
    watch: {
        '$store.state.user.id'(v) {
            this.redirectAuthenticated(v);
        }
    },
    methods: {
        redirectAuthenticated(id) {
            if (id) {
                this.$router.push('/')
            }
        },
        getClearModels() {
            return {
                email: '',
                password: '',
            }
        },
        async submitForm() {
            let resp = await window._$http.post('/auth/sign-up-by-email', this.models);
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