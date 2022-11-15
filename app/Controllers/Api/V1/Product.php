<?php
namespace App\Controllers\Api\V1;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;


class Product extends BaseController {
    use ResponseTrait;

    public function generic(){
        return $this->respond(["title"=>'Urun 1','fiyat'=>'35 TL'], 200,'İşlem başarılı bir şekilde tamamlandı');
    }

    public function failure(){
        return $this->fail('İşlem Gerçekleşmedi', 400, 'PR2002', 'Product Failure');
    }

    public function created(){
        return $this->respondCreated(["title"=>'Urun 2','fiyat'=>'87 TL']);
    }

    public function deleted(){
        return $this->respondDeleted(["id"=>489], 'Ürün sistemden kaldırıldı');
    }
    public function noContent(){
        return $this->respondNoContent();
    }

    public function unauthorized(){
        return $this->failUnauthorized("yetkisiz giriş");
    }

    public function forbidden(){
        return $this->failForbidden("yetkisiz giriş");
    }
}