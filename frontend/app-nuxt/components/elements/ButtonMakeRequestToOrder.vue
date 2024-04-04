<template>
  <component :is="tagName" :to="route" :class="['button-with-icon', {'button-with-icon-not-main': !isMain }]">
    {{ text }}
    <img v-if="image" :src="image" alt=""/>
  </component>
  <button class="welcome-screen-right-button">
    <span>Запросить расчет испытаний</span>
    <picture>
      <img src="/images/icons/arrow-45deg.svg" alt="Оставить заявку"/>
    </picture>
  </button>
</template>

<script>
export default {
  props: {
    image: {
      type: String,
      required: true
    },
    text: {
      type: String,
      required: true
    },
    route: {
      type: String,
      default: null
    },
    isMain: {
      type: Boolean,
      required: true
    },
  },
  computed: {
    tagName() {
      return this.route ? 'nuxt-link' : 'button';
    }
  }
}
</script>