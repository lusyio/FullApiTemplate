<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Storage::files('images');

        $imageList = array_map(function ($image) {
            return [
                'filename' => basename($image),
                'url' => asset('storage/' . $image),
            ];
        }, $images);

        // Возвращаем протокольный ответ
        return response()->json([
            'result' => true,
            'msg' => 'Images retrieved successfully',
            'images' => $imageList
        ]);
    }

    public function uploadImage(Request $request)
    {
        // Создаем массив для хранения ответа
        $response = [
            'result' => false,
            'msg' => 'No image uploaded'
        ];

        // Проверка наличия загруженного файла
        if ($request->hasFile('image')) {
            // Получаем файл из запроса
            $image = $request->file('image');
            // Генерируем уникальное имя для файла
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            // Сохраняем файл в хранилище
            $image->storeAs('public/images', $imageName);
            // Формируем путь к сохраненному изображению
            $imageUrl = Storage::url('images/' . $imageName);

            // Обновляем ответ
            $response['result'] = true;
            $response['msg'] = 'Image uploaded successfully';
            $response['image_url'] = $imageUrl;
        }

        // Возвращаем протокольный ответ
        return response()->json($response);
    }
}
