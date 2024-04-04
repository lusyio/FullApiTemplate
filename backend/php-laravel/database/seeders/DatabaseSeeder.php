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

        $services = [
            [
                'title' => 'Сопровождение объектов строительства',
                'url' => 'soprovozhdenie-obuektov-stroitelstva',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/pipes.png',
                    'service_image_mobile' => '/images/pipes--mobile.png',
                ]),
            ],
            [
                'title' => 'Испытания бетона, кострукций и изделий',
                'url' => 'ispytaniya-betona-konstruktsiy-i-izdeliy',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Испытание грунтов',
                'url' => 'ispytanie-gruntov',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Определение характеристик бетона',
                'url' => 'opredelenie-kharakteristik-betona',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Испытание строительных материалов',
                'url' => 'ispytanie-stroitelnykh-materialov',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Подбор рецептуры бетона и растворов',
                'url' => 'podbor-retseptury-betona-i-rastvorov',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Неразрушающий контроль бетона',
                'url' => 'nerazrushayushchiy-kontrol-betona',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Испытание лакокрасочного покрытия',
                'url' => 'ispytanie-lakokrasochnogo-pokrytiya',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
            [
                'title' => 'Определение толщины покрытий',
                'url' => 'opredelenie-tolshchiny-pokrytiy',
                'content' => json_encode([
                    'service_image_preview' => '/images/service.jpg',
                    'service_image' => '/images/service.jpg',
                ]),
            ],
        ];

        foreach ($services as $data) {
            $service = new Service();
            $service->title = $data['title'];
            $service->url = $data['url'];
            $service->content = $data['content'];
            $service->save();
        }
    }
}
