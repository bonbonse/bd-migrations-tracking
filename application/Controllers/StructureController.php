<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use DB\DB;
use Models\Structure;
use Models\Main;

class StructureController extends Controller
{
    public function __construct()
    {
        $this->model = new Structure();
        parent::__construct();
    }

    function index()
    {
        $this->model->get_data();
        $data = parent::index();

        $this->view->generate('structure', 'template_view', $data);
    }
}