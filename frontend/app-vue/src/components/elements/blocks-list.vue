<template>
  <div class="block-list--outer">
    <div v-if="loading" class="block-list--loader">Loading...</div>
    <div v-else class="block-list--inner">
      <div v-for="(block, index) in blocks" :key="index" class="block-list--item">
        <h2 class="block-list--item-title" @click="toggleBlock(index)">{{ block.key }}</h2>
        <div v-if="isOpen(index)" class="block-list--item-content-list">
          <template v-for="(value, key) in block.content" :key="key" >
            <div  class="block-list--item-content-list-item">
              <label v-if="key !== 'items'" :for="key">{{ key }}</label>
              <input v-if="key !== 'items'" :id="key" v-model="block.content[key]">
            </div>
          </template>
          <template v-for="(item, itemIndex) in block.content.items" :key="itemIndex">
            <div class="block-list--item-content-items-list">
              <h3>{{ item.title }}</h3>
              <div v-for="(value, key) in item" :key="key" class="block-list--item-content-list-item">
                <label :for="key">{{ key }}</label>
                <input :id="key" v-model="item[key]">
              </div>
              <img :src="'http://localhost:8010' + item.image" alt="Element Image" style="max-width: 100%; height: auto;" v-if="item.image">
            </div>
          </template>
          <v-btn @click="updateBlock(block)" color="primary" text="Сохранить"></v-btn>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VBtn from "@/components/elements/v-btn.vue";

export default {
  components: {VBtn},
  data() {
    return {
      loading: true,
      blocks: [],
      openBlocks: [] // Добавляем массив для открытых блоков
    };
  },
  methods: {
    async fetchBlocks() {
      try {
        const response = await window._$http.get("/blocks");
        if (response.result && response.blocks) {
          this.blocks = response.blocks;
        }
      } catch (error) {
        console.error("Error fetching blocks:", error);
      } finally {
        this.loading = false;
      }
    },
    async updateBlock(block) {
      try {
        const response = await window._$http.post(
            `/update-block/${block.id}`,
            JSON.stringify(block)
        );
        if (response.result) {
          console.log("Block updated successfully");
        } else {
          console.error("Failed to update block:", response.msg);
        }
      } catch (error) {
        console.error("Error updating block:", error);
      }
    },
    toggleBlock(index) {
      // Check if the block at the given index is open
      if (this.isOpen(index)) {
        // If it's open, set it to false to close it
        this.openBlocks[index] = false;
      } else {
        // If it's closed, set it to true to open it
        this.openBlocks[index] = true;
      }
    },

    isOpen(index) {
      // Проверяем, открыт ли блок по его индексу
      return this.openBlocks[index];
    }
  },
  mounted() {
    this.fetchBlocks();
  }
};
</script>

<style lang="scss">
.block-list--inner {
  display: flex;
  flex-direction: column;
  gap: rem(20);
}

.block-list--item-content-items-list {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: rem(10);
  img {
    width: rem(100);
  }
}

.block-list--item-title {
  font-family: var(--font-family);
  font-weight: 700;
  font-size: rem(24px);
  color: var(--color-bg);
  cursor: pointer;
}

.block-list--item {
  display: flex;
  flex-direction: column;
  gap: rem(10);
}

.block-list--item-content-list {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: rem(10);
}

.block-list--item-content-list-item {
  display: flex;
  justify-content: space-between;

  label {
    font-family: var(--font-family);
    font-weight: 500;
    font-size: rem(16px);
    color: var(--color-bg);
  }

  input {
    width: 65%;
    font-family: var(--font-family);
    font-weight: 500;
    font-size: rem(14px);
    color: var(--color-bg);
    padding: rem(5);
  }
}


</style>
