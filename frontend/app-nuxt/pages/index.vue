<template>
  <Header v-if="isReady" :isMain="true"/>
  <div class="website-main--outer" v-if="isReady">
    <div class="website-main--inner">
      <div class="welcome-screen--outer">
        <div class="welcome-screen--inner">
          <h1 class="welcome-screen-title">Строительная лаборатория</h1>
          <div class="welcome-screen-right">
            <p class="welcome-screen-right-text">Испытания всех строительных материалов</p>
            <button class="welcome-screen-right-button">
              <span>Запросить расчет испытаний</span>
              <picture>
                <img src="/images/icons/arrow-45deg.svg" alt="Оставить заявку"/>
              </picture>
            </button>
          </div>
        </div>
      </div>
      <BlocksExperts v-if="advantages && experts" :isMain="true" :experts="experts" :advantages="advantages"></BlocksExperts>
      <BlocksServices :services="services"></BlocksServices>
      <BlocksEquipment v-if="equipment" :equipment="equipment"></BlocksEquipment>
      <BlocksHowWeWork></BlocksHowWeWork>
      <BlocksConsultation></BlocksConsultation>
      <BlocksCertificates v-if="certificates" :certificates="certificates"></BlocksCertificates>
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
  head() {
    return {
      title: 'Главная страница',
      meta: [
        {charset: 'utf-8'},
        {name: 'viewport', content: 'width=device-width, initial-scale=1'},
        {hid: 'description', name: 'description', content: 'Описание вашего сайта'}
      ],
      link: [
        {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
      ]
    }
  },
  data() {
    return {
      advantages: null,
      certificates: null,
      services: null,
      experts: null,
      equipment: null,
      isReady: false,
    }
  },
  async mounted() {
    try {
      const resp = await axios.get(`http://localhost:8000/api/blocks`);
      console.log(resp);
      if (resp.data.result) {
        this.advantages = resp.data.blocks.Advantages;
        this.certificates = resp.data.blocks.Certificates;
        this.services = resp.data.blocks.Services;
        this.experts = resp.data.blocks.Experts
        this.equipment = resp.data.blocks.Equipment
        this.isReady = true
      }
    } catch (error) {
      console.error('Ошибка при отправке запроса:', error);
    }
  },
}
</script>
