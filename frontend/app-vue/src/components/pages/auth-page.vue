<template>
    <main class="website-main--outer website-auth-main--outer">
        <component :is="possibleScreens[activeScreenIndex].component"></component>
    </main>
</template>

<script>

import LoginScreen from '../screens/auth/login-screen.vue';
import NewPasswordScreen from '../screens/auth/new-password-screen.vue';
import RegisterScreen from '../screens/auth/register-screen.vue';

const defaultScreen = 'loginScreen';
export default {
    data() {
        return {
            activeScreenIndex: defaultScreen,
            possibleScreens: {
                loginScreen: {
                    component: 'login-screen',
                },
                registerScreen: {
                    component: 'register-screen',
                },
                newPasswordScreen: {
                    component: 'new-password-screen',
                },
            }
        }
    },
    created() {
        this.recalculateView(this.$route);
    },
    watch: {
        $route(v) {
            this.recalculateView(v);
        }
    },
    methods: {
        recalculateView($route) {
            let desiredScreen = $route.query.authScreen;
            if (!this.possibleScreens[desiredScreen]) {
                desiredScreen = defaultScreen;
            }
            this.activeScreenIndex = desiredScreen;
        }
    },
    components: {
        LoginScreen,
        NewPasswordScreen,
        RegisterScreen
    }
}


</script>

<style lang="scss">
.website-auth-main--outer {}

.auth-form {
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

.auth-form--title {
    font-family: var(--font-family);
    font-weight: 700;
    font-size: rem(28px);
    color: var(--color-primary);
}

.auth-form--description {
    font-family: var(--font-family);
    font-weight: 400;
    font-size: rem(14px);
    color: var(--color-bg);
    opacity: 0.8;
}

.auth-form--input-block {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: rem(5px);

    label {
        font-family: var(--font-family);
        font-weight: 700;
        font-size: rem(16px);
        color: var(--color-bg);
    }

    input {
        border: rem(0.50px) solid var(--color-bg);
        border-radius: rem(5px);
        padding: rem(12px);
        width: 100%;
        height: rem(43px);
    }

    textarea {
        border: rem(0.50px) solid var(--color-bg);
        border-radius: rem(5px);
        padding: rem(12px);
        width: 100%;
        max-width: 100%;
        min-width: 100%;
        height: rem(100px);
        min-height: rem(100px);
        max-height: rem(150px);
    }

    input:focus,
    textarea:focus {
        border: rem(2px) solid var(--color-bg);
        border-radius: rem(5px);
        padding: rem(12px);
    }

}

.auth-form--forgotPassword-button {
    font-family: var(--font-family);
    font-weight: 400;
    font-size: rem(13px);
    color: var(--color-bg);
    opacity: 0.8;
    text-decoration: none;
}

.auth-form--title-block {
    display: flex;
    justify-content: space-between;
    width: 100%;
    gap: rem(20px);

    .auth-form--title {
        align-self: center;
    }
}

@media (max-width: 560px) {
    .auth-form {
        width: 95%;
    }
}
</style>