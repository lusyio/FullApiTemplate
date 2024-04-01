<template>
  <div class="app--outer">
    <div class="app--inner container">
      <DefaultLayout>
        <NuxtPage/>
      </DefaultLayout>
    </div>
  </div>
</template>

<script>
import DefaultLayout from "./layout/DefaultLayout.vue";
import './assets/styles/style.scss'


export default {
  components: {
    DefaultLayout
  },
}
</script>

<style lang="scss">
.app--inner {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 100vh;
  position: relative;
}
</style>
