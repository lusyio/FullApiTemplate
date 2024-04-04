<template>
  <Header v-if="isReady" :isMain="false"/>
  <div class="website-main--outer" v-if="isReady">
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
      <BlocksExperts v-if="experts" :isMain="false" :experts="experts"></BlocksExperts>
      <BlocksEquipment v-if="equipment" :equipment="equipment"></BlocksEquipment>
      <BlocksHowWeWork></BlocksHowWeWork>
      <BlocksConsultation></BlocksConsultation>
      <BlocksCertificates :certificates="certificates"></BlocksCertificates>
      <BlocksContacts></BlocksContacts>
    </div>
  </div>
   <div class="website-main--outer-loading" v-else>
    <p>LOADING...</p>
  </div>
  <Footer v-if="isReady"/>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      service: null,
      advantages: null,
      certificates: null,
      services: null,
      experts: null,
      equipment: null,
      isReady: false,
    }
  },
  async mounted() {
    const slug = this.$route.params.slug;
    try {
      const [serviceResp, blocksResp] = await Promise.all([
        axios.get(`http://localhost:8000/api/blocks/services/${slug}`),
        axios.get(`http://localhost:8000/api/blocks`)
      ]);

      if (serviceResp.data.result && blocksResp.data.result) {
        this.service = {
          pageTitle: serviceResp.data.service.title,
          pageDescription: serviceResp.data.service.description,
          serviceImage: serviceResp.data.service.content.service_image,
          serviceImageMobile: serviceResp.data.service.content.service_image_mobile,
        };
        this.advantages = blocksResp.data.blocks.Advantages;
        this.certificates = blocksResp.data.blocks.Certificates;
        this.services = blocksResp.data.blocks.Services;
        this.experts = blocksResp.data.blocks.Experts;
        this.equipment = blocksResp.data.blocks.Equipment
        this.isReady = true
      } else {
        this.$router.push('/');
      }
    } catch (error) {
      console.error('Ошибка при отправке запроса:', error);
    }
  },
}
</script>

<style lang="scss">
</style>
