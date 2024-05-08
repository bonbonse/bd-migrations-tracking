<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\Structure;

class StructureController extends Controller
{
    public function __construct()
    {
        $this->model = new Structure();
        parent::__construct();
    }

    function index()
    {
        $data = [
            'tables'=>$this->model->tables,
            'result'=>$this->model->get_data()
        ];
        $this->view->generate('structure', 'template_view', $data);
    }
}