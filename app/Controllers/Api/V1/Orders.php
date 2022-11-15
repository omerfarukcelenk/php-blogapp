<?php

namespace App\Controllers\Api\V1;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function reqType()
    {
        if ($this->request->isAJAX()) {
            echo "İstek AJAX tarafından yapıldı";
        } elseif ($this->request->isCLI()) {
            echo "İstek Komut satırı tarafından yapıldı";
        } else {
            echo "İstek Tarayıcı veya Postman tarafından yapıldı";
        }
    }

    public function methodType()
    {
        $type_one = $this->request->getMethod(false);
        $type_two = $this->request->getMethod(true);
        echo "1. tür: " . $type_one;
        echo "<br>";
        echo "2. tür: " . $type_two;

    }

    public function secureType()
    {
        if ($this->request->isSecure()) {
            echo "Secure bağlantı 202";
        } else {
            echo "Secure bağlantı yok 400";
        }
    }

    public function inputGet()
    {
        $soyisim = $this->request->getPost('soyisim');
        $isim = $this->request->getGet('isim');
        echo "isim : " . $isim;
        echo "<br>";
        echo "soyisim : " . $isim;

    }

    public function inputJson()
    {
        $json_one = $this->request->getJSON(true);
        $json_two = $this->request->getJSON(false);

        print_r($json_one);
        print_r($json_two);

    }

}
