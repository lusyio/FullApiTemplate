<template>
  <header class="website-page-header--outer">
    <div class="website-page-header--inner container">
      <div class="website-page-header--navigation-desktop">
        <div class="website-page-header-navigation-list">
          <router-link to="/" class="website-page-header-navigation-link">Главная страница</router-link>
          <router-link v-if="this.$store.state.user.id" to="/info?infoScreen=pagesScreen"
                       class="website-page-header-navigation-link">Управление блоками
          </router-link>
          <router-link v-if="this.$store.state.user.id" to="/info?infoScreen=accountScreen"
                       class="website-page-header-navigation-link">Мой
            аккаунт
          </router-link>
          <router-link v-else to="/info?infoScreen=accountScreen"
                       class="website-page-header-navigation-link">Вход
          </router-link>
        </div>
      </div>
    </div>
  </header>
</template>


<style lang="scss">
.website-page-header--outer {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: rem(50px);
  width: 100%;
}

.website-page-header--inner {
  display: flex;
  width: 100%;
  align-items: center;
  justify-content: flex-end;
  position: relative;
}

.website-page-header-navigation-list {
  list-style: none;
  display: flex;
  gap: rem(30px);
}

.website-page-header-navigation-link {
  font-family: var(--font-family);
  font-weight: 700;
  font-size: rem(16px);
  text-align: center;
  color: var(--color-white);
  text-decoration: none;
}
</style>
<script setup>
</script>