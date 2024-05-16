<?php
namespace Controllers;

use Core\Controller;
use Migrations;


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
        $fileName = $_POST['migration'];

        die();
        $migration = new $migrationName[0]();
        var_dump($migration);
        $migration->up();

        return json_encode(['success' => true]);
    }
    function downMigration(){
        $fileName = $_POST['migration'];
        $migrationName = explode('.', $fileName);
        $migration = new create_users(); //TODO: исправть на $migrationName[0]
        var_dump($migration);
        $migration->down();
        var_dump($migration);
        return json_encode(['success' => true]);
    }
    function createMigration(){
        $migrationName = $_POST['migration'];
        //TODO: Создать миграцию
        return json_encode(['success' => true]);
    }

}