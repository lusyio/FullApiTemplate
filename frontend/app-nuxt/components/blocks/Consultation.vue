<template>
  <div class="consultation-screen--outer">
    <div class="consultation-screen--inner">
      <div class="consultation-screen--content-left">
        <h6 class="consultation-screen--content-left-title">{{consultation.title}}</h6>
        <p class="consultation-screen--content-left-text">
          {{consultation.text_left}}
        </p>
      </div>
      <div class="consultation-screen--content-right">
        <p class="consultation-screen--content-right-text">
          {{consultation.text_right}}
        </p>
        <ButtonMakeRequestToOrder :text="consultation.text_button" image="/images/icons/arrow-45deg.svg"
                                  :isColorWhite="true"></ButtonMakeRequestToOrder>
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
    consultation: {
      type: Object,
      required: true
    }
  },
})
</script>
