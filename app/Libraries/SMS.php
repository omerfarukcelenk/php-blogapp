<?php

namespace App\Libraries;

class SMS
{
    protected $telefon;
    protected $mesaj;

    public function setTelefon(string $telefonNumarasi)
    {

        $ilkKarakter = substr($telefonNumarasi, 0, 1);
        if ($ilkKarakter == "0"){
            $telefonNumarasi = substr($telefonNumarasi, 1);
        }

        $this->telefon = $telefonNumarasi;
        return $this;
    }

    /**
     * @param mixed $mesaj
     */
    public function setMesaj(string $mesaj)
    {
        $this->mesaj = $mesaj;
    }


    public function gonder()
    {
        return "{$this->telefon} numarasına '{$this->mesaj}' içerikli SMS başarılı bir şekilde gönderildi";
    }

}