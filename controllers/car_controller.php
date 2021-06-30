<?php

class CarController extends CarModel{
    private $car_model = null;

    public function __construct(){
        $this->car_model = new CarModel();
    }
    
    // http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/create  
    public function create() {
        $data = array ();
        if( $_SERVER['REQUEST_METHOD'] == 'POST') {

            $new_values = json_decode(file_get_contents('php://input'), true);
            $validate = $this->validate($new_values);
            
            //$this->car_model->save($new_values);
    
            $data = array(
                'status' => 'SUCCESS',
                'message' => 'This is the create api'
            );
            
        } else {
            $data = array(
                'status' => 'FAILED',
                'message' => 'Method not allowed'
            );
        }

        echo json_encode($data);
        
    
        
    }

    public function validate($_data) {
        $valid_fields_counter = 0;
        $fields_counter = count(CarModel::table_columns);
        $keys = array_keys($_data);
        foreach(CarModel::table_columns as $field){
            $test = array_search('$field', $keys);
            if($test != false) {
                $valid_fields_counter++;
            }
        }

        echo "FIELDS COUNTER: ".$fields_counter;
        echo "<br /><hr />";
        echo "VALID FIELDS: ".$valid_fields_counter;
        echo "<br /><hr />";

        if($fields_counter == $valid_fields_counter) {
            echo "ALL REQUIRED FIELDS ARE IN HERE";
        } else {
            echo "PLEASE FILL UP ALL REQUIRED FIELDS";
        }
    }

    // http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/read
    public function read(){
        $data = NULL;
        if( $_SERVER['REQUEST_METHOD'] == 'GET') {
            $result = $this->car_model->all();

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
            
        } else {
            $data = array(
                'status' => 'FAILED',
                'message' => 'Method not allowed'
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