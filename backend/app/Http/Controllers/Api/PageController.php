<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageBlockResource;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function get(Request $request)
    {
        $url = $request->url;
        $items = [];

        $page = Page::query()
            ->with('blocks')
            ->where('url', $url)
            ->first();

        if ($url === '/services') {
            $items = Service::all();
        }

        return [
            'blocks' => PageBlockResource::collection($page?->blocks),
            'title' => $page?->title,
            'description' => $page?->description,
            'items' => $items
        ];
    }
}
