<?php

namespace Controllers;

use Core\Controller;
use Models\Select;

class SelectController extends Controller
{
    public function __construct()
    {
        $this->model = new Select();
        parent::__construct();
    }

    function index()
    {
        $this->model->get_data();
        $data = parent::index();

        $this->view->generate('select', 'template_view', $data);
    }
}