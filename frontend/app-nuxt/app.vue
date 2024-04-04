<template>
  <div class="app--outer">
    <div class="app--inner container">
      <DefaultLayout>
        <NuxtPage :appData="appData"/>
      </DefaultLayout>
    </div>
  </div>
</template>

<script>
import DefaultLayout from "./layout/DefaultLayout.vue";
import './assets/styles/style.scss'
import axios from "axios";

export default {
  data() {
    return {
      appData: {
        advantages: null,
        certificates: null,
        services: null,
        experts: null,
        equipment: null,
        header: null,
        footer: null,
        howWeWork: null,
        contacts: null,
        welcome: null,
        consultation: null,
        isReady: false,
      }
    }
  },
  async mounted() {
    try {
      const resp = await axios.get(`http://localhost:8000/api/blocks`);
      console.log(resp);
      if (resp.data.result) {
        this.appData.advantages = resp.data.blocks.Advantages;
        this.appData.certificates = resp.data.blocks.Certificates;
        this.appData.services = resp.data.blocks.Services;
        this.appData.experts = resp.data.blocks.Experts;
        this.appData.equipment = resp.data.blocks.Equipment;
        this.appData.header = resp.data.blocks.Header;
        this.appData.footer = resp.data.blocks.Footer;
        this.appData.contacts = resp.data.blocks.Contacts;
        this.appData.howWeWork = resp.data.blocks.HowWeWork;
        this.appData.consultation = resp.data.blocks.Consultation;
        this.appData.welcome = resp.data.blocks.Welcome;
        this.appData.isReady = true;
      }
    } catch (error) {
      console.error('Ошибка при отправке запроса:', error);
    }
  }, components: {
    DefaultLayout
  },
}
</script>


<style lang="scss">
.app--inner {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 100vh;
  position: relative;
  align-items: center;
}
</style>
