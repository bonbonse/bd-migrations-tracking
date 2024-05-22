<?php
namespace Controllers;

use Core\Controller;
use DB\DB;
use Models\Table;
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
        var_dump("createMigration");

        $post = $this->post('migration');
        $this->model = new Table();
        $fields = $this->model->getTable($post);

        MigrationsInProject::createFileMigration('create', $post, $fields);

        return json_encode(['success' => true]);
    }

    function createMigrationTable(){
        var_dump("createMigrationTable");
        $name = 'migration';
        $fields = [0 => ['Key' => 'PRI', 'Field' => 'id', 'Type' => 'INT'],
            1 => ['Key' => NULL, 'Field' => 'name', 'Type' => 'varchar(50)'],
            2 => ['Key' => NULL, 'Field' => 'dateCreated', 'Type' => 'date']];

        MigrationsInProject::createFileMigration('create', $name, $fields);

        return json_encode(['success' => true]);
    }

    private function post(string $data){
        return $_POST["$data"];
    }
}