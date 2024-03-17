<script setup lang="ts">
import {ref, onMounted} from 'vue'
import {useRoute} from 'vue-router'

interface Item {
  id: number
  title: string
  url: string
  content: string
}

interface Info {
  items?: Item[]
  title: string
  description: string
}

let info = ref<Info>({title: '', description: ''});
let items = ref<Item[]>([]);

const route = useRoute()

async function fetchData() {
  await useApiFetch('/sanctum/csrf-cookie');
  try {
    const response = await useApiFetch('/api/page/get', {
      method: 'POST',
      body: {
        url: route.path
      },
      headers: {'Content-Type': 'application/json'}
    });

    info.value = response.data.value as Info;
    items.value = info.value.items || [];
  } catch (error) {
    console.error('Ошибка при получении данных:', error);
  }
}


onMounted(() => {
  fetchData();
});

</script>

<template>
  <div v-if="items.length">
    <ul>
      <li v-for="item in items" :key="item.id">
        <nuxt-link :to="'/services/' + item.url">{{ item.title }}</nuxt-link>
      </li>
    </ul>
  </div>
</template>

<style scoped>
#items {
  display: block;
}
</style>