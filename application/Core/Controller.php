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

        $up = $this->model->migrations;
        $down = MigrationsInProject::getDownMigrations($up);
        $none = MigrationsInProject::getNoneMigrations($this->model->tables);

        $url_str = explode('?', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $url_str[0]);
        $controllerName = (isset($routes[1])) ? $routes[1] : '';;
        $action = (isset($routes[2])) ? $routes[2] : '';
        $table = (isset($_GET['table'])) ? $_GET['table'] : '';

        $data = [
            'tables'=>$this->model->tables,
            'migrations'=> ['up' => $up, 'down' => $down, 'none' => $none],
            'result'=>$this->model->result,
            'url' => ['controllerName' => $controllerName, 'action' => $action, 'table' => $table]
        ];

        return $data;
	}
}
