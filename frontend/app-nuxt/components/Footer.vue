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
        <ButtonMakeRequestToOrder text="Перезвонить мне" :is-size-little="true"></ButtonMakeRequestToOrder>
      </div>
    </div>
  </footer>
</template>

<script>
import ButtonMakeRequestToOrder from "./elements/ButtonMakeRequestToOrder.vue";

export default {
  name: 'Footer',
  components: {ButtonMakeRequestToOrder},
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
