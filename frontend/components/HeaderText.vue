<script setup lang="ts">
const props = defineProps<{
  header: string
  text: string
}>()
</script>

<template>
<div>
  {{ header }}
  <hr/>
  {{ text }}
</div>
</template>

<style scoped>

</style>