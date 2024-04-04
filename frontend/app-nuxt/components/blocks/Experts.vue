<template>
  <div v-if="!isMain" class="experts-screen--outer experts--mobile">
    <div class="experts-screen--inner">
      <div class="experts-screen--info experts-screen--info-second-page">
        <h2 class="experts-screen--info-title title">Эксперты в исследовании строительных материалов</h2>
        <div class="experts-screen--info-box">
          <div>
            <p class="experts-screen--info-text">
              Строительная лаборатория СтройЭксперт – команда специалистов объединивших свои усилия
              для выполнения работ в области проектирования, испытания строительных и дорожных
              материалов, обследования зданий и сооружений
            </p>
            <p class="experts-screen--info-text">
              Мы выполняем полное детальное и инструментальное обследование зданий и сооружений, наша
              лаборатория неразрушающего контроля аттестована по ПБ 03-372-00 для выполнения работ
              неразрушающими методами при обследовании и строительстве
            </p>
            <p class="experts-screen--info-text">
              Наша лаборатория разрушающего контроля осуществляет свою деятельность в соответствии с
              законодательством в порядке предусмотренным ГОСТ 17025-2019
            </p>
          </div>
          <div>
            <p class="experts-screen--info-text">
              Строительная лаборатория СтройЭксперт – команда специалистов объединивших свои усилия
              для выполнения работ в области проектирования, испытания строительных и дорожных
              материалов, обследования зданий и сооружений
            </p>
            <p class="experts-screen--info-text">
              Мы выполняем полное детальное и инструментальное обследование зданий и сооружений, наша
              лаборатория неразрушающего контроля аттестована по ПБ 03-372-00 для выполнения работ
              неразрушающими методами при обследовании и строительстве
            </p>
            <p class="experts-screen--info-text">
              Наша лаборатория разрушающего контроля осуществляет свою деятельность в соответствии с
              законодательством в порядке предусмотренным ГОСТ 17025-2019
            </p>
          </div>
        </div>
        <div class="experts-screen--info-director">
          <p class="director-screen--job">Генеральный директор</p>
          <p class="director-screen--name">О.В. Гадалова</p>
        </div>
      </div>
    </div>
    <div class="experts-screen--square"></div>
  </div>
  <div v-if="isMain" class="experts-screen--outer">
    <div class="experts-screen--inner">
      <div class="experts-screen--info">
        <h2 class="experts-screen--info-title">Эксперты в исследовании строительных материалов</h2>
        <p class="experts-screen--info-text">
          Строительная лаборатория СтройЭксперт – команда специалистов объединивших свои усилия для выполнения работ в области проектирования,
          испытания строительных и дорожных материалов, обследования зданий и сооружений
        </p>
        <p class="experts-screen--info-text">
          Мы выполняем полное детальное и инструментальное обследование зданий и сооружений, наша лаборатория неразрушающего контроля аттестована по
          ПБ 03-372-00 для выполнения работ неразрушающими методами при обследовании и строительстве
        </p>
        <p class="experts-screen--info-text">
          Наша лаборатория разрушающего контроля осуществляет свою деятельность в соответствии с законодательством в порядке предусмотренным ГОСТ
          17025-2019
        </p>
      </div>
      <div class="director-screen--inner director-screen--inner-mobile">
        <p class="director-screen--job">Генеральный директор</p>
        <p class="director-screen--name">О.В. Гадалова</p>
      </div>
      <picture>
        <img class="experts-screen--photo" src="/images/expert.jpg" srcset="/images/expert@2x.jpg 2x" alt="Эксперт"/>
      </picture>
    </div>
    <div class="experts-screen--square"></div>
  </div>
  <div v-if="isMain" class="director-screen--outer">
    <div class="director-screen--inner director-screen--inner-desktop">
      <p class="director-screen--job">Генеральный директsор</p>
      <p class="director-screen--name">О.В. Гадалова</p>
    </div>
    <BlocksAdvantages :advantages="advantages"></BlocksAdvantages>
  </div>
</template>
<script>
export default {
  props: {
    isMain: {
      type: Boolean, // Укажите тип данных для isMain
      required: true // Убедитесь, что это обязательный параметр
    },
    advantages: {
      type: Array, // Укажите тип данных для isMain
      required: false // Убедитесь, что это обязательный параметр
    }
  }
}
</script>
