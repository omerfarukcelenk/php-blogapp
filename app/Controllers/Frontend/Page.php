<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class Page extends BaseController {
    public function contact(){
        $parser = \Config\Services::parser();
        $data = [
          'baslik' => 'iletisim sayfası',
          'icerik' => 'bana bu bilgilerle ulağabilirsin',
            'kisi' => 'Ömer bey'
        ];
        echo $parser->setData($data)->render('frontend/pages/contact');
    }
}