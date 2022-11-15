<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Entities\UserEntitiy;
use App\Models\UsersModel;

class Home extends BaseController
{
    private $model;
    private $entity;

    public function __construct()
    {
        $this->model = new UsersModel();
        $this->entity = new UserEntitiy();
    }

    public function index()
    {
//        $pasword = '123'; // POST metodu ile gelen password;
//        $kullanici = $this->model->find(2);
//        if ($kullanici->passwordControl($pasword)){
//            echo "Şifre doğru";
//        }else {
//            echo "Şifre Yanlış";
//        }
//        return $this->response->setJSON($kullanici->getUserName());

        /*
        $kullanicilar = $this->model->findAll();
        foreach ($kullanicilar as $kullanici){
            echo  $kullanici->getEmail().  "<br>";
        }
        */

        $this->entity->setName("Ahmet Kaya");
        $this->entity->setEmail("brimvalo@gmail.com");
        $this->entity->setAge(31);
        $this->entity->setPassword("AhmetKayaXBrimstone");
        $this->entity->setPhone("05316925231");
        $this->entity->setProfieLink("akx47");

        $ekleAK = $this->model->insert($this->entity);
        $hatalar = $this->model->errors();
        if (!$hatalar){
            return $this->response->setJSON([
                'message' => "Kayıt işlemi başarılı",
                'kullaniciId' => $ekleAK
            ]);
        }else{
            return $this->response->setJSON([
               'hatalar'  => $hatalar,
                'message' => 'Kayıt işlemi başarısız'
            ]);
        }

    }
}