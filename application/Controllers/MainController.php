<?php
namespace Controllers;

use Core\Controller;
use Core\View;
use Migrations\create_users;
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

        create_users::up();

        $this->view->generate('main', 'template_view', $data);
    }
}