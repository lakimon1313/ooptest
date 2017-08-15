<?php

class Model_Portfolio extends Model
{
	
	public function get_data()
	{
        $sql = "SELECT p.id as product_id, wq.wh_id as wh_id, p.name as product_name, w.name as wh_name, quantity  FROM `wh_quantity` wq";
        $sql .= " LEFT JOIN  `product` p ON p.id=wq.product_id";
        $sql .= " LEFT JOIN `warehouse` w ON wq.wh_id=w.id";
        $sql .= " WHERE wq.wh_id != ''";

        $data = $this->conn->prepare($sql);
        $data->execute();

        $result = $whItems = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

            if (key_exists($row['product_id'], $result)) {
                $result[$row['product_id']]['quantity'] += $row['quantity'];

                if (isset($result[$row['product_id']]['warehouses']) && key_exists($row['wh_id'], $result[$row['product_id']]['warehouses'])) {
                    $result[$row['product_id']]['warehouses'][$row['wh_id']]['quantity'] += $row['quantity'];
                } else {
                    $result[$row['product_id']]['warehouses'][$row['wh_id']] = [
                        'quantity' => $row['quantity'],
                        'wh_name' => $row['wh_name'],
                    ];
                }
            } else {
                $result[$row['product_id']] = $row;
                $result[$row['product_id']]['warehouses'][$row['wh_id']] = [
                    'quantity' => $row['quantity'],
                    'wh_name' => $row['wh_name'],
                ];
            }

        }
	}

}
