<?php

namespace backend;

use core\Model;
use PDO;

class Model_Brands extends Model
{

    public function get_data()
    {
        $sql = "SELECT * FROM `brands`";

        $data = $this->conn->prepare($sql);
        $data->execute();

        $result = $whItems = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

}
