<?php

class userController extends Controller
{
    public function index()
    {
        $users=$this->model->load();
        $this->setResponse($users);
    }

    public function view($data)
    {
        $user = $this->model->load($data['id']);
        $this->setResponse($user);
    }

    public function add()
    {
        $postData=json_decode(file_get_contents('php://input'), TRUE);

        if(isset($postData['id']) && isset($postData['name']) && isset($postData['score'])){

            $dataToSave = array(
                'id' => $postData['id'],
                'name' => $postData['name'],
                'score' => $postData['score']);

            $addedItem=$this->model->create($dataToSave);
            $this->setResponse($addedItem);
        }
    }

    public function edit($data)
    {
        $postData=json_decode(file_get_contents('php://input'), TRUE);

        if(isset($postData['id']) && isset($postData['name']) && isset($postData['score'])){

            $dataToSave = array(
                'id' => $postData['id'],
                'name' => $postData['name'],
                'score' => $postData['score']);

            $updateItem = $this->model->save($data['id'], $dataToSave);
            $this->setResponse($updateItem);
        }
    }

    public function delete($data)
    {
        $deleteItem = $this->model->delete($data['id']);
        $this->setResponse($deleteItem);
    }
}