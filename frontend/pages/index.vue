<template>
    <div v-if="page?.blocks?.length">
        <div v-for="block in page.blocks" :key="block.id">
            <HeaderText v-if="block.key === 'HeaderText'" :header="block.data.header" :text="block.data.text" />
        </div>
    </div>
</template>
<script setup lang="ts">
interface Block {
    id: number;
    key: string;
    sort: number;
    data: {
        header: string;
        text: string;
    }
}

interface PageIndex {
    blocks?: Block[];
    title: string;
    description: string;
}
const route = useRoute()

await useApiFetch('/sanctum/csrf-cookie')
const { data: page, error } = await useApiFetch<PageIndex>('/api/page/get', {
    method: 'POST',
    body: {
        url: route.path
    },
})

if (error.value) {
    console.error('Ошибка при получении данных:', error.value)
}

useSeoMeta({
    title: page.value?.title,
    description: page.value?.description,
})
</script>