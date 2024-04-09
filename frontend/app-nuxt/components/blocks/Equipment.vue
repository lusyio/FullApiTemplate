<template>
  <div class="equipment-screen--outer">
    <div class="equipment-screen--inner">
      <div class="equipment-screen--head">
        <div class="equipment-screen--head-titles">
          <h3 class="subtitle">Оборудование</h3>
          <h2 class="title">Используем современное оборудование</h2>
        </div>
        <nav class="equipment-screen--head-menu">
          <ButtonMakeRequestToOrder
              v-for="(category, index) in categories"
              :key="index"
              @click="selectCategory(category)"
              :text="category"
              :class="[{ 'make-request-order--button-active': selectedCategory === category }]"
              is-color-white="true"
              :is-size-little="true"
          />
        </nav>
      </div>
      <div class="equipment-screen--items">
        <div
            v-for="(item, index) in filteredItems"
            :key="index"
            class="equipment--items-item"
        >
          <div class="equipment--items-item-shadow"></div>
          <picture><img :src="'http://localhost:8010' + item.image" :alt="item.title"/></picture>
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
import ButtonMakeRequestToOrder from "../elements/ButtonMakeRequestToOrder.vue";

export default {
  components: {ButtonMakeRequestToOrder},
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
      let equipmentArray = Object.values(this.equipment.items);
      return Array.from(new Set(equipmentArray.map(item => item.category)));
    },
    filteredItems() {
      let equipmentArray = Object.values(this.equipment.items);
      return this.selectedCategory ? equipmentArray.filter(item => item.category === this.selectedCategory) : this.equipment;
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
