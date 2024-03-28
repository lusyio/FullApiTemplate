<template>
  <div class="app--outer">
    <div class="app--inner container">
      <DefaultLayout>
        <NuxtPage/>
      </DefaultLayout>
    </div>
  </div>
</template>

<script>
import DefaultLayout from "./layout/DefaultLayout.vue";
import './assets/styles/style.scss'
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

export default {
  components: {
    DefaultLayout
  },
  mounted() {
    const swiper = new Swiper(".swiper", {
      loop: true,
      navigation: {
        nextEl: ".swiper__buttons-button--right",
        prevEl: ".swiper__buttons-button--left",
      },
      slidesPerView: 4,
      spaceBetween: 18,
    });
  }
}
</script>

<style lang="scss">
.app--inner {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 100vh;
}
</style>
