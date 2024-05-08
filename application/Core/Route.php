<?php

namespace Core;

use Models\Structure;

class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controllerName = 'Main';
		$actionName = 'index';

        $url_str = explode('?', $_SERVER['REQUEST_URI']); // делит на 2 то, что до '?' и то, что после

        $routes = explode('/', $url_str[0]);
        //$attributes = explode('&', $url_str[1]);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controllerName = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$actionName = $routes[2];
		}
		if ($controllerName === "404"){
		    $controllerName = "Page404";
        }
		// добавляем префиксы
		$controllerName = ucfirst($controllerName).'Controller';

		// подцепляем файл с классом контроллера
		$controllerClass = "Controllers\\".$controllerName;

//		if(!class_exists($controllerClass))
//		{
//		    Route::ErrorPage404();
//		}

		// создаем контроллер
		$controller = new $controllerClass();
		$action = $actionName;


        if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}

	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
