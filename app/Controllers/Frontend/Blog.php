<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;


class Blog extends BaseController {
    public function single($slug = null){
        $data = [
            'baslik' => $slug,
            'icerik' => 'Bugün ne yiyeceğiz',
            'yazar' => 'midyeci ahmet',

        ];

        return view('frontend/blogs/single',$data);
    }

    public function category($slug = null){
        $data = [
            'baslik' => $slug,
            'icerik' => 'Bugün ne yiyeceğiz',
            'kategori_ozet' => '+18',
            'yazar' => 'midyeci ahmet',

        ];
        return view('frontend/blogs/category', $data);

    }
}