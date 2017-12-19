<?php

class App
{
	private $controller = 'index';
	private $action = 'index';

	private $request = array();
	private $response = array();

	public function __construct()
    {
		if(isset($_GET['controller'])) {
			$this->controller=$_GET['controller'];
		}

		switch ($_SERVER["REQUEST_METHOD"])
        {
			case 'GET':
				if(isset($_GET['id'])) {
					$this->action = 'view';
				}
				else {
					$this->action = 'index';
				}
				break;
			case 'POST':
				$this->action = 'add';
				break;
			case 'PUT':
				$this->action = 'edit';
				break;
			case 'DELETE':
				$this->action = 'delete';
				break;
			default:
				$this->action = 'index';
				break;
		}

		unset($_GET['controller']);
		$this->request=$_GET;
	}

	public function run()
    {
		$controllerName=$this->controller.'Controller';
		$modelName=$this->controller;

		$controllerInstance = new $controllerName($modelName);
		$action=$this->action;

		if (method_exists($controllerInstance, $action)) {
			$controllerInstance->$action($this->request);
			$this->response = $controllerInstance->getResponse();
		}
		else {
			$this->response = false;
		}

        if ($this->controller != "index")
        {
            header('Content-Type: application/json');
            $this->response = json_encode($this->response);
        }

        return $this->response;
	}
}