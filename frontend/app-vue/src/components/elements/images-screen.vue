
<template>
  <button @click="openModal" class="your-primary-class">Добавить элемент</button>
  <div class="modal" v-if="modalVisible">
    <div class="modal-content">
      <span class="close" @click="closeModal">&times;</span>
      <h2>Добавить элемент</h2>
      <!-- Форма для создания элемента -->
      <form @submit.prevent="createItem" enctype="multipart/form-data">
        <input type="text" v-model="title" placeholder="Заголовок">
        <div v-if="contentElements.length > 0">
          <label>Выберите изображение:</label>
          <select v-model="selectedImage">
            <option v-for="image in contentElements" :key="image.id" :value="image.path">{{ image.name }}</option>
          </select>
        </div>
        <button type="submit" class="your-primary-class">Создать</button>
        <button type="button" @click="closeModal" class="your-secondary-class">Отмена</button>
      </form>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      modalVisible: false,
      title: '',
      selectedImage: null, // Новое свойство для выбранного изображения
      contentElements: [] // Пока оставляем пустым, так как будем заполнять его с сервера
    };
  },
  methods: {
    async openModal() {
      // Выполняем запрос к серверу для получения списка изображений
      try {
        const response = await window._$http.get("/images");
        console.log(response);
        this.contentElements = response.images;
        this.modalVisible = true;
      } catch (error) {
        console.error('Ошибка при загрузке изображений:', error);
      }
    },
    closeModal() {
      this.modalVisible = false;
      this.title = '';
      this.selectedImage = null;
    },
    async createItem() {
      // Выполнение запроса на создание элемента
      const formData = new FormData();
      formData.append('title', this.title);
      formData.append('block_id', 1);
      formData.append('image', this.selectedImage); // Используем выбранное изображение

      // Далее добавьте логику для отправки formData на сервер, например, с помощью axios
      try {
        await axios.post('http://localhost:8010/createItem', formData); // Замените URL на ваш
        console.log('Элемент успешно создан');
      } catch (error) {
        console.error('Ошибка при создании элемента:', error);
      }

      this.closeModal();
    },
    handleImageSelection(image) {
      // Обработка выбора изображения из списка
      this.selectedImage = image;
    }
  },
  mounted() {
    // Выполняем запрос к серверу при загрузке компонента, чтобы получить список изображений
    this.openModal();
  }
}
</script>

<style scoped lang="scss">

</style>
