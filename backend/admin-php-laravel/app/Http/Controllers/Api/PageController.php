<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ProtocolResp;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageBlockResource;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Block;
use App\Models\ContentElement;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getServiceBlockByUrl(Request $request, $url)
    {
        // Находим сервис по URL-адресу
        $service = Service::where('url', $url)->first();
        $resp = new ProtocolResp();

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
                $decodedBlocks[] = [
                    'id' => $block->id,
                    'key' => $block->key,
                    'content' => $decodedContent,
                ];
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


    public function createBlock(Request $request)
    {
        $block = Block::create($request->all());
        $resp = new ProtocolResp();

        if ($block) {
            $resp->result = true;
            $resp->msg = 'Block created successfully';
            $resp->block = $block;
        } else {
            $resp->result = false;
            $resp->msg = 'Failed to create block';
        }

        return $resp->response();
    }

    public function updateBlock(Request $request, $id)
    {
        $block = Block::findOrFail($id);
        $block->update($request->all());
        $resp = new ProtocolResp();

        if ($block) {
            $resp->result = true;
            $resp->msg = 'Block updated successfully';
            $resp->block = $block;
        } else {
            $resp->result = false;
            $resp->msg = 'Failed to update block';
        }

        return $resp->response();
    }

    public function createContentElement(Request $request)
    {
        // Получение и сохранение изображения
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images'); // Предполагается, что изображения будут сохраняться в папку "images" в хранилище
        } else {
            $imagePath = null;
        }

        // Создание элемента контента
        $requestData = $request->all();
        $requestData['content'] = json_encode($requestData['content']);
        $requestData['image_path'] = $imagePath;
        $content = ContentElement::create($requestData);

        // Формирование ответа
        $resp = new ProtocolResp();
        if ($content) {
            $resp->result = true;
            $resp->msg = 'ContentElement created successfully';
            $resp->content = $content;
        } else {
            $resp->result = false;
            $resp->msg = 'Failed to create content';
        }

        return $resp->response();
    }

    public function updateContentElement(Request $request, $id)
    {
        $content = ContentElement::findOrFail($id);
        $content->update($request->all());
        $resp = new ProtocolResp();

        if ($content) {
            $resp->result = true;
            $resp->msg = 'ContentElement updated successfully';
            $resp->content = $content;
        } else {
            $resp->result = false;
            $resp->msg = 'Failed to update content';
        }

        return $resp->response();
    }

    public function getContentElements(Request $request)
    {
        $contentElements = ContentElement::all();
        $resp = new ProtocolResp();

        if ($contentElements->isNotEmpty()) {
            $resp->result = true;
            $resp->msg = 'Content elements found';
            $resp->contentElements = $contentElements;
        } else {
            $resp->result = false;
            $resp->msg = 'Content elements not found';
        }

        return $resp->response();
    }

}
