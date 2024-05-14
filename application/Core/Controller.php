<?php

namespace Core;

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
	    $data = [
            'tables'=>$this->model->tables,
            'migrations'=>$this->model->migrations,
            'result'=>$this->model->result
        ];

        return $data;
	}
}
