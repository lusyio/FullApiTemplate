<script setup lang="ts">
interface Item {
  id: number
  title: string
  url: string
  content: string
}

interface PageServices {
  items?: Item[]
  title: string
  description: string
}

const route = useRoute()
await useApiFetch('/sanctum/csrf-cookie')
const { data: page, error } = await useApiFetch<PageServices>('/api/page/get', {
    method: 'POST',
    body: {
        url: route.path
    },
})

if (error.value) {
    console.error('Ошибка при получении данных:', error.value)
}
useSeoMeta({
    title:page.value?.title,
    description:page.value?.description,
})
</script>

<template>
  <div v-if="page?.items?.length">
    <ul>
      <li v-for="item in page?.items" :key="item.id">
        <nuxt-link :to="`/services/${item.url}`">{{ item.title }}</nuxt-link>
      </li>
    </ul>
  </div>
</template>