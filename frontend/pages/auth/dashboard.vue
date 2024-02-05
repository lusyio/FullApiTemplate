<script lang="ts" setup>
definePageMeta({
  middleware: 'auth-limit'
})
const user = ref({}) 
</script>
<template>
  <div>
    <h2 class="title">Dashboard</h2>
    <p class="text-md">User</p>
    <pre>
      {{ user  }}
    </pre>
  </div>
</template>

<style scoped></style>
