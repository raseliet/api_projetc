<?php

namespace App\Cars;

use \App\App;

class Model {

    private $table_name = 'cars';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Irašo $car i duombaze
     * @param Car $car
     * @return bool
     */
    public function insert(Car $car) {
        return App::$db->insertRow($this->table_name, $car->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $cars = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $cars[] = new Car($row_data);
        }
        
        return $cars;
    }

    /**
     * @param Cars $car
     * @return bool
     */
    public function update(Car $car) {
        return App::$db->updateRow($this->table_name, $car->getId(), $car->getData());
    }

    /**
     * deletes all cars from database
     * @param Cars $car
     * @return bool
     */
    public function delete(Car $car) {
        return App::$db->deleteRow($this->table_name, $car->getId());
    }

    public function __destruct() {
        App::$db->save();
    }

}
