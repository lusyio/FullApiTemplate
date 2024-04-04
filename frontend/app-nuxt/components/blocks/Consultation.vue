<template>
  <div class="consultation-screen--outer">
    <div class="consultation-screen--inner">
      <div class="consultation-screen--content-left">
        <h6 class="consultation-screen--content-left-title">СТРОЙЭКСПЕРТ</h6>
        <p class="consultation-screen--content-left-text">
          Получите консультацию экспертов по необходимым испытаниям
        </p>
      </div>
      <div class="consultation-screen--content-right">
        <p class="consultation-screen--content-right-text">
          Оставьте заявку, и наш менеджер свяжется с Вами в течение дня
        </p>
        <ButtonMakeRequestToOrder text="Получить консультацию и узнать стоимость" image="/images/icons/arrow-45deg.svg" :isColorWhite="true"></ButtonMakeRequestToOrder>
      </div>
    </div>
  </div>
</template>

<script>

import {defineComponent} from "vue";
import ButtonMakeRequestToOrder from "../elements/ButtonMakeRequestToOrder.vue";

export default defineComponent({
  components: {ButtonMakeRequestToOrder}
})
</script>
