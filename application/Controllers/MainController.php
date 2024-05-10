<?php
namespace Controllers;

use Core\Controller;
use Core\View;
use Models\Tables;

class MainController extends Controller
{
    public function __construct()
    {
        $this->model = new Tables();
        parent::__construct();
    }

    function index()
    {
        $this->model->get_data();
        $data = parent::index();

        $this->view->generate('main', 'template_view', $data);
    }
}