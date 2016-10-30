<?php

/**
* Router
* 
* Класс служит для роутинга. В зависимоти от URL запроса подключаем нужный controller и action
* 
*/
class Router {

	private $routes; // массив роутов
	
	public function __construct() {
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
	
	/**
	 * возвращаем строку запроса
	 * @return string
	 */
	private function getURI() {
		if( !empty($_SERVER['REQUEST_URI']) )
			return trim ( $_SERVER['REQUEST_URI'], '/' );
	}

	/**
	 * функция определяет какой controller и action подключать в зависимости от запроса
	 */	
	public function run(){
		// получить строку запроса
		$uri = $this->getURI();		
		
		// проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {
			// сравниваем $uriPattern и $uri
			if(preg_match("~$uriPattern~", $uri) ){
				
				// получаем внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);								
				
				// определяем контроллер, action, параметры
				$segments = explode('/', $internalRoute);
				
				$controllerName = ucfirst(array_shift($segments)).'Controller';
				$actionName = 'action'.ucfirst(array_shift($segments));
				
				$parameters = $segments;
				
				// подключить файл класса-контроллера
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				if( file_exists($controllerFile) )
					include_once ($controllerFile);
		
				// создать объект, вызвать метод (т.е. action)				
				$controllerObject = new $controllerName;
				$result = call_user_func_array( array($controllerObject, $actionName), $parameters);
				
				if( $result != NULL )
					break;
				
			}
		}	
		
	}
	
}
