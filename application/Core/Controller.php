<?php

namespace Core;

use Modules\MigrationsInProject;

class Controller {
	
	public $model;
	public $view;

	public $table;

	public function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function index()
	{
	    //Действующие таблицы в бд - Таблица миграций - Миграции в проекте
        $this->model->getData();

        $files = MigrationsInProject::get();
        $data = [
            'tables'=>$this->model->tables,
            'migrations'=> ['up' => $files, 'down' => $this->model->migrations, 'none' => $this->model->tables],
            'result'=>$this->model->result
        ];

        return $data;
	}
}
