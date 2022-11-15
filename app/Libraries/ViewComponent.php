<?php

namespace App\Libraries;

class ViewComponent
{



    public function getUserView(array $params = [])
    {

        if ($params['type'] == 'aktif') {
            $data =  [
                'users' => [
                    [
                        'isim' => "mEHMNET ağa",
                        'meslek' => "Reddit UZMANI",
                        'yas' => 19
                    ],
                    [
                        'isim' => "Sura Metin",
                        'meslek' => "doluyan kırıcı",
                        'yas' => 41
                    ],
                ]

            ];
        } else {
            $data =  [
                'users' => [
                    [
                        'isim' => "öMER fRUK cELNK",
                        'meslek' => "Software Developer",
                        'yas' => 22
                    ],

                    [
                        'isim' => "Selo Cojuk",
                        'meslek' => "Twerk CEO",
                        'yas' => 25
                    ],


                ]

            ];
        }



        return view('backend\components\user_data', $data);
    }
}
