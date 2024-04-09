<template>
  <div v-if="!isMain" class="experts-screen--outer experts--mobile">
    <div class="experts-screen--inner">
      <div class="experts-screen--info experts-screen--info-second-page">
        <h2 class="experts-screen--info-title title">{{ experts.title }}</h2>
        <div class="experts-screen--info-box">
          <div>
            <p v-for="(paragraph, index) in experts.items[0]" :key="index" class="experts-screen--info-text">{{ paragraph }}</p>
          </div>
        </div>
        <div class="experts-screen--info-director">
          <p class="director-screen--job">{{ experts.director_job }}</p>
          <p class="director-screen--name">{{ experts.director_name }}</p>
        </div>
      </div>
    </div>
    <div class="experts-screen--square"></div>
  </div>
  <div v-if="isMain" class="experts-screen--outer">
    <div class="experts-screen--inner">
      <div class="experts-screen--info">
        <h2 class="experts-screen--info-title">{{ experts.title }}</h2>
        <p v-for="(paragraph, index) in experts.items[0]" :key="index" class="experts-screen--info-text">{{ paragraph }}</p>
      </div>
      <div class="director-screen--inner director-screen--inner-mobile">
        <p class="director-screen--job">{{ experts.director_job }}</p>
        <p class="director-screen--name">{{ experts.director_name }}</p>
      </div>
      <picture>
        <img class="experts-screen--photo" src="/images/expert.jpg" srcset="/images/expert@2x.jpg 2x" alt="Эксперт"/>
      </picture>
    </div>
    <div class="experts-screen--square"></div>
  </div>
  <div v-if="isMain" class="director-screen--outer">
    <div class="director-screen--inner director-screen--inner-desktop">
      <p class="director-screen--job">{{ experts.director_job }}</p>
      <p class="director-screen--name">{{ experts.director_name }}</p>
    </div>
    <BlocksAdvantages :advantages="advantages"></BlocksAdvantages>
  </div>
</template>

<script>
export default {
  props: {
    isMain: {
      type: Boolean,
      required: true
    },
    advantages: {
      type: Array,
      required: true
    },
    experts: {
      type: Object, // Объект вместо массива
      required: true
    }
  }
}
</script>
