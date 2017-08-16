<?php

namespace backend;

class Model_Product extends Model
{

    public function authUser()
    {
        $data = $this->conn->prepare("SELECT id, password FROM user WHERE login='" . $_POST['login'] . "' LIMIT 1");
        $data->execute();

        if ($data->rowCount() > 0) {
            if ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                $data = $row;
            }
        } else {
            return false;
        }

        if ($data['password'] === md5(md5($_POST['password']))) {
            $hash = md5($this->generateCode(10));

            $this->conn->prepare("UPDATE user SET hash='" . $hash . "' WHERE id='" . (int)$data['id'] . "'")->execute();
            setcookie("id", $data['id'], time() + 60 * 60 * 24 * 30);
            setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);
            $_SESSION['user_id'] = $data['id'];

            return true;
        } else {
            return false;
        }

    }

}
