<script lang="ts" setup>
async function handleLogout(){
  console.log('logout')
}
</script>

<template>
  <div class=" p-2">
    <ul class=" bg-orange-100 flex flex-grow justify-center">
      <li><nuxt-link to="/">Home</nuxt-link></li>
      <li><nuxt-link to="/auth/dashboard">Dashboard</nuxt-link></li>
      <li><nuxt-link to="/guest/register">Register</nuxt-link></li>
      <li><nuxt-link to="/guest/login">Login</nuxt-link></li>
      <li><nuxt-link to="/#" @click.prevent="handleLogout">Logout</nuxt-link></li>
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
