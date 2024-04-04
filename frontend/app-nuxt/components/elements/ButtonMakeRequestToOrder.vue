<template>
  <component :is="tagName" :to="route" :class="['make-request-order--button', {'make-request-order--button-white': isColorWhite}, {'make-request-order--button-little': isSizeLittle}]">
    <span>{{ text }}</span>
    <picture v-if="image">
      <img :src="image" :alt="text"/>
    </picture>
  </component>
</template>

<script>
export default {
  props: {
    image: {
      type: String,
      default: null
    },
    text: {
      type: String,
      required: true
    },
    route: {
      type: String,
      default: null
    },
    isColorWhite: {
      type: Boolean,
      default: false
    },
    isSizeLittle: {
      type: Boolean,
      default: false
    },
  },
  computed: {
    tagName() {
      return this.route ? 'nuxt-link' : 'button';
    }
  }
}
</script>
