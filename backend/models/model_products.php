<?php

namespace backend;

use core\Model;
use PDO;

class Model_Products extends Model
{

    public function get_data()
    {
        $sql = "SELECT *, b.name as brand FROM `products` p";
        $sql .= " LEFT JOIN  `brands` b ON p.brand=b.id";

        $data = $this->conn->prepare($sql);
        $data->execute();

        $result = $whItems = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;

    }

    public function get_product($id)
    {
        $sql = "SELECT *, b.name as brand, b.id as brand_id FROM `products` p";
        $sql .= " LEFT JOIN  `brands` b ON p.brand=b.id";
        $sql .= " WHERE p.id = " . (int)$id;

        $data = $this->conn->prepare($sql);
        $data->execute();

        $result = $whItems = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $result = $row;
        }

        $result['brands'] = (new Model_Brands())->get_data();

        return $result;
    }

    public function update_product()
    {
    }

}
