<template>
  <footer>
    <div class="footer">
      <div class="container">
        <nuxt-link to="/">
          <img class="footer__logo" src="../public/images/logo.svg" srcset="../public/images/logo@2x.svg 2x" alt="Лого" />
        </nuxt-link>
        <p class="footer__copyright">Copyright © 2025 BRIX Agency | All Rights Reserved</p>
        <div class="footer__feedback">
          <p class="footer__feedback-contacts">
            <span class="footer__feedback-contacts-contact footer__feedback-contacts-contact--phone">+7 (925) 577-01-90</span>
            <nuxt-link to="/order" class="footer__feedback-contacts-contact footer__feedback-contacts-contact--order">Оставить заявку</nuxt-link>
          </p>
          <button class="footer__feedback-button">Перезвонить мне</button>
        </div>
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
