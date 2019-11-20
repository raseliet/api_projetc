<?php

namespace App\Cars;

class Car {
    
    const MANUFACTURERS = ['bmw'=> 'BMW', 'audi' => 'Audi', 'fiat' => 'Fiat'];

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'manufacturer' => null,
                'model' => null,
                'year' => null
            ];
        }
    }

    
    public static function getManufacturersOptions() {
        return self::MANUFACTURERS;
    }


    public function setData($array) {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setManufacturer($array['manufacturer'] ?? null);
        $this->setModel($array['model'] ?? null);
        $this->setYear($array['year'] ?? null);
    }

    public function getData() {
        return [
            'id' => $this->getId(),
            'manufacturer' => $this->getManufacturer(),
            'model' => $this->getModel(),
            'year' => $this->getYear()
        ];
    }

    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    public function getId() {
        return $this->data['id'];
    }

    public function setManufacturer(String $manufacturer) {
        $this->data['manufacturer'] = $manufacturer;
    }

    public function setModel(String $model) {
        $this->data['model'] = $model;
    }

    public function setYear(String $year) {
        $this->data['year'] = $year;
    }

    public function getManufacturer() {
        return $this->data['manufacturer'];
    }

    public function getModel() {
        return $this->data['model'];
    }

    public function getYear() {
        return $this->data['year'];
    }

}
