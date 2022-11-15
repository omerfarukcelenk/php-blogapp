<?php
namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Send extends BaseController{
    public function sms(){
        $sms_sablon = 'Sayın {adi} {soyadi}, {siparis_tarihi} tarihinde vermiş olduğunuz siparişiniz {kargo_firmasi} ile
         {kargo_tarihi} tarihinde kargoya verilmiştir. tesilimat adresi {adres} ve sipariş bilgileri şunlardır; sipariş tutarı : {siparis_tutar} , {telefon} numarılı telefon ile {siparis_id}
         siparişi teslim alabilirsiniz';
        $data = [
            'adi'=> 'Ömer Faruk',
            'soyadi'=>'Çelenk',
            'telefon'=>'0551 733 60 60',
            'adres'=>'Mersin/Toroslar',
            'siparis_id'=>'ORD436778',
            'siparis_tutar'=>'97,45',
            'kargo_firmasi'=>'Yurtiçi Kargo',
            'siparis_tarihi'=> '18/01/2022',
            'kargo_tarihi'=>'20/01/2022'
        ];

        $parser = \Config\Services::parser();

        echo  $parser->setData($data)->renderString($sms_sablon);
    }
}
