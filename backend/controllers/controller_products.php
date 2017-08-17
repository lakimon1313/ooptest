<?php

namespace backend;

require '../models/model_brands.php';

class Controller_Products extends Controller
{

	public function action_index()
	{
        $model = new Model_Products();
        $data = $model->get_data();

		$this->view->generate('products_view.php', 'template_view.php', $data);
	}

	public function action_update()
    {
        $model = new Model_Products();

        if (isset($_POST['submit'])) {
            $result = $model->update_product();
        }

        $data = $model->get_product($_GET['id']);

        $this->view->generate('products_update_view.php', 'template_view.php', $data);
    }

}
