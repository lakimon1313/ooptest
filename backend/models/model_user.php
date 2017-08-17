<?php

namespace backend;

use core\Model;
use PDO;

class Model_User extends Model
{

    public function authUser()
    {
        if ($this->checkUser()) {
            return true;
        }

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

    private function generateCode($length = 6)
    {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

        $code = "";

        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0, $clen)];
        }

        return $code;

    }

    private function checkUser()
    {
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {

            $data = $this->conn->prepare("SELECT * FROM user WHERE hash = '" . $_COOKIE['hash'] . "' LIMIT 1");
            if ($data->rowCount() > 0) {
                if ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                    $userdata = $row;
                }
            } else {
                return false;
            }

            if (($userdata['hash'] !== $_COOKIE['hash']) || ($userdata['id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
                setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");

                return false;
            } else {
                $hash = md5($this->generateCode(10));
                $this->conn->prepare("UPDATE user SET hash='" . $hash . "' WHERE id='" . (int)$data['id'] . "'")->execute();
                setcookie("id", $data['id'], time() + 60 * 60 * 24 * 30);
                setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);
                $_SESSION['user_id'] = $data['id'];

                return true;
            }
        } else {
            return false;
        }
    }

}
