<template>
  <div>
    <DefaultLayout>
      <NuxtPage/>
    </DefaultLayout>
  </div>
</template>

<script>
import DefaultLayout from "./layout/DefaultLayout.vue";
import './assets/styles/style.scss'
export default {
  components: {
    DefaultLayout
  }
}
</script>

<style lang="scss">
/* Ваши стили здесь */
</style>
