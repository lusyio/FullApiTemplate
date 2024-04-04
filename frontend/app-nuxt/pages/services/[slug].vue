<template>
  <Header :header="appData.header" v-if="appData.isReady" :isMain="false"/>
  <div class="website-main--outer" v-if="appData.isReady">
    <div class="website-main--inner">
      <div v-if="service" class="preview-screen--outer">
        <div class="preview-screen--inner">
          <div class="preview-screen--info">
            <div class="preview-screen--info-bread preview-screen--info-bread-mobile">
              <span class="preview-screen--info-bread-link">Главная</span> - <span class="preview-screen--info-bread-link-current">{{
                service.pageTitle
              }}</span>
            </div>
            <h1 class="preview-screen--info-title">{{ service.pageTitle }}</h1>
            <p class="preview-screen--info-text">{{ service.pageDescription }}</p>
            <button class="preview-screen--info-button">
              <span>Запросить расчет испытаний</span>
              <picture>
                <img src="/images/icons/arrow-45deg.svg" alt="Запросить расчет испытаний"/>
              </picture>
            </button>
          </div>
          <picture class="preview-screen--pipes-picture">
            <img
                class="preview-screen--pipes"
                :src="service.serviceImage"
                alt="Трубы"/>
          </picture>
          <picture class="preview-screen--pipes-picture-mobile">
            <img
                class="preview-screen--pipes-mobile"
                :src="service.serviceImageMobile"
                alt="Трубы"/>
          </picture>
        </div>
      </div>
      <BlocksExperts v-if="appData.experts" :isMain="false" :experts="appData.experts"></BlocksExperts>
      <BlocksEquipment v-if="appData.equipment" :equipment="appData.equipment"></BlocksEquipment>
      <BlocksHowWeWork></BlocksHowWeWork>
      <BlocksConsultation></BlocksConsultation>
      <BlocksCertificates :certificates="appData.certificates"></BlocksCertificates>
      <BlocksContacts :contacts="appData.contacts"></BlocksContacts>
    </div>
  </div>
  <div class="website-main--outer-loading" v-else>
    <p>LOADING...</p>
  </div>
  <Footer :footer="appData.footer" v-if="appData.isReady"/>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      service: null,
    }
  },
  async mounted() {
    const slug = this.$route.params.slug;
    try {
      const serviceResp = await axios.get(`http://localhost:8000/api/blocks/services/${slug}`);

      if (serviceResp.data.result) {
        this.service = {
          pageTitle: serviceResp.data.service.title,
          pageDescription: serviceResp.data.service.description,
          serviceImage: serviceResp.data.service.content.service_image,
          serviceImageMobile: serviceResp.data.service.content.service_image_mobile,
        };
      } else {
        this.$router.push('/');
      }
    } catch (error) {
      console.error('Ошибка при отправке запроса:', error);
    }
  },
  props: {
    appData: Object,
  }
}
</script>

<style lang="scss">
</style>
