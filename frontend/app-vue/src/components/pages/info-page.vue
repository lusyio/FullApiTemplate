<template>
  <main class="website-main--outer website-auth-main--outer">
    <login-screen v-if="!$store.state.user.id"></login-screen>
    <div v-else class="info-page--outer container">
      <div class="info-page--inner">
        <component :is="possibleScreens[activeScreenIndex].component"></component>
      </div>
    </div>
  </main>
</template>

<script>
import AccountScreen from '../screens/info/account-screen.vue';
import PagesScreen from "@/components/screens/info/pages-screen.vue";

const defaultScreen = 'accountScreen';
export default {
  data() {
    return {
      activeScreenIndex: defaultScreen,
      possibleScreens: {
        accountScreen: {
          component: 'account-screen'
        },
        pagesScreen: {
          component: 'pages-screen'
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
      let desiredScreen = $route.query.infoScreen;
      if (!this.possibleScreens[desiredScreen]) {
        desiredScreen = defaultScreen;
      }
      this.activeScreenIndex = desiredScreen;
    }
  },
  components: {
    AccountScreen,
    PagesScreen,
  }
}


</script>

<style lang="scss">
.info-page--outer {
  width: 100%;
}

.info-page--inner {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}
</style>