<?php

namespace Core;

class Controller {
	
	public $model;
	public $view;

	public $table;
	public $rep;

	public function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function index()
	{
        return $data = [
            'tables'=>$this->model->tables,
            'result'=>$this->model->result
        ];
	}
}
