<template>
  <footer class="page-footer--outer">
    <div class="page-footer--inner">
      <nuxt-link to="/">
        <img class="page-footer--logo-image" src="../public/images/logo.svg" srcset="../public/images/logo@2x.svg 2x" alt="Лого"/>
      </nuxt-link>
      <p class="page-footer--copyright">Copyright © 2025 BRIX Agency | All Rights Reserved</p>
      <div class="page-footer-feedback">
        <p class="page-footer-feedback-contacts">
          <span class="page-footer-feedback-phone">+7 (925) 577-01-90</span>
          <nuxt-link to="/order" class="page-footer-feedback-make-order-link">Оставить заявку</nuxt-link>
        </p>
        <button class="footer__feedback-button">Перезвонить мне</button>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer'
}
</script>

<style lang="scss">
</style>
