<template>
  <Header :header="appData.header" v-if="appData.isReady" :isMain="true"/>
  <div class="website-main--outer" v-if="appData.isReady">
    <div class="website-main--inner">
      <BlocksWelcome v-if="appData.welcome" :welcome="appData.welcome"></BlocksWelcome>
      <BlocksExperts v-if="appData.advantages && appData.experts" :isMain="true" :experts="appData.experts" :advantages="appData.advantages"></BlocksExperts>
      <BlocksServices :services="appData.services"></BlocksServices>
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
  }, props: {
    appData: Object,
  }
}
</script>
