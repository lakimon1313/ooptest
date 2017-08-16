<?php

namespace frontend;

use core\Controller;

class Controller_Main extends Controller
{

	function action_index()
	{
	    $model = new Model_Products();
	    $data = $model->get_data();

		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}