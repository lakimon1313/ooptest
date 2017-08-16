<?php

namespace frontend;

use core\Model;

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

}
