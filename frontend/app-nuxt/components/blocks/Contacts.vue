<template>
  <div class="contacts-screen--outer">
    <div class="contacts-screen--inner">
      <div class="contacts-screen--content">
        <h2 class="contacts-screen--title">Контакты</h2>
        <div class="contacts-screen--content-info">
          <div class="contacts-screen--content-info-item">
            <h6 class="contacts-screen--content-info-item-title">Электроннаыя почта</h6>
            <div class="contacts-screen--content-info-item-block">
              <picture>
                <img src="/public/images/icons/mail.svg" alt="Электронная почта"/>
              </picture>
              <p class="contacts-screen--content-info-item-block-text">{{contacts.email}}</p>
            </div>
          </div>
          <div class="contacts-screen--content-info-item">
            <h6 class="contacts-screen--content-info-item-title">Номер телефона</h6>
            <div class="contacts-screen--content-info-item-block">
              <picture><img src="/public/images/icons/phone.svg" alt="Номер телефона"/></picture>
              <p class="contacts-screen--content-info-item-block-text">{{contacts.phone}}</p>
            </div>
          </div>
          <div class="contacts-screen--content-info-item">
            <h6 class="contacts-screen--content-info-item-title">Адрес</h6>
            <div class="contacts-screen--content-info-item-block">
              <picture>
                <img src="/public/images/icons/map-pin.svg" alt="Адрес"/>
              </picture>
              <p class="contacts-screen--content-info-item-block-text">
                {{ contacts.address }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="contacts-screen--map">
        <img src="/public/images/map.jpg" alt="Карта"/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    contacts: {
      type: Object,
      required: true
    },
  },
}
</script>
