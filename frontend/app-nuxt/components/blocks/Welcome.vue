<template>
  <div class="welcome-screen--outer">
    <div class="welcome-screen--inner">
      <h1 class="welcome-screen-title">Строительная лаборатория</h1>
      <div class="welcome-screen-right">
        <p class="welcome-screen-right-text">Испытания всех строительных материалов</p>
        <ButtonMakeRequestToOrder text="Запросить расчет испытаний" image="/images/icons/arrow-45deg.svg"></ButtonMakeRequestToOrder>
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
