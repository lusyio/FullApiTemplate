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

        if (strpos($url, 'services')) {
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
}
