<?php

include $_SERVER['DOCUMENT_ROOT'] . '/backend/models/model_products.php';

class Controller_Products extends Controller
{

	public function action_index()
	{
        $model = new Model_Products();
        $data = $model->get_data();

		$this->view->generate('products_view.php', 'template_view.php', $data);
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
