<template>
  <div class="equipment-screen--outer">
    <div class="equipment-screen--inner">
      <div class="equipment-screen--head">
        <div class="equipment-screen--head-titles">
          <h3 class="subtitle">Оборудование</h3>
          <h2 class="title">Используем современное оборудование</h2>
        </div>
        <nav class="equipment-screen--head-menu">
          <button
              v-for="(category, index) in categories"
              :key="index"
              :class="['equipment-screen--head-menu-button', { 'equipment-screen--head-menu-button-active': selectedCategory === category }]"
              @click="selectCategory(category)"
          >
            {{ category }}
          </button>
        </nav>
      </div>
      <div class="equipment-screen--items">
        <div
            v-for="(item, index) in filteredItems"
            :key="index"
            class="equipment--items-item"
        >
          <div class="equipment--items-item-shadow"></div>
          <picture><img :src="item.image" :alt="item.title"/></picture>
          <div class="equipment--items-item-text-block">
            <h6 class="equipment--items-item-title">{{ item.title }}</h6>
            <p class="equipment--items-item-tag">{{ item.category }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedCategory: null,
    };
  },
  props: {
    equipment: {
      type: Object,
      required: true
    },
  },
  computed: {
    categories() {
      return Array.from(new Set(this.equipment.map(item => item.category)));
    },
    filteredItems() {
      return this.selectedCategory ? this.equipment.filter(item => item.category === this.selectedCategory) : this.equipment;
    }
  },
  created() {
    this.selectedCategory = this.categories[0];
  },
  methods: {
    selectCategory(category) {
      this.selectedCategory = category;
    }
  }
};
</script>
