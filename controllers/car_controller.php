<?php

// require_once('../libraries/db_connection.php');
//define('__ROOT__', dirname(dirname(__FILE__)));

// require($_SERVER['DOCUMENT_ROOT'].'/PHP/cks-cartrack/libraries/db_connection.php');

//vclass CarController extends DatabaseConnection{
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