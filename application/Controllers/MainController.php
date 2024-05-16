<?php
namespace Controllers;

use Cache\Cache;
use Core\Controller;
use Core\View;
use Migrations\create_users;
use Models\Main;
use Models\Select;
use Models\Structure;
use Modules\MigrationsInProject;

class MainController extends Controller
{
    public function __construct()
    {
        $this->model = new Main();
        parent::__construct();
    }

    function index()
    {
        $data = parent::index();

        $this->view->generate('main', 'template_view', $data);
    }
    function select(){
        $this->model = new Select();
        $data = parent::index();

        $this->view->generate('select', 'template_view', $data);
    }
    function structure(){
        $this->model = new Structure();
        $data = parent::index();

        $this->view->generate('structure', 'template_view', $data);
    }
}