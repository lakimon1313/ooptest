<?php

namespace backend;

class Controller_User extends Controller
{

	public function action_index()
	{
		$this->view->generate('services_view.php', 'template_view.php');
	}

	public function action_auth()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $model = new Model_User();
            $result = $model->authUser();

            if (!$result) {
                $this->view->generate('auth_view.php', 'template_view.php', ['error' => true]);
                return true;
            } else {
                header('Location: /admin/');
                die();
            }
        } elseif (isset($_SESSION['user_id'])) {
            header('Location: /admin/');
            die();
        }

        $this->view->generate('auth_view.php', 'template_view.php');
    }

}
