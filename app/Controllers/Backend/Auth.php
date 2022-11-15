<?php
namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Auth extends BaseController{
    public function login(){
        echo "Giriş ekranı";
    }

    public function logout(){
        echo "Çıkış ekranı";
    }
}