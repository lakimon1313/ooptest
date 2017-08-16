<?php

namespace backend;

//require '../models/model_products.php';

class Controller_Products extends Controller
{

	public function action_index()
	{
        $model = new Model_Products();
        $data = $model->get_data();

		$this->view->generate('products_view.php', 'template_view.php', $data);
	}

}
