<template>
  <header :class="['page-header--outer', {'page-header--outer-main' : isMain}]">
    <div class="page-header--bgblock"></div>
    <div class="page-header--inner">
      <div class="page-header--left">
        <nuxt-link class="page-header--logo-link" to="/">
          <img class="page-header--logo-img" src="/images/logo.svg" srcset="/images/logo@2x.svg 2x" alt="Лого"/>
        </nuxt-link>
        <nav class="page-header--nav-menu">
          <ButtonWithIcon :isMain="isMain" text="Каталог услуг" :image="isMain ? '/images/icons/arrow-down.svg' : '/images/icons/arrow-down-black.svg'"/>
          <ButtonWithIcon :isMain="isMain" text="Оборудование" :image="isMain ? '/images/icons/arrow-down.svg' : '/images/icons/arrow-down-black.svg'"/>
          <ButtonWithIcon :isMain="isMain" text="Сертификация" :image="isMain ? '/images/icons/arrow-down.svg' : '/images/icons/arrow-down-black.svg'"/>
          <ButtonWithIcon :isMain="isMain" text="Контакты" :image="isMain ? '/images/icons/arrow-down.svg' : '/images/icons/arrow-down-black.svg'"/>
        </nav>
      </div>
      <div class="page-header--right">
        <div class="page-header--right-info">
          <p class="page-header--right-info-phone" :class="{ 'page-header--right-info-phone-not-main': !isMain }">+7 (925) 577-01-90</p>
          <p class="page-header--right-info-callMe">Перезвонить мне</p>
        </div>
        <ButtonWithIcon :isMain="isMain" route="/personal-cabinet" text="Личный кабинет" :image="isMain ? '/images/icons/user.svg' : '/images/icons/user-black.svg'"/>
      </div>
      <div class="page-header--right-mobile">
        <button class="page-header--right-mobile-phone-button">
          <img src="/images/icons/phone-filled.svg" alt="Обратная связь"/>
        </button>
        <button class="page-header--right-mobile-menu-button">
          <img src="/images/icons/burger.svg" alt="Мобильное меню"/>
        </button>
      </div>
    </div>
  </header>
</template>

<script>
import ButtonWithIcon from "./elements/ButtonWithIcon.vue";

export default {
  props: {
    isMain: {
      type: Boolean,
      required: true
    },
  },
  name: 'Header',
  components: {
    ButtonWithIcon
  }
}
</script>

<style lang="scss">
/* Ваши стили здесь */
</style>
