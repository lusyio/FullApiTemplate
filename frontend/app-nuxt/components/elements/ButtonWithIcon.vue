<template>
  <component :is="tagName" :to="route" :class="['button-with-icon', {'button-with-icon-not-main': !isMain }]">
    {{ text }}
    <img v-if="image" :src="image" alt=""/>
  </component>
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