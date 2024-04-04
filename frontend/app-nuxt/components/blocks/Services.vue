<template>
  <div class="services-screen--outer">
    <div class="services-screen--inner">
      <div class="services-screen--head">
        <div class="services-screen--head-titles">
          <h3 class="subtitle">Услуги</h3>
          <h2 class="title">Испытываем, сопровождаем и контролируем все этапы строительства</h2>
        </div>
        <button class="services-screen--head-button" @click="requestCalculation">
          <span>Запросить расчет испытаний</span>
          <picture>
            <img src="/images/icons/arrow-45deg.svg" alt="Запросить расчет испытаний"/>
          </picture>
        </button>
      </div>
      <div class="services-screen--items">
        <div
            v-for="(service, index) in services"
            :key="index"
            class="services-screen--items-item"
        >
          <img :src="service.image" :alt="service.title"/>
          <div class="services-screen--items-item-title">{{ service.title }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
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
