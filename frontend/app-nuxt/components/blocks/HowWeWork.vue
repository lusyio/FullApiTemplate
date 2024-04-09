<template>
  <div v-if="howWeWork" class="howWeWork-screen--outer">
    <div class="howWeWork-screen--inner">
      <h2 class="howWeWork-screen--title">{{ howWeWork.title }}</h2>
      <div class="howWeWork-screen--content">
        <ul class="howWeWork-screen--content-items">
          <li v-for="(item, index) in howWeWork.items" :key="index" class="howWeWork-screen--content-items-item">
            <picture>
              <img :src="item.image" :alt="item.text"/>
            </picture>
            <h6 class="howWeWork-screen--content-items-item-title">{{ item.text }}</h6>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    howWeWork: {
      type: Object, // Изменен тип на Object, так как ваше свойство howWeWork является объектом, а не массивом
      required: true
    }
  }
}
</script>
