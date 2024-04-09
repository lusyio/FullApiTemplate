<template>
  <Header :header="appData.header" v-if="appData.isReady" :isMain="false"/>
  <div class="website-main--outer" v-if="appData.isReady">
    <div class="website-main--inner">
      <div v-if="serviceData" class="preview-screen--outer">
        <div class="preview-screen--inner">
          <div class="preview-screen--info">
            <div class="preview-screen--info-bread preview-screen--info-bread-mobile">
              <span class="preview-screen--info-bread-link">Главная</span> - <span class="preview-screen--info-bread-link-current">{{
                serviceData.title
              }}</span>
            </div>
            <h1 class="preview-screen--info-title">{{ serviceData.title }}</h1>
            <p class="preview-screen--info-text">{{ serviceData.description }}</p>
            <ButtonMakeRequestToOrder :text="serviceData.text_button" image="/images/icons/arrow-45deg.svg"></ButtonMakeRequestToOrder>
          </div>
          <picture class="preview-screen--pipes-picture">
            <img
                class="preview-screen--pipes"
                :src="serviceData.service_image"
                alt="Трубы"/>
          </picture>
          <picture class="preview-screen--pipes-picture-mobile">
            <img
                class="preview-screen--pipes-mobile"
                :src="serviceData.service_image_mobile"
                alt="Трубы"/>
          </picture>
        </div>
      </div>
      <BlocksExperts v-if="appData.experts" :isMain="false" :experts="appData.experts"></BlocksExperts>
      <BlocksEquipment v-if="appData.equipment" :equipment="appData.equipment"></BlocksEquipment>
      <BlocksHowWeWork v-if="appData.howWeWork" :howWeWork="appData.howWeWork"></BlocksHowWeWork>
      <BlocksConsultation v-if="appData.consultation" :consultation="appData.consultation"></BlocksConsultation>
      <BlocksCertificates v-if="appData.certificates" :certificates="appData.certificates"></BlocksCertificates>
      <BlocksContacts v-if="appData.contacts" :contacts="appData.contacts"></BlocksContacts>
    </div>
  </div>
  <div class="website-main--outer-loading" v-else>
    <p>LOADING...</p>
  </div>
  <Footer :footer="appData.footer" v-if="appData.isReady"/>
</template>

<script>

import ButtonMakeRequestToOrder from "../../components/elements/ButtonMakeRequestToOrder.vue";

export default {
  components: {ButtonMakeRequestToOrder},
  data() {
    return {
      serviceData: null,
      services: null,
    }
  },
  props: {
    appData: {
      type: Object,
      required: true
    }
  },
  computed: {
    // Создаем вычисляемое свойство, которое будет ожидать загрузки данных пропса
    isDataLoaded() {
      return this.appData && this.appData.isReady;
    }
  },
  watch: {
    // Следим за изменениями в вычисляемом свойстве
    isDataLoaded: {
      immediate: true, // Вызываем обработчик сразу после создания компонента
      handler(newValue) {
        // Если данные загружены, вызываем нужные действия
        if (newValue) {
          this.handleDataLoad();
        }
      }
    }
  },
  methods: {
    // Метод, который будет вызываться после загрузки данных пропса
    handleDataLoad() {
      this.serviceSlug = this.$route.params.slug;
      if (this.appData.services) {
        this.serviceData = this.appData.services.items[this.serviceSlug]
        if (!this.serviceData) {
          this.$nuxt.$router.push({path: '/'});
        } else {
          this.services = this.appData.services;
          console.log(this.services);
          console.log(this.serviceData);
          return
        }
      }
    }
  }
};
</script>

<style lang="scss">
</style>
