<?php
namespace Controllers;

use Core\Controller;
use Migrations;
use Modules\MigrationsInProject;


class ApiController extends Controller
{
    public function __construct()
    {
        //$this->model = new Main();
        parent::__construct();
    }

    function index()
    {
        $data = parent::index();
        echo "hi";

        //$this->view->generate('main', 'template_view', $data);
    }
    function upMigration(){
        $anonymousMigration = MigrationsInProject::getAnonymousClass($this->post('migration'));
        $anonymousMigration->up();

        return json_encode(['success' => true]);
    }
    function downMigration(){
        $anonymousMigration = MigrationsInProject::getAnonymousClass($this->post('migration'));
        $anonymousMigration->down();

        return json_encode(['success' => true]);
    }
    function createMigration(){
        MigrationsInProject::createFileMigration('create', $this->post('migration'));

        return json_encode(['success' => true]);
    }

    private function post(string $data){
        return $_POST["$data"];
    }
}