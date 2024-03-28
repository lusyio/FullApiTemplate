<template>
  <div>
    <h1>Личный кабинет</h1>
    <p>Добро пожаловать, {{ username }}</p>
  </div>
</template>

<script>
export default {
  name: 'Account',
  data() {
    return {
      username: 'TestUser' // Тестовые данные для имени пользователя
    }
  }
}
</script>

<style lang="scss">
</style>
