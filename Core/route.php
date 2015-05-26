<?php
	session_start();
	class Route {
		static function start() {
			// default behaviour
			$controller_name = 'Main';
			$action_name = 'index';
			$routes = explode('/', $_SERVER['REQUEST_URI']);

			// Get controller's name
			if( !empty($routes[3]) ) {
				$controller_name = $routes[3];
			}
			// Get action's name
			if( !empty($routes[4]) ) {
				$action_name = $routes[4];
			}
			// Add prefixes
			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'action_'.$action_name;

			// Add model's class file
			$model_file = strtolower($model_name).'.php';
			$model_path = 'app/models/'.$model_file;
			if( file_exists($model_path) ) {
				include 'app/models/'.$model_file;
			}

			// Add controller's class file
			$controller_file = strtolower($controller_name).'.php';
			$controller_path = 'app/controllers/'.$controller_file;
			if( file_exists($controller_path) ) {
				include 'app/controllers/'.$controller_file;
			} else {
				Route::ErrorPage404();
			}

			// Create controller
			$controller = new $controller_name;
			$action = $action_name;

			if( method_exists($controller, $action) ) {
					$controller->$action();
			} else {
				Route::ErrorPage404();
			}
		}

		function ErrorPage404() {
			$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
			header('HTTP/1.1 404 Not Found');
			header('Status: 404 Not Found');
			header('Location:'.$host.'php_unicreo/app/views/404_view.php');
		}
		// function LoginPage() {
		// 	$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		// 	header('Location:'.$host.'php_unicreo/app/views/login_view.php');
		// }
	}
?>