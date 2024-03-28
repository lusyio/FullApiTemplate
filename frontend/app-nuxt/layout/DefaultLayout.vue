<template>
  <Header/>
  <div class="website-main--outer">
    <div class="website-main--inner">
      <slot/>
    </div>
  </div>
  <Footer/>
</template>

<script>
import Header from './../components/Header.vue'
import Footer from './../components/Footer.vue'

export default {
  components: {
    Header,
    Footer
  }
}
</script>

<style lang="scss">

</style>
