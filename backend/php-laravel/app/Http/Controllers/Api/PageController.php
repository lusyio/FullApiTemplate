<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ProtocolResp;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageBlockResource;
use App\Models\Page;
use App\Models\Service;
use App\Models\Block;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function get(Request $request)
    {
        $url = $request->url;
        $items = [];

        if (strpos($url, 'services/')) {
            $url = str_replace('/services/', "", $url);
            if ($url) {
                $service = Service::query()
                    ->where('url', $url)
                    ->first();

                if ($service) {

                    return [
                        'blocks' => [],
                        'title' => $service->title,
                        'description' => null,
                        'items' => []
                    ];
                } else {
                    return response()->json([
                        'blocks' => [],
                        'title' => null,
                        'description' => null,
                        'items' => []
                    ], 404);
                }
            }
        } else {

            $page = Page::query()
                ->with('blocks')
                ->where('url', $url)
                ->first();

            if ($page) {

                if ($url === '/services') {
                    $items = Service::all();
                }

                return [
                    'blocks' => PageBlockResource::collection($page->blocks),
                    'title' => $page->title,
                    'description' => $page->description,
                    'items' => $items
                ];
            } else {
                return response()->json([
                    'blocks' => [],
                    'title' => null,
                    'description' => null,
                    'items' => []
                ], 404);
            }
        }


    }

    public function getServiceBlockByUrl(Request $request, $url)
    {
        // Находим сервис по URL-адресу
        $service = Service::where('url', $url)->first();
        $resp = new ProtocoLResp();

        if ($service) {
            $resp->result = true;
            $resp->msg = 'Service found';
            $resp->service = [
                'blocks' => [], // Добавьте нужные блоки, если есть
                'title' => $service->title,
                'description' => null, // Добавьте описание, если есть
                'content' => json_decode($service->content, true), // Получаем контент из поля content
            ];
        } else {
            $resp->result = false;
            $resp->msg = 'Service not found';
        }
        return $resp->response();

    }

    public function getAllBlocks(Request $request)
    {
        $blocks = Block::all();
        $services = Service::all();
        $resp = new ProtocolResp();

        if ($blocks->isNotEmpty()) {
            $decodedBlocks = [];

            $servicesArray = [];
            foreach ($services as $service) {
                $serviceData = [
                    'title' => $service->title,
                    'content' => json_decode($service->content, true), // Получаем URL из контента сервиса
                    'url' => $service->url,
                ];
                $servicesArray[] = $serviceData;
            }

            $decodedBlocks['Services'] = $servicesArray;

            foreach ($blocks as $block) {
                $decodedContent = json_decode($block->content, true);
                $decodedBlocks[$block->key] = $decodedContent;
            }

            $resp->result = true;
            $resp->msg = 'Blocks found';
            $resp->blocks = $decodedBlocks;
        } else {
            $resp->result = false;
            $resp->msg = 'Blocks not found';
        }

        return $resp->response();
    }

}
