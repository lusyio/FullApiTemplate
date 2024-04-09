<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ProtocolResp;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageBlockResource;
use App\Models\Service;
use App\Models\Block;
use Illuminate\Http\Request;

class PageController extends Controller
{
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
        $resp = new ProtocolResp();

        if ($blocks->isNotEmpty()) {
            $decodedBlocks = [];

            foreach ($blocks as $block) {
                $decodedContent = $block->content;
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
