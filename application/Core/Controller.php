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
	    $data = [
            'tables'=>$this->model->tables,
            'result'=>$this->model->result,
            'migrations' => false
        ];
        if (!isset($data['tables'])){
            //TODO: добавить условия, при которых таблиц нет
        }
        if (!isset($data['tables']['migrations'])){
            //формируем таблицу миграций
        }

        return $data;

	}
}
