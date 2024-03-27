<template>
  <div
    :class="['app--outer', $store.state.appReady ? 'app--ready' : 'app--loading', { 'app--broken': $store.state.appBroken }]">
    <div v-if="$store.state.appReady">
      <div v-if="$store.state.appBroken" class="app-broken-screen">
        Проблема с подключением к серверу, попробуйте позднее
      </div>
      <div class="app--inner" v-else>
        <website-header></website-header>
        <router-view></router-view>
        <website-footer></website-footer>
      </div>
    </div>
  </div>
</template>

<script>

import WebsiteHeader from '@/components/elements/website-header.vue';
import WebsiteFooter from '@/components/elements/website-footer.vue';

export default {
  components: {
    WebsiteHeader,
    WebsiteFooter,
  },
  created() {
    window._$app = this;
    this.$store.dispatch('init');
  }
}

</script>

<style lang="scss">
.app-broken-screen {
  color: var(--color-warning);
}

.app--inner {
  max-width: rem(1440);
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 100vh;
  position: relative;
}
</style>