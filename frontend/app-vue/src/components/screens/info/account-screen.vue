<template>
    <div class="account-screen">
        <h1 class="account-screen--title">Мой аккаунт</h1>
        <h3 class="account-screen--user-email">{{ this.$store.state.user.email }}</h3>
        <v-btn route="/auth?authScreen=newPasswordScreen" text="Изменить пароль" color="white"></v-btn>
        <v-btn text="Выйти из аккаунта" color="primary" @click="$store.dispatch('logout')"></v-btn>
    </div>
</template>

<script>
export default {

}

</script>

<style lang="scss">
.account-screen {
    width: 100%;
    max-width: rem(600px);
    display: flex;
    flex-direction: column;
    gap: rem(20px);
    box-shadow: 0 rem(2px) rem(20px) 0 var(--color-tone-10);
    background: var(--color-white);
    padding: rem(40px);
    border-radius: rem(5px);
    position: relative;
}

.account-screen--title {
    font-family: var(--font-family);
    font-weight: 700;
    font-size: rem(28px);
    color: var(--color-primary);
}

.account-screen--user-email {
    font-family: var(--font-family);
    font-weight: 700;
    font-size: rem(14px);
    color: var(--color-bg);
    opacity: 0.8;
}

@media (max-width: 560px) {
    .account-screen--title {
        text-align: center;
    }

    .account-screen {
        padding: rem(15px);
    }

}
</style>