<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Block;
use App\Models\Page;
use App\Models\PageBlock;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $page = new Page();
        $page->title = 'Главная';
        $page->description = 'Описание главной';
        $page->url = '/';
        $page->save();

        $page = new Page();
        $page->title = 'Услуги';
        $page->description = 'Услуги компании';
        $page->url = '/services';
        $page->save();

        $advantages = [
            'name' => 'Преимущества',
            'key' => 'Advantages',
            'content' => json_encode([
                [
                    'title' => 'Современное оборудование',
                    'text' => 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
                    'image' => '/images/icons/advantage.svg'
                ],
                [
                    'title' => 'Аккредитация "COBACK"',
                    'text' => 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
                    'image' => '/images/icons/advantage.svg'
                ],
                [
                    'title' => 'Работа 24/7',
                    'text' => 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
                    'image' => '/images/icons/advantage.svg'
                ],
                [
                    'title' => 'Актуальная нормативная база',
                    'text' => 'Лаборатория укомплектована всем необходимым оборудованием и проходит своевременную поверку',
                    'image' => '/images/icons/advantage.svg'
                ]
            ], JSON_UNESCAPED_UNICODE),

        ];

        $block = new Block();
        $block->name = $advantages['name'];
        $block->key = $advantages['key'];
        $block->content = $advantages['content'];
        $block->save();

        $certificates = [
            'name' => 'Сертификаты',
            'key' => 'Certificates',
            'content' => json_encode([
                'subtitle' => 'Сертификаты',
                'title' => 'Сертификаты лаборатории',
                'certs' => [
                    [
                        'title' => 'Документ 1',
                    ],
                    [
                        'title' => 'Документ 2',
                    ],
                    [
                        'title' => 'Документ 3',
                    ],
                    [
                        'title' => 'Документ 4',
                    ],
                ]
            ], JSON_UNESCAPED_UNICODE)
        ];

        $block = new Block();
        $block->name = $certificates['name'];
        $block->key = $certificates['key'];
        $block->content = $certificates['content'];
        $block->save();

        $experts = [
            'name' => 'Эксперты',
            'key' => 'Experts',
            'content' => json_encode([
                'title' => 'Эксперты в исследовании строительных материалов',
                'director_job' => 'Генеральный директор',
                'director_name' => 'О.В. Гадалова',
                'text_paragraphs' => [
                    'Строительная лаборатория СтройЭксперт – команда специалистов объединивших свои усилия
              для выполнения работ в области проектирования, испытания строительных и дорожных
              материалов, обследования зданий и сооружений', 'Мы выполняем полное детальное и инструментальное обследование зданий и сооружений, наша
              лаборатория неразрушающего контроля аттестована по ПБ 03-372-00 для выполнения работ
              неразрушающими методами при обследовании и строительстве', 'Наша лаборатория разрушающего контроля осуществляет свою деятельность в соответствии с
              законодательством в порядке предусмотренным ГОСТ 17025-2019'
                ],
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $experts['name'];
        $block->key = $experts['key'];
        $block->content = $experts['content'];
        $block->save();

        $equipment = [
            'name' => 'Оборудование',
            'key' => 'Equipment',
            'content' => json_encode([
                'subtitle' => 'Оборудование',
                'title' => 'Используем современное оборудование',
                'equipment_items' => [[
                    'title' => 'Пресс испытательный Matest',
                    'category' => 'Бетон',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Пресс испытательный Matest',
                    'category' => 'Бетон',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Пресс испытательный Matest',
                    'category' => 'Бетон',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Пресс испытательный Matest',
                    'category' => 'Бетон',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для бетонной смеси 1',
                    'category' => 'Бетонная смесь',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для бетонной смеси 2',
                    'category' => 'Бетонная смесь',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для бетонной смеси 3',
                    'category' => 'Бетонная смесь',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для бетонной смеси 4',
                    'category' => 'Бетонная смесь',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для раствора 1',
                    'category' => 'Раствор',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для раствора 2',
                    'category' => 'Раствор',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для раствора 3',
                    'category' => 'Раствор',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для раствора 4',
                    'category' => 'Раствор',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для щебня 1',
                    'category' => 'Щебень',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для щебня 2',
                    'category' => 'Щебень',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для щебня 3',
                    'category' => 'Щебень',
                    'image' => '/images/press-matest.jpg'
                ], [
                    'title' => 'Оборудование для щебня 4',
                    'category' => 'Щебень',
                    'image' => '/images/press-matest.jpg'
                ],
                ],

            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $equipment['name'];
        $block->key = $equipment['key'];
        $block->content = $equipment['content'];
        $block->save();

        $contacts = [
            'name' => 'Контакты',
            'key' => 'Contacts',
            'content' => json_encode([
                'title' => 'Контакты',
                'email_label' => 'Электронная почта',
                'phone_label' => 'Номер телефона',
                'address_label' => 'Адрес',
                'email' => 'info@lsk-stroyexpert.ru',
                'phone' => '+7 (925) 577-01-90',
                'address' => ' 794 Mcallister St San Francisco, 94102',
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $contacts['name'];
        $block->key = $contacts['key'];
        $block->content = $contacts['content'];
        $block->save();

        $header = [
            'name' => 'Хедер',
            'key' => 'Header',
            'content' => json_encode([
                'logo' => '/images/logo.svg',
                'header_menu' => [
                    [
                        'link_key' => 'Каталог услуг',
                        'link_value' => '#',
                    ],
                    [
                        'link_key' => 'Оборудование',
                        'link_value' => '#',
                    ],
                    [
                        'link_key' => 'Сертификация',
                        'link_value' => '#',
                    ],
                    [
                        'link_key' => 'Контакты',
                        'link_value' => '#',
                    ]
                ],
                'phone' => '+7 (925) 577-01-90',
                'text_button_1' => 'Перезвоните мне',
                'text_login_button_2' => 'Личный кабинет',
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $header['name'];
        $block->key = $header['key'];
        $block->content = $header['content'];
        $block->save();

        $footer = [
            'name' => 'Футер',
            'key' => 'Footer',
            'content' => json_encode([
                'logo' => '/images/logo.svg',
                'copyrights' => 'Copyright © 2025 BRIX Agency | All Rights Reserved',
                'phone' => '+7 (925) 577-01-90',
                'text_button_1' => 'Перезвоните мне',
                'text_button_2' => 'Оставить заявку',
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $footer['name'];
        $block->key = $footer['key'];
        $block->content = $footer['content'];
        $block->save();

        $howWeWork = [
            'name' => 'Как мы работаем',
            'key' => 'HowWeWork',
            'content' => json_encode([
                'title' => 'Как мы работаем',
                'steps' => [
                    [
                        'image' => '/images/icons/send-order.svg',
                        'text' => 'Оставляете заявку',
                    ],
                    [
                        'image' => '/images/icons/send-message.svg',
                        'text' => 'Оставляете заявку',
                    ],
                    [
                        'image' => '/images/icons/going-to-object.svg',
                        'text' => 'Выезжаем на объект',
                    ],
                    [
                        'image' => '/images/icons/get-document.svg',
                        'text' => 'Выдаем заключение',
                    ],
                    [
                        'image' => '/images/icons/save-document.svg',
                        'text' => 'Храним документы в личном кабинете',
                    ]
                ],
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $howWeWork['name'];
        $block->key = $howWeWork['key'];
        $block->content = $howWeWork['content'];
        $block->save();

        $consultation = [
            'name' => 'Консультация',
            'key' => 'Consultation',
            'content' => json_encode([
                'title' => 'Стройэксперт',
                'text_left' => 'Получите консультацию экспертов по необходимым испытаниям',
                'text_right' => 'Оставьте заявку, и наш менеджер свяжется с Вами в течение дня',
                'text_button' => 'Получить косультацию и узнать стоимость',
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $consultation['name'];
        $block->key = $consultation['key'];
        $block->content = $consultation['content'];
        $block->save();

        $welcome = [
            'name' => 'Welcome',
            'key' => 'Welcome',
            'content' => json_encode([
                'title' => 'Строительная лаборатория',
                'text_right' => 'Испытания всех строительных материалов',
                'text_button' => 'Запросить рассчет испытаний',
            ], JSON_UNESCAPED_UNICODE)
        ];
        $block = new Block();
        $block->name = $welcome['name'];
        $block->key = $welcome['key'];
        $block->content = $welcome['content'];
        $block->save();

        $servicesItems = [
            'soprovozhdenie-obuektov-stroitelstva' => [
                'title' => 'Сопровождение объектов строительства',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/pipes.png',
                'description' => 'Испытания всех строительных материалов',
                'text_button' => 'Запросить рассчет испытаний',
                'service_image_mobile' => '/images/pipes--mobile.png',
            ],
            'ispytaniya-betona-konstruktsiy-i-izdeliy' => [
                'title' => 'Испытания бетона, конструкций и изделий',
                'text_button' => 'Запросить рассчет испытаний',
                'service_image_preview' => '/images/service.jpg',
                'description' => 'Испытания всех строительных материалов',
                'service_image' => '/images/service.jpg',
            ],
            'ispytanie-gruntov' => [
                'title' => 'Испытание грунтов',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/service.jpg',
                'description' => 'Испытания всех строительных материалов',
                'text_button' => 'Запросить рассчет испытаний',
            ],
            'opredelenie-kharakteristik-betona' => [
                'text_button' => 'Запросить рассчет испытаний',
                'description' => 'Испытания всех строительных материалов',
                'title' => 'Определение характеристик бетона',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/service.jpg',
            ],
            'ispytanie-stroitelnykh-materialov' => [
                'description' => 'Испытания всех строительных материалов',
                'title' => 'Испытание строительных материалов',
                'service_image_preview' => '/images/service.jpg',
                'text_button' => 'Запросить рассчет испытаний',
                'service_image' => '/images/service.jpg',
            ],
            'podbor-retseptury-betona-i-rastvorov' => [
                'description' => 'Испытания всех строительных материалов',
                'title' => 'Подбор рецептуры бетона и растворов',
                'text_button' => 'Запросить рассчет испытаний',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/service.jpg',
            ],
            'nerazrushayushchiy-kontrol-betona' => [
                'description' => 'Испытания всех строительных материалов',
                'title' => 'Неразрушающий контроль бетона',
                'text_button' => 'Запросить рассчет испытаний',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/service.jpg',
            ],
            'ispytanie-lakokrasochnogo-pokrytiya' => [
                'description' => 'Испытания всех строительных материалов',
                'text_button' => 'Запросить рассчет испытаний',
                'title' => 'Испытание лакокрасочного покрытия',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/service.jpg',
            ],
            'opredelenie-tolshchiny-pokrytiy' => [
                'description' => 'Испытания всех строительных материалов',
                'text_button' => 'Запросить рассчет испытаний',
                'title' => 'Определение толщины покрытий',
                'service_image_preview' => '/images/service.jpg',
                'service_image' => '/images/service.jpg',
            ],
        ];

        $servicesBlock = [
            'name' => 'Услуги',
            'key' => 'Services',
            'content' => json_encode([
                'subtitle' => 'Услуги',
                'title' => 'Испытываем, сопровождаем и контролируем все этапы строительства',
                'text_button' => 'Запросить рассчет испытаний',
                'services_items' => $servicesItems,
            ], JSON_UNESCAPED_UNICODE)
        ];

        $block = new Block();
        $block->name = $servicesBlock['name'];
        $block->key = $servicesBlock['key'];
        $block->content = $servicesBlock['content'];
        $block->save();
    }
}
