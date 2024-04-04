<template>
  <div class="advantages-screen--outer">
    <div class="advantages-screen--inner">
      <div class="advantages-screen--items">
        <div v-for="(item, index) in advantages" :key="index" class="advantages--items-item">
          <picture>
            <img :src="item.image" :alt="item.title" />
          </picture>
          <div class="advantages--items-item-text-block">
            <h6 class="advantages--items-item-title">{{ item.title }}</h6>
            <p class="advantages--items-item-text">{{ item.text }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    advantages: {
      type: Array,
      required: true
    }
  }
}
</script>
