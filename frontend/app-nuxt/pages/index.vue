<!-- pages/index.vue -->
<template>
    <section class="welcome">
      <div class="container">
        <div class="welcome__content">
          <h1 class="welcome__content-title">Строительная лаборатория</h1>
          <div class="welcome__content-right">
            <div class="consultation__content-right">
              <p class="welcome__content-right-text">Испытания всех строительных материалов</p>
              <button class="welcome__content-right-button">
                <span>Запросить расчет испытаний</span>
                <picture>
                  <img src="../public/images/icons/arrow-45deg.svg" alt="Оставить заявку" />
                </picture>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--    <section class="experts">-->
<!--      <div class="container">-->
<!--        <div class="experts__info">-->
<!--          <h2 class="experts__info-title title">Эксперты в исследовании строительных материалов</h2>-->
<!--          <p class="experts__info-text">-->
<!--            Строительная лаборатория СтройЭксперт – команда специалистов объединивших свои усилия для выполнения работ в области проектирования, испытания строительных и дорожных материалов, обследования зданий и сооружений-->
<!--          </p>-->
<!--          <p class="experts__info-text">-->
<!--            Мы выполняем полное детальное и инструментальное обследование зданий и сооружений, наша лаборатория неразрушающего контроля аттестована по ПБ 03-372-00 для выполнения работ неразрушающими методами при обследовании и строительстве-->
<!--          </p>-->
<!--          <p class="experts__info-text">-->
<!--            Наша лаборатория разрушающего контроля осуществляет свою деятельность в соответствии с законодательством в порядке предусмотренным ГОСТ 17025-2019-->
<!--          </p>-->
<!--        </div>-->
<!--        <div class="experts__director">-->
<!--          <p class="experts__director-job">Генеральный директор</p>-->
<!--          <p class="experts__director-name">О.В. Гадалова</p>-->
<!--        </div>-->
<!--        <picture>-->
<!--          <img class="experts__photo" src="./../assets/images/expert.jpg" srcset="./../assets/images/expert@2x.jpg 2x" alt="Эксперт" />-->
<!--        </picture>-->
<!--      </div>-->
<!--      <div class="experts__square"></div>-->
<!--    </section>-->
<!--    <section class="director">-->
<!--      <div class="container">-->
<!--        <p class="director__job">Генеральный директор</p>-->
<!--        <p class="director__name">О.В. Гадалова</p>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="advantages">-->
<!--      <div class="container">-->
<!--        <div class="advantages__items">-->
<!--          <div class="advantages__items-item">-->
<!--            <picture>-->
<!--              <img src="./../assets/images/icons/advantage.svg" alt="Современное оборудование" />-->
<!--            </picture>-->
<!--            <div class="advantages__items-item-line"></div>-->
<!--            <h6 class="advantages__items-item-title">Современное оборудование</h6>-->
<!--            <p class="advantages__items-item-text">-->
<!--              Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку-->
<!--            </p>-->
<!--          </div>-->
<!--          <div class="advantages__items-item">-->
<!--            <picture>-->
<!--              <img src="./../assets/images/icons/advantage.svg" alt="Современное оборудование" />-->
<!--            </picture>-->
<!--            <div class="advantages__items-item-line"></div>-->
<!--            <h6 class="advantages__items-item-title">Современное оборудованиe</h6>-->
<!--            <p class="advantages__items-item-text">-->
<!--              Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку-->
<!--            </p>-->
<!--          </div>-->
<!--          <div class="advantages__items-item">-->
<!--            <picture>-->
<!--              <img src="./../assets/images/icons/advantage.svg" alt="Аккредитация «СовАск»" />-->
<!--            </picture>-->
<!--            <div class="advantages__items-item-line"></div>-->
<!--            <h6 class="advantages__items-item-title">Аккредитация «СовАск»</h6>-->
<!--            <p class="advantages__items-item-text">-->
<!--              Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку-->
<!--            </p>-->
<!--          </div>-->
<!--          <div class="advantages__items-item">-->
<!--            <picture>-->
<!--              <img src="./../assets/images/icons/advantage.svg" alt="Работа 24/7" />-->
<!--            </picture>-->
<!--            <div class="advantages__items-item-line"></div>-->
<!--            <h6 class="advantages__items-item-title">Работа 24/7</h6>-->
<!--            <p class="advantages__items-item-text">-->
<!--              Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку-->
<!--            </p>-->
<!--          </div>-->
<!--          <div class="advantages__items-item">-->
<!--            <picture>-->
<!--              <img src="./../assets/images/icons/advantage.svg" alt="Актуальная нормативная база" />-->
<!--            </picture>-->
<!--            <div class="advantages__items-item-line"></div>-->
<!--            <h6 class="advantages__items-item-title">Актуальная нормативная база</h6>-->
<!--            <p class="advantages__items-item-text">-->
<!--              Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку-->
<!--            </p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="services">-->
<!--      <div class="container">-->
<!--        <div class="services__head">-->
<!--          <div class="services__head-titles">-->
<!--            <h3 class="subtitle">Услуги</h3>-->
<!--            <h2 class="title">Испытываем, сопровождаем и контролируем все этапы строительства</h2>-->
<!--          </div>-->
<!--          <button class="services__head-button">-->
<!--            <span>Запросить расчет испытаний</span>-->
<!--            <picture>-->
<!--              <img src="./../assets/images/icons/arrow-45deg.svg" alt="Запросить расчет испытаний" />-->
<!--            </picture>-->
<!--          </button>-->
<!--        </div>-->
<!--        <div class="services__items">-->
<!--          <div class="services__items-item services__items-item&#45;&#45;1">-->
<!--            <img src="./../assets/images/service.jpg" alt="Услуга" />-->
<!--            <div class="services__items-item-square"></div>-->
<!--            <div class="services__items-item-title">Сопровождение объектов строительства</div>-->
<!--            <button class="services__items-item-open">-->
<!--              <picture>-->
<!--                <img-->
<!--                    src="./../assets/images/icons/arrow-45deg.svg"-->
<!--                    alt="Открыть страницу услуги"-->
<!--                    class="services__items-item-open-arrow" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--          <div class="services__items-item services__items-item&#45;&#45;2">-->
<!--            <img src="./../assets/images/service.jpg" alt="Услуга" />-->
<!--            <div class="services__items-item-square"></div>-->
<!--            <div class="services__items-item-title">Сопровождение объектов строительства</div>-->
<!--            <button class="services__items-item-open">-->
<!--              <picture>-->
<!--                <img-->
<!--                    src="./../assets/images/icons/arrow-45deg.svg"-->
<!--                    alt="Открыть страницу услуги"-->
<!--                    class="services__items-item-open-arrow" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--          <div class="services__items-item services__items-item&#45;&#45;3">-->
<!--            <img src="./../assets/images/service.jpg" alt="Услуга" />-->
<!--            <div class="services__items-item-square"></div>-->
<!--            <div class="services__items-item-title">Сопровождение объектов строительства</div>-->
<!--            <button class="services__items-item-open">-->
<!--              <picture>-->
<!--                <img-->
<!--                    src="./../assets/images/icons/arrow-45deg.svg"-->
<!--                    alt="Открыть страницу услуги"-->
<!--                    class="services__items-item-open-arrow" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--          <div class="services__items-item services__items-item&#45;&#45;4">-->
<!--            <img src="./../assets/images/service.jpg" alt="Услуга" />-->
<!--            <div class="services__items-item-square"></div>-->
<!--            <div class="services__items-item-title">Сопровождение объектов строительства</div>-->
<!--            <button class="services__items-item-open">-->
<!--              <picture>-->
<!--                <img-->
<!--                    src="./../assets/images/icons/arrow-45deg.svg"-->
<!--                    alt="Открыть страницу услуги"-->
<!--                    class="services__items-item-open-arrow" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--          <div class="services__items-item services__items-item&#45;&#45;5">-->
<!--            <img src="./../assets/images/service.jpg" alt="Услуга" />-->
<!--            <div class="services__items-item-square"></div>-->
<!--            <div class="services__items-item-title">Сопровождение объектов строительства</div>-->
<!--            <button class="services__items-item-open">-->
<!--              <picture>-->
<!--                <img-->
<!--                    src="./../assets/images/icons/arrow-45deg.svg"-->
<!--                    alt="Открыть страницу услуги"-->
<!--                    class="services__items-item-open-arrow" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--          <div class="services__items-item services__items-item&#45;&#45;6">-->
<!--            <img src="./../assets/images/service.jpg" alt="Услуга" />-->
<!--            <div class="services__items-item-square"></div>-->
<!--            <div class="services__items-item-title">Сопровождение объектов строительства</div>-->
<!--            <button class="services__items-item-open">-->
<!--              <picture>-->
<!--                <img-->
<!--                    src="./../assets/images/icons/arrow-45deg.svg"-->
<!--                    alt="Открыть страницу услуги"-->
<!--                    class="services__items-item-open-arrow" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
<!--        <button class="services__more">Показать еще</button>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="equipment">-->
<!--      <div class="container">-->
<!--        <div class="equipment__head">-->
<!--          <div class="equipment__head-titles">-->
<!--            <h3 class="subtitle">Оборудование</h3>-->
<!--            <h2 class="title">Используем современное оборудование</h2>-->
<!--          </div>-->
<!--          <nav class="equipment__head-menu">-->
<!--            <button class="equipment__head-menu-button">Бетон</button-->
<!--            ><button class="equipment__head-menu-button">Бетонная смесь</button-->
<!--          ><button class="equipment__head-menu-button">Раствор</button-->
<!--          ><button class="equipment__head-menu-button">Щебень</button>-->
<!--          </nav>-->
<!--        </div>-->
<!--        <div class="equipment__items">-->
<!--          <div class="equipment__items-item">-->
<!--            <div class="equipment__items-item-shadow"></div>-->
<!--            <picture-->
<!--            ><img-->
<!--                srcset="./../assets/images/press-matest@2x.jpg 2x"-->
<!--                src="./../assets/images/press-matest.jpg"-->
<!--                alt="Пресс испытательный Matest"-->
<!--            /></picture>-->
<!--            <h6 class="equipment__items-item-title">Пресс испытательный Matest</h6>-->
<!--            <p class="equipment__items-item-tag">Category</p>-->
<!--          </div>-->
<!--          <div class="equipment__items-item">-->
<!--            <div class="equipment__items-item-shadow"></div>-->
<!--            <picture-->
<!--            ><img-->
<!--                srcset="./../assets/images/press-matest@2x.jpg 2x"-->
<!--                src="./../assets/images/press-matest.jpg"-->
<!--                alt="Пресс испытательный Matest"-->
<!--            /></picture>-->
<!--            <h6 class="equipment__items-item-title">Пресс испытательный Matest</h6>-->
<!--            <p class="equipment__items-item-tag">Category</p>-->
<!--          </div>-->
<!--          <div class="equipment__items-item">-->
<!--            <div class="equipment__items-item-shadow"></div>-->
<!--            <picture-->
<!--            ><img-->
<!--                srcset="./../assets/images/press-matest@2x.jpg 2x"-->
<!--                src="./../assets/images/press-matest.jpg"-->
<!--                alt="Пресс испытательный Matest"-->
<!--            /></picture>-->
<!--            <h6 class="equipment__items-item-title">Пресс испытательный Matest</h6>-->
<!--            <p class="equipment__items-item-tag">Category</p>-->
<!--          </div>-->
<!--          <div class="equipment__items-item">-->
<!--            <div class="equipment__items-item-shadow"></div>-->
<!--            <picture-->
<!--            ><img-->
<!--                srcset="./../assets/images/press-matest@2x.jpg 2x"-->
<!--                src="./../assets/images/press-matest.jpg"-->
<!--                alt="Пресс испытательный Matest"-->
<!--            /></picture>-->
<!--            <h6 class="equipment__items-item-title">Пресс испытательный Matest</h6>-->
<!--            <p class="equipment__items-item-tag">Category</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="howWeWork">-->
<!--      <div class="container">-->
<!--        <h2 class="title">Как мы работаем</h2>-->
<!--        <div class="howWeWork__content">-->
<!--          <picture>-->
<!--            <img src="./../assets/images/how-we-work-bg.png" alt="Подложка" />-->
<!--          </picture>-->
<!--          <ul class="howWeWork__content-items">-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/send-order.svg" alt="Оставляете заявку" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Оставляете заявку</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/send-message.svg" alt="Оставляете заявку" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Оставляете заявку</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/going-to-object.svg" alt="Выезжаем на объект" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Выезжаем на объект</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/get-document.svg" alt="Выдаем заключение" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Выдаем заключение</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/save-document.svg" alt="Храним документации в личном кабинете" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Храним документации в личном кабинете</h6>-->
<!--            </li>-->
<!--          </ul>-->
<!--        </div>-->
<!--        <div class="howWeWork__content&#45;&#45;mobile">-->
<!--          <picture>-->
<!--            <img src="./../assets/images/how-we-work-bg&#45;&#45;mobile.png" alt="Подложка" />-->
<!--          </picture>-->
<!--          <ul class="howWeWork__content-items">-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/send-order.svg" alt="Оставляете заявку" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Оставляете заявку</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/going-to-object.svg" alt="Выезжаем на объект" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Выезжаем на объект</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/get-document.svg" alt="Выдаем заключение" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Выдаем заключение</h6>-->
<!--            </li>-->
<!--            <li class="howWeWork__content-items-item">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/save-document.svg" alt="Храним документации в личном кабинете" />-->
<!--              </picture>-->
<!--              <h6 class="howWeWork__content-items-item-title">Храним документации в личном кабинете</h6>-->
<!--            </li>-->
<!--          </ul>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="consultation">-->
<!--      <div class="container">-->
<!--        <div class="consultation__content">-->
<!--          <div class="consultation__content-left">-->
<!--            <h6 class="consultation__content-left-title">СТРОЙЭКСПЕРТ</h6>-->
<!--            <p class="consultation__content-left-text">-->
<!--              Получите консультацию экспертов по необходимым испытаниям-->
<!--            </p>-->
<!--          </div>-->
<!--          <div class="consultation__content-right">-->
<!--            <p class="consultation__content-right-text">-->
<!--              Оставьте заявку, и наш менеджер свяжется с Вами в течение дня-->
<!--            </p>-->
<!--            <button class="consultation__content-right-button">-->
<!--              <span>Получить консультацию и узнать стоимость</span>-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/arrow-45deg.svg" alt="Оставить заявку" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="certificates">-->
<!--      <div class="container">-->
<!--        <div class="certificates__head">-->
<!--          <div class="certificates__head-titles">-->
<!--            <h3 class="subtitle">Сертификаты</h3>-->
<!--            <h2 class="title">Сертификаты лаборатории</h2>-->
<!--          </div>-->
<!--          <div class="swiper__buttons">-->
<!--            <button class="swiper__buttons-button swiper__buttons-button&#45;&#45;left">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/arrow-left.svg" alt="Предыдущий слайд" />-->
<!--              </picture>-->
<!--            </button>-->
<!--            <button class="swiper__buttons-button swiper__buttons-button&#45;&#45;right">-->
<!--              <picture>-->
<!--                <img src="./../assets/images/icons/arrow-right.svg" alt="Следующий слайд" />-->
<!--              </picture>-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="certificates__items">-->
<!--          <div class="swiper">-->
<!--            <div class="swiper-wrapper">-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="swiper-slide certificates__items-item">-->
<!--                <picture-->
<!--                ><img-->
<!--                    class="certificates__items-item-photo"-->
<!--                    src="./../assets/images/certificate.jpg"-->
<!--                    srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                    alt="Сертификат"-->
<!--                /></picture>-->
<!--                <div class="certificates__items-item-shadow"></div>-->
<!--                <div class="certificates__items-item-info">-->
<!--                  <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--                  <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--                </div>-->
<!--                <div class="certificates__items-item-download">-->
<!--                  <img-->
<!--                      class="certificates__items-item-download-icon"-->
<!--                      src="./../assets/images/icons/download.svg"-->
<!--                      alt="Скачать сертификат" />-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="certificates__items&#45;&#45;mobile">-->
<!--          <div class="certificates__items-item">-->
<!--            <picture-->
<!--            ><img-->
<!--                class="certificates__items-item-photo"-->
<!--                src="./../assets/images/certificate.jpg"-->
<!--                srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                alt="Сертификат"-->
<!--            /></picture>-->
<!--            <div class="certificates__items-item-shadow"></div>-->
<!--            <div class="certificates__items-item-info">-->
<!--              <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--              <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--            </div>-->
<!--            <div class="certificates__items-item-download">-->
<!--              <img-->
<!--                  class="certificates__items-item-download-icon"-->
<!--                  src="./../assets/images/icons/download.svg"-->
<!--                  alt="Скачать сертификат" />-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="certificates__items-item">-->
<!--            <picture-->
<!--            ><img-->
<!--                class="certificates__items-item-photo"-->
<!--                src="./../assets/images/certificate.jpg"-->
<!--                srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                alt="Сертификат"-->
<!--            /></picture>-->
<!--            <div class="certificates__items-item-shadow"></div>-->
<!--            <div class="certificates__items-item-info">-->
<!--              <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--              <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--            </div>-->
<!--            <div class="certificates__items-item-download">-->
<!--              <img-->
<!--                  class="certificates__items-item-download-icon"-->
<!--                  src="./../assets/images/icons/download.svg"-->
<!--                  alt="Скачать сертификат" />-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="certificates__items-item">-->
<!--            <picture-->
<!--            ><img-->
<!--                class="certificates__items-item-photo"-->
<!--                src="./../assets/images/certificate.jpg"-->
<!--                srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                alt="Сертификат"-->
<!--            /></picture>-->
<!--            <div class="certificates__items-item-shadow"></div>-->
<!--            <div class="certificates__items-item-info">-->
<!--              <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--              <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--            </div>-->
<!--            <div class="certificates__items-item-download">-->
<!--              <img-->
<!--                  class="certificates__items-item-download-icon"-->
<!--                  src="./../assets/images/icons/download.svg"-->
<!--                  alt="Скачать сертификат" />-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="certificates__items-item">-->
<!--            <picture-->
<!--            ><img-->
<!--                class="certificates__items-item-photo"-->
<!--                src="./../assets/images/certificate.jpg"-->
<!--                srcset="./../assets/images/certificate@2x.jpg 2x"-->
<!--                alt="Сертификат"-->
<!--            /></picture>-->
<!--            <div class="certificates__items-item-shadow"></div>-->
<!--            <div class="certificates__items-item-info">-->
<!--              <h6 class="certificates__items-item-info-title">Документ #1</h6>-->
<!--              <p class="certificates__items-item-info-extensions">pdf, 2mb</p>-->
<!--            </div>-->
<!--            <div class="certificates__items-item-download">-->
<!--              <img-->
<!--                  class="certificates__items-item-download-icon"-->
<!--                  src="./../assets/images/icons/download.svg"-->
<!--                  alt="Скачать сертификат" />-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
<!--    <section class="contacts">-->
<!--      <div class="container">-->
<!--        <div class="contacts__content">-->
<!--          <h2 class="title">Контакты</h2>-->
<!--          <div class="contacts__content-info">-->
<!--            <div class="contacts__content-info-item">-->
<!--              <h6 class="contacts__content-info-item-title">Электроннаыя почта</h6>-->
<!--              <div class="contacts__content-info-item-block">-->
<!--                <picture>-->
<!--                  <img src="./../assets/images/icons/mail.svg" alt="Электронная почта" />-->
<!--                </picture>-->
<!--                <p class="contacts__content-info-item-block-text">info@lsk-stroyexpert.ru</p>-->
<!--              </div>-->
<!--            </div>с-->
<!--            <div class="contacts__content-info-item">-->
<!--              <h6 class="contacts__content-info-item-title">Номер телефона</h6>-->
<!--              <div class="contacts__content-info-item-block">-->
<!--                <picture><img src="./../assets/images/icons/phone.svg" alt="Номер телефона" /></picture>-->
<!--                <p class="contacts__content-info-item-block-text">+7 (925) 577-01-90</p>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="contacts__content-info-item">-->
<!--              <h6 class="contacts__content-info-item-title">Адрес</h6>-->
<!--              <div class="contacts__content-info-item-block">-->
<!--                <picture>-->
<!--                  <img src="./../assets/images/icons/map-pin.svg" alt="Адрес" />-->
<!--                </picture>-->
<!--                <p class="contacts__content-info-item-block-text">-->
<!--                  794 Mcallister St San Francisco, 94102-->
<!--                </p>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="contacts__map">-->
<!--          <img src="./../assets/images/map.jpg" alt="Карта" />-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
</template>

<script>
export default {
  head() {
    return {
      title: 'Главная страница',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { hid: 'description', name: 'description', content: 'Описание вашего сайта' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
      ]
    }
  }
}
</script>

<style scoped>
/* Здесь можно добавить стили для этой страницы */
</style>