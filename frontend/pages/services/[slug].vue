<template>
    <div>
        Service Content
    </div>
</template>
<script setup lang="ts">
interface PageServicesSlug {
    blocks: any[]
    title: string
    description: string
    items: any[]
}

const route = useRoute('services-slug')
await useApiFetch('/sanctum/csrf-cookie')
const { data: page, error } = await useApiFetch<PageServicesSlug>('/api/page/get', {
    method: 'POST',
    body: {
        url: route.path
    },
})

if (error.value) {
    console.error('Ошибка при получении данных:', error.value)
    throw createError({ statusCode: error.value.statusCode, statusMessage: error.value.statusMessage, fatal: true })
}

useSeoMeta({
    title:page.value?.title,
    description:page.value?.description,
})
</script>