<?php

class Controller{

	public $model;
	public $data;
	public $response;

	public function __construct ($model = false, $data = false)
    {
		if ($model) {
			$modelName = $model.'Model';
			$this->model = new $modelName($model);
		}
		$this->data=$data;
	}
	

	public function setResponse ($response)
    {
		$this->response = $response;
	}

	public function getResponse()
    {
		return $this->response;
	}

}