<template>
  <div v-if="certificates" class="certificates-screen--outer">
    <div class="certificates-screen--inner">
      <div class="certificates-screen--header">
        <div class="certificates-screen--header-titles">
          <h3 class="certificates-screen--header-subtitle">Сертификаты</h3>
          <h2 class="certificates-screen--header-title">Сертификаты лаборатории</h2>
        </div>
        <div class="swiper__buttons">
          <button class="swiper__buttons-button swiper__buttons-button--left" @click="goToPrevSlide">
            <picture>
              <img src="/images/icons/arrow-left.svg" alt="Предыдущий слайд"/>
            </picture>
          </button>
          <button class="swiper__buttons-button swiper__buttons-button--right" @click="goToNextSlide">
            <picture>
              <img src="/images/icons/arrow-right.svg" alt="Следующий слайд"/>
            </picture>
          </button>
        </div>
      </div>
      <div class="certificates-screen--items">
        <div class="swiper swiper-desktop">
          <div class="swiper-wrapper">
            <div v-for="(item, index) in certificates.certs" :key="index" class="swiper-slide certificates-screen--items-item">
              <picture
              ><img
                  class="certificates-screen--items-item-photo"
                  src="/public/images/certificate.jpg"
                  alt="Сертификат"
              /></picture>
              <div class="certificates-screen--items-item-shadow--outer">
                <div class="certificates-screen--items-item-shadow--inner">
                  <div class="certificates-screen--items-item-info">
                    <h6 class="certificates-screen--items-item-info-title">{{ item.title }}</h6>
                    <p class="certificates-screen--items-item-info-extensions">pdf, 2mb</p>
                  </div>
                  <div class="certificates-screen--items-item-download">
                    <img
                        class="certificates-screen--items-item-download-icon"
                        src="/public/images/icons/download.svg"
                        alt="Скачать сертификат"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="certificates-screen--items-mobile">
        <div class="swiper swiper-mobile">
          <div class="swiper-wrapper">
            <div v-for="(item, index) in certificates.certs" :key="index" class="swiper-slide certificates-screen--items-item">
              <picture
              ><img
                  class="certificates-screen--items-item-photo"
                  src="/public/images/certificate.jpg"
                  alt="Сертификат"
              /></picture>
              <div class="certificates-screen--items-item-shadow--outer">
                <div class="certificates-screen--items-item-shadow--inner">
                  <div class="certificates-screen--items-item-info">
                    <h6 class="certificates-screen--items-item-info-title">{{ item.title }}</h6>
                    <p class="certificates-screen--items-item-info-extensions">pdf, 2mb</p>
                  </div>
                  <div class="certificates-screen--items-item-download">
                    <img
                        class="certificates-screen--items-item-download-icon"
                        src="/public/images/icons/download.svg"
                        alt="Скачать сертификат"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import 'swiper/swiper-bundle.css';
import Swiper from 'swiper';

export default {
  props: {
    certificates: {
      type: Array,
      required: true
    }
  },
  mounted() {
    // Инициализация Swiper для десктопной версии
    new Swiper('.swiper-desktop', {
      loop: true,
      slidesPerView: 4,
      spaceBetween: 30,
      navigation: {
        nextEl: '.swiper__buttons-button--right',
        prevEl: '.swiper__buttons-button--left',
      },
    });

    // Инициализация Swiper для мобильной версии
    new Swiper('.swiper-mobile', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
    });
  },
  methods: {
    goToPrevSlide() {
      console.log('Кнопка "Предыдущий слайд" нажата');
    },
    goToNextSlide() {
      console.log('Кнопка "Следующий слайд" нажата');
    }
  }
}
</script>