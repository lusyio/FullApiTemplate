<template>
  <div class="certificates-screen--outer">
    <div class="certificates-screen--inner">
      <div class="certificates-screen--header">
        <div class="certificates-screen--header-titles">
          <h3 class="certificates-screen--header-subtitle">Сертификаты</h3>
          <h2 class="certificates-screen--header-title">Сертификаты лаборатории</h2>
        </div>
        <div class="swiper__buttons">
          <button class="swiper__buttons-button swiper__buttons-button--left">
            <picture>
              <img src="/public/images/icons/arrow-left.svg" alt="Предыдущий слайд"/>
            </picture>
          </button>
          <button class="swiper__buttons-button swiper__buttons-button--right">
            <picture>
              <img src="/public/images/icons/arrow-right.svg" alt="Следующий слайд"/>
            </picture>
          </button>
        </div>
      </div>
      <div class="certificates-screen--items">
        <div class="swiper">
          <div class="swiper-wrapper">
            <div v-for="(item, index) in certificates" :key="index" class="swiper-slide certificates-screen--items-item">
              <picture
              ><img
                  class="certificates-screen--items-item-photo"
                  src="/public/images/certificate.jpg"
                  alt="Сертификат"
              /></picture>
              <div class="certificates-screen--items-item-shadow--outer">
                <div class="certificates-screen--items-item-shadow--inner">
                  <div class="certificates-screen--items-item-info">
                    <h6 class="certificates-screen--items-item-info-title">{{item.title}}</h6>
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
        <div v-for="(item, index) in certificates" :key="index" class="certificates-screen--items-item">
          <picture
          ><img
              class="certificates-screen--items-item-photo"
              src="/public/images/certificate.jpg"
              alt="Сертификат"
          /></picture>
          <div class="certificates-screen--items-item-shadow--outer">
            <div class="certificates-screen--items-item-shadow--inner">
              <div class="certificates-screen--items-item-info">
                <h6 class="certificates-screen--items-item-info-title">{{item.title}}</h6>
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
</template>

<script>

export default {
  props: {
    certificates: {
      type: Array,
      required: true
    }
  },
  mounted() {
    console.log(this.certificates);
  }
}
</script>
