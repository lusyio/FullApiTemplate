<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Block;
use App\Models\Page;
use App\Models\PageBlock;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $block = new Block();
        $block->name = 'Заголовок + текст';
        $block->key = 'HeaderText';
        $block->template = json_encode([
            'header' => null,
            'text' => null
        ]);
        $block->save();

        $page = new Page();
        $page->title = 'Главная';
        $page->description = 'Описание главной';
        $page->url = '/';
        $page->save();

        $pageBlock = new PageBlock();
        $pageBlock->page_id = $page->id;
        $pageBlock->block_id = $block->id;
        $pageBlock->key = $block->key;
        $pageBlock->data = json_encode([
            'header' => 'Заголовок страницы',
            'text' => 'Съешь ещё этих мягких французских булок, да выпей чаю'
        ], JSON_UNESCAPED_UNICODE);
        $pageBlock->save();

        $page = new Page();
        $page->title = 'Услуги';
        $page->description = 'Услуги компании';
        $page->url = '/services';
        $page->save();


        $services = [
            [
                'title' => 'Сопровождение объектов строительства',
                'url' => 'soprovozhdenie-obuektov-stroitelstva'
            ],
            [
                'title' => 'Испытания бетона',
                'url' => 'ispytaniya-betona'
            ]
        ];

        foreach ($services as $data)
        {
            $data = (object) $data;

            $service = new Service();
            $service->title = $data->title;
            $service->url = $data->url;
            $service->save();
        }

    }
}
