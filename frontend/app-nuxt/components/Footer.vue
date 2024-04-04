<template>
  <footer class="page-footer--outer">
    <div class="page-footer--inner">
      <nuxt-link to="/">
        <img class="page-footer--logo-image" :src="footer.logo" srcset="../public/images/logo@2x.svg 2x" alt="Лого"/>
      </nuxt-link>
      <p class="page-footer--copyright">{{footer.copyrights}}</p>
      <div class="page-footer--feedback">
        <p class="page-footer--feedback-contacts">
          <span class="page-footer--feedback-phone">{{footer.phone}}</span>
          <nuxt-link to="#" class="page-footer--feedback-make-order-link">Оставить зявку</nuxt-link>
        </p>
        <button class="page-footer--feedback-button">Перезвонить мне</button>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  props: {
    footer: {
      type: Object,
      required: true
    },
  },
}
</script>

<style lang="scss">
</style>
