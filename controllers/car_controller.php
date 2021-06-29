<?php

class CarController extends CarModel{
    const DB_CONNECTION = '';

    public function __construct(){
        //$this->DB_CONNECTION = new DatabaseConnection();
    }
    public function create(){
        $data = array(
            'status' => 'SUCCESS',
            'message' => 'This is the create api'
        );
        echo json_encode($data);
    }

    public function read(){
        $result = CarModel::all();
        
        echo "Yow this is the result";
        echo "<br /><hr />";
        var_dump($result);
        echo "<br /><hr />";
        echo "The Type:";
        echo "<br /><hr />";
        var_dump(gettype($result));

        if($result != false) {
            $data = array(
                'data' => $data,
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