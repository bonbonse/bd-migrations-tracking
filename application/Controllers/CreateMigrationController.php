<?php


namespace Controllers;


use Core\Controller;
use DB\DB;
use Modules\Blueprint;
use Modules\Schema;

class CreateMigrationController extends Controller
{
    public function __construct()
    {
        //$this->model = new Structure();
        parent::__construct();
    }

    function index()
    {
        //$this->model->get_data();
        $data = parent::index();

        echo "hi";

        Schema::create('migrations', function (Blueprint $table){
            $table->id();
            $table->string('migration');
            $table->timestamps();
        });
        //нужно сформировать миграцию и уже потом её применить


        $this->view->generate('main', 'template_view', $data);
    }
}