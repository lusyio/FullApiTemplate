<template>
  <div class="welcome-screen--outer">
    <div class="welcome-screen--inner">
      <h1 class="welcome-screen-title">{{welcome.title}}</h1>
      <div class="welcome-screen-right">
        <p class="welcome-screen-right-text">{{welcome.text_right}}</p>
        <ButtonMakeRequestToOrder :text="welcome.text_button" image="/images/icons/arrow-45deg.svg"></ButtonMakeRequestToOrder>
      </div>
    </div>
  </div>
</template>

<script>

import {defineComponent} from "vue";
import ButtonMakeRequestToOrder from "../elements/ButtonMakeRequestToOrder.vue";

export default defineComponent({
  components: {ButtonMakeRequestToOrder},
  props: {
    welcome: {
      type: Object,
      required: true
    }
  },
})
</script>
