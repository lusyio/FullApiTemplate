<template>
    <form @submit.prevent="submitForm" class="auth-form">
        <go-back-btn route="/info?infoScreen=accountScreen"></go-back-btn>

        <h1 class="auth-form--title">Смена пароля</h1>
        <p class="auth-form--description">Введите новый пароль</p>

        <div class="auth-form--input-block">
            <label for="newPassword">Новый пароль</label>
            <input type="password" id="newPassword" v-model="newPassword">
        </div>
        <div class="auth-form--input-block">
            <label for="confirmPassword">Повторите пароль</label>
            <input type="password" id="confirmPassword" v-model="confirmPassword">
        </div>
        <v-btn type="submit" text="Сохранить новый пароль" color="primary"></v-btn>
    </form>
</template>
  
<script>
export default {
    data() {
        return {
            newPassword: '',
            confirmPassword: '',
        }
    },
    methods: {
        async submitForm() {
            if (this.newPassword !== this.confirmPassword) {
                alert('Пароли не совпадают.');
                return;
            }

            let resp = await window._$http.post('/auth/update-password', { password: this.newPassword });
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
