<?php

class Model
{
	public $dataFileName;

	public function __construct($modelName)
    {
		$this->dataFileName = DATA_FOLDER.DS.$modelName.'.json';
	}

	public function load($id = false)
    {
		$data=file_get_contents($this->dataFileName);
		$data=json_decode($data, true);

		if($id == false) {
			return $data;
		}
		else {
			if (array_key_exists($id, $data)) {
				return $data[$id];	
			}	
		}
		return false;
	}


	public function create(array $item)
    {
		$data=file_get_contents($this->dataFileName);
		$data=json_decode($data, true);
		array_push($data, $item);
		return file_put_contents($this->dataFileName, json_encode($data));
	}


	public function save($id, $item)
    {
        $data = file_get_contents($this->dataFileName);
        $data = json_decode($data, true);

        if(array_key_exists($id, $data)) {
            $data[$id] = $item;
        }

        return file_put_contents($this->dataFileName, json_encode($data));
	}


	public function delete($id)
    {
		$data = file_get_contents($this->dataFileName);
        $data = json_decode($data, true);
        unset($data[$id]);

        return file_put_contents($this->dataFileName, json_encode($data));
	}
}