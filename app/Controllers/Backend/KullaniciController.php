<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class KullaniciController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }

    public function ekle()
    {
        $data = [
            'user_name' => 'Ege Sins',
            'user_email' => 'egesins@gmail.com',
            'user_phone' => '05741343131',
            'user_password' => "egesins3169",
            'user_profile_picture' => "/egesins/pp/link",
            'user_age' => 31
        ];
        $this->model->insert($data);
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $data,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }
    }

    public function getir($id = null)
    {
        if (!is_null($id)) {
            $kullanici = $this->model->find($id);
            return $this->response->setJSON([
                'kullanici' => $kullanici,
                'mesaj' => 'Kullanıcı başarılı bir şekilde getirildi.'
            ]);
        }
    }

    public function listele()
    {
        $kullanicilar = $this->model->findAll();
        return $this->response->setJSON($kullanicilar);
    }

    public function duzenle($id = null)
    {
        if (!is_null($id)) {
            $data = [
                'user_name' => 'Barış Terim',
                'user_email' => 'baristerim@gmail.com',
                'user_phone' => '05384964986',
            ];

            $this->model->update($id, $data);
            $hatalar = $this->model->errors();
            if (!$hatalar) {
                return $this->response->setJSON([
                    'kullanici' => $data,
                    'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
                ]);
            } else {
                return $this->response->setJSON([
                    'hatalar' => $hatalar
                ]);
            }
        }
    }

    public function sil($id = null)
    {
        if (!is_null($id)) {
            $this->model->delete($id);
            return $this->response->setJSON([

                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        }
    }

    public function silinenleriListele()
    {
        $kullanicilar = $this->model->onlyDeleted()->findAll();
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $kullanicilar,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }
    }

    public function aktifleriListele()
    {
        $kullanicilar = $this->model->where('user_status', 'ACTIVE')->findAll();
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $kullanicilar,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }
    }


    public function pasifleriListele()
    {
        $kullanicilar = $this->model->where('user_status', 'PASSIVE')->findAll();
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $kullanicilar,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }
    }

    public function sutunListele()
    {
        $isimler = $this->model->findColumn('user_name');
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $isimler,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }
    }

    public function offsetListele($limit = null, $offset = null)
    {
        if (!is_null($limit) && !is_null($offset)) {
            $kullanicilar = $this->model->findAll($limit, $offset);
            $hatalar = $this->model->errors();
            if (!$hatalar) {
                return $this->response->setJSON([
                    'kullanici' => $kullanicilar,
                    'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
                ]);
            } else {
                return $this->response->setJSON([
                    'hatalar' => $hatalar
                ]);
            }
        }

    }


    public function sorguOlustur()
    {
        $kullanicilar = $this->model->getUserList();
//        $kullanicilar = $this->model->getUser();
//        $kullanicilar = $this->model->getUserSelect();
//        $kullanicilar = $this->model->getUserMaxAge();
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $kullanicilar,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }
    }

    public function sorguGetir($id = null)
    {
        $kullanicilar = $this->model->getUserSelect($id);
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $kullanicilar,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }

    }

    public function userEkle()
    {
        $username = $this->request->getVar('username');
        $useremail = $this->request->getVar('useremail');
        $userphone = $this->request->getVar('userphone');
        $userage = $this->request->getVar('userage');

        $kullanicilar = $this->model->insertUser($username, $useremail, $userphone, $userage);
        $hatalar = $this->model->errors();
        if (!$hatalar) {
            return $this->response->setJSON([
                'kullanici' => $kullanicilar,
                'mesaj' => 'işlem başarılı bir şekilde tamamlandı',
            ]);
        } else {
            return $this->response->setJSON([
                'hatalar' => $hatalar
            ]);
        }

    }
}