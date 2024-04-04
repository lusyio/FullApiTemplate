<template>
  <Header :isMain="false"/>
  <div class="website-main--outer">
    <div class="website-main--inner">
      <div v-if="service" class="preview-screen--outer">
        <div class="preview-screen--inner">
          <div class="preview-screen--info">
            <div class="preview-screen--info-bread preview-screen--info-bread-mobile">
              <span class="preview-screen--info-bread-link">Главная</span> - <span class="preview-screen--info-bread-link-current">{{
                service.pageTitle
              }}</span>
            </div>
            <h1 class="preview-screen--info-title">{{ service.pageTitle }}</h1>
            <p class="preview-screen--info-text">{{ service.pageDescription }}</p>
            <button class="preview-screen--info-button">
              <span>Запросить расчет испытаний</span>
              <picture>
                <img src="/images/icons/arrow-45deg.svg" alt="Запросить расчет испытаний"/>
              </picture>
            </button>
          </div>
          <picture class="preview-screen--pipes-picture">
            <img
                class="preview-screen--pipes"
                :src="service.serviceImage"
                alt="Трубы"/>
          </picture>
          <picture class="preview-screen--pipes-picture-mobile">
            <img
                class="preview-screen--pipes-mobile"
                :src="service.serviceImageMobile"
                alt="Трубы"/>
          </picture>
        </div>
      </div>
      <BlocksExperts :isMain="false"></BlocksExperts>
    </div>
  </div>
  <BlocksEquipment></BlocksEquipment>
  <BlocksHowWeWork></BlocksHowWeWork>
  <BlocksConsultation></BlocksConsultation>
  <BlocksCertificates :certificates="certificates"></BlocksCertificates>
  <BlocksContacts></BlocksContacts>
  <Footer/>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      service: null,
      advantages: [
        {
          title: 'Современное оборудование',
          text: 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
          image: '/images/icons/advantage.svg'
        },
        {
          title: 'Аккредитация "COBACK"',
          text: 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
          image: '/images/icons/advantage.svg'
        },
        {
          title: 'Работа 24/7',
          text: 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
          image: '/images/icons/advantage.svg'
        },
        {
          title: 'Актуальная нормативная база',
          text: 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
          image: '/images/icons/advantage.svg'
        }
      ],
      certificates: [
        {
          'title': 'Документ 1'
        },
        {
          'title': 'Документ 2'
        },
        {
          'title': 'Документ 3'
        },
        {
          'title': 'Документ 4'
        }
      ],
      services: [
        {
          'title': 'Сопровождение объектов строительства',
          'image': '/images/service.jpg'
        }, {
          'title': 'Испытания бетона, кострукций и изделий',
          'image': '/images/service.jpg'
        }, {
          'title': 'Испытание грунтов',
          'image': '/images/service.jpg'
        }, {
          'title': 'Определение характеристик бетона',
          'image': '/images/service.jpg'
        }, {
          'title': 'Испытание строительных материалов',
          'image': '/images/service.jpg'
        }, {
          'title': 'Испытание строительных материалов',
          'image': '/images/service.jpg'
        }, {
          'title': 'Подбор рецептуры бетона и растворов',
          'image': '/images/service.jpg'
        }, {
          'title': 'Неразрушающий контроль бетона',
          'image': '/images/service.jpg'
        }, {
          'title': 'Испытание лакокрасочного покрытия',
          'image': '/images/service.jpg'
        }, {
          'title': 'Определение толщины покрытий',
          'image': '/images/service.jpg'
        }
      ],
    }
  },
  async mounted() {
    const slug = this.$route.params.slug;
    try {
      const resp = await axios.get(`http://localhost:8000/api/services/${slug}`);
      if (resp.data.result) {
        this.service = {
          pageTitle: resp.data.service.title,
          pageDescription: resp.data.service.description,
          serviceImage: resp.data.service.content.service_image,
          serviceImageMobile: resp.data.service.content.service_image_mobile,
        };
        console.log(this.service);
      } else {
        this.$router.push('/');
      }
    } catch (error) {
      console.error('Ошибка при отправке запроса:', error);
    }
  },
}
</script>

<style lang="scss">
</style>
