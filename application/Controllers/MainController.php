<?php
namespace Controllers;

use Cache\Cache;
use Core\Controller;
use Core\View;
use Migrations\create_users;
use Models\Tables;
use Modules\MigrationsInProject;

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

        MigrationsInProject::createMigration('create', 'table');

        $this->view->generate('main', 'template_view', $data);
    }
}