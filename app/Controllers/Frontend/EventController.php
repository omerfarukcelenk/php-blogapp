<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use CodeIgniter\Events\Events;

class EventController extends BaseController{

    public function __construct()
    {
        echo "Construc çalıştıke <hr> ";
    }

    public function index(){
        echo "Kayıt işlemi başarılı bir şekilde gerçekleşmiştir. Tarafınıza doğrulama kodu gönderildi. <br>";
        Events::trigger("dogrulamaKoduGonder", "05535106086",198465);
    }

}