<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class SessionDersleri extends BaseController
{

    public function index()
    {
        $sdc = session();

        // $sdc->set('key','value');
//        $sdc->set([
//            'key' => 'value',
//        ]);

//        $data  = [
//            'is_login'=>true,
//            'email'=>'omerfar0133@gmail.com',
//            'user_id'=>'984'
//        ];
//        var_dump($data);
//        $sdc->set($data);

//        echo $sdc->user_id;
//        $sdc->remove('email');
//        echo $sdc->user_id;

//        print_r($sdc);

//        $sdc->destroy();
    }
}