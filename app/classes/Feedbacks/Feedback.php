<?php

namespace App\Feedbackss;

class Feedback {
    
//    const MANUFACTURERS = ['bmw'=> 'BMW', 'audi' => 'Audi', 'fiat' => 'Fiat'];

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'vardas' => null,
                'komentaras' => null,
                'diena' => null
            ];
        }
    }

    
//    public static function getManufacturersOptions() {
//        return self::MANUFACTURERS;
//    }


    public function setData($array) {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setVardas($array['vardas'] ?? null);
        $this->setKomentaras($array['komentaras'] ?? null);
        $this->setDiena($array['diena'] ?? null);
    }

    public function getData() {
        return [
            'id' => $this->getId(),
            'vardas' => $this->getVardas(),
            'komentaras' => $this->getKomentaras(),
            'diena' => $this->getDiena()
        ];
    }

    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    public function getId() {
        return $this->data['id'];
    }

    public function setVardas(String $vardas) {
        $this->data['vardas'] = $vardas;
    }

    public function setKomentaras(String $komentaras) {
        $this->data['komentaras'] = $komentaras;
    }

    public function setDiena(String $diena) {
        $this->data['diena'] = $diena;
    }

    public function getVardas() {
        return $this->data['vardas'];
    }

    public function getKomentaras() {
        return $this->data['komentaras'];
    }

    public function getDiena() {
        return $this->data['diena'];
    }

}
