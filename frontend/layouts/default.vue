<script lang="ts" setup>
const auth = useAuthStore()
async function handleLogout(){
  await auth.logout()
}
</script>

<template>
  <div class=" p-2">
    <ul class=" bg-orange-100 flex flex-grow justify-center">
      <li><nuxt-link to="/">Главная</nuxt-link></li>
      <li><nuxt-link to="/services">Услуги</nuxt-link></li>
      <li><nuxt-link to="/auth/dashboard">Информация</nuxt-link></li>
      <li v-if="!auth.isLoggedIn"><nuxt-link to="/guest/register">Регистрация</nuxt-link></li>
      <li  v-if="!auth.isLoggedIn"><nuxt-link to="/guest/login">Авторизация</nuxt-link></li>
      <li v-if="auth.isLoggedIn"  @click.prevent="handleLogout"><nuxt-link to="/#">Выйти</nuxt-link></li>
    </ul>
    <div class="content">
      <slot />
    </div>
  </div>
</template>

<style>
.content{
  @apply bg-sky-100 h-screen p-3
}
ul li {
  @apply mx-2 my-1 px-4 py-1 w-fit rounded-md hover:bg-amber-50
}
.title {
  @apply text-sky-600 text-xl
}
</style>
