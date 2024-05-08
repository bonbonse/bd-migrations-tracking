<?php

namespace Controllers;

use Core\Controller;

class Page404Controller extends Controller
{
	
	function index()
	{
		$this->view->generate('404_view', 'template_view');
	}

}
