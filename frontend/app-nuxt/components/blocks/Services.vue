<template>
  <div class="services-screen--outer">
    <div class="services-screen--inner">
      <div class="services-screen--head">
        <div class="services-screen--head-titles">
          <h3 class="subtitle">Услуги</h3>
          <h2 class="title">Испытываем, сопровождаем и контролируем все этапы строительства</h2>
        </div>
        <ButtonMakeRequestToOrder @click="requestCalculation" text="Запросить расчет испытаний" image="/images/icons/arrow-45deg.svg"></ButtonMakeRequestToOrder>
      </div>
      <div class="services-screen--items">
        <nuxt-link
            v-for="(service, index) in services"
            :key="index"
            class="services-screen--items-item"
            :to="`/services/${service.url}`"
        >
          <img :src="service.content.service_image_preview" :alt="service.title"/>
          <div class="services-screen--items-item-title">{{ service.title }}</div>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import ButtonMakeRequestToOrder from "../elements/ButtonMakeRequestToOrder.vue";

export default {
  components: {ButtonMakeRequestToOrder},
  props: {
    services: {
      type: Array,
      required: true
    }
  },
  methods: {
    requestCalculation() {
      console.log('Запрос расчета испытаний');
    }
  }
};
</script>
