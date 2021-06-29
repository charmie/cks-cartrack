<?php

class CarController extends CarModel{

    public function __construct(){}
    public function create(){
        $data = array(
            'status' => 'SUCCESS',
            'message' => 'This is the create api'
        );
        echo json_encode($data);
    }

    public function read(){

        var_dump($_SERVER['REQUEST_METHOD']);
        echo "<br /><hr />";
        $result = CarModel::all();

        if($result != false) {
            $data = array(
                'data' => $result,
                'status' => 'SUCCESS',
                'message' => 'This is the read api'
            );
        } else {
            $data = array(
                'status' => 'FAILED',
                'message' => 'This is the read api'
            );
        }
        echo json_encode($data);
        
    }

    public function update(){
        $data = array(
            'status' => 'SUCCESS',
            'message' => 'This is the update api'
        );
        echo json_encode($data);
    }

    public function delete(){
        $data = array(
            'status' => 'SUCCESS',
            'message' => 'This is the delete api'
        );
        echo json_encode($data);
    }
}