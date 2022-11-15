<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use App\Libraries\SMS;

class KutuphaneController extends BaseController{

    public function index(){

        $this->sms->setTelefon("05517336060")->setMesaj("napun laaa");
        echo $this->sms->gonder();
    }

}