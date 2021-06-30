<?php

class CarController extends CarModel{
    private $car_model = null;

    public function __construct(){
        $this->car_model = new CarModel();
    }
    
    // http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/create  
    public function create() {
        $data = array ();
        if( $_SERVER['REQUEST_METHOD'] == 'GET') {

            // $new_values = json_decode(file_get_contents('php://input'), true);
            $new_values = '{
                "model_name": "Toyota Innova 2015",
                "model_type": "Innova",
                "model_brand": "Toyota",
                "model_year": "2015",
                "model_date_added" : "",
                "model_date_modified": ""
              }';
              $new_values = json_decode($new_values);
              $new_values = (array) $new_values;
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

        // echo json_encode($data);
        
    
        
    }

    public function validate($_data) {
        $valid_fields_counter = 0;
        $fields_counter = count(CarModel::table_columns);
        $keys = array_keys($_data);
        echo "KEYS";
        echo "<br /><hr />";
        foreach($keys as $key) {
            echo $key;
            echo "<br /><hr />";
        }
        foreach(CarModel::table_columns as $field){
            
            $test = array_search($field, $keys);
            echo $field. ' = '.$test;
            echo "<br /><hr />";
            if($test != false) {
                echo "\n";
                echo 'OK - '.$field;
                echo "<br /><hr />";
                $valid_fields_counter++;
            }
            
        }
        /*
        echo " FIELDS COUNTER: ".$fields_counter;
        echo "<br /><hr />";
        echo " VALID FIELDS: ".$valid_fields_counter;
        echo "<br /><hr />";
        */

        if($fields_counter == $valid_fields_counter) {
            echo "ALL REQUIRED FIELDS ARE IN HERE";
        } else {
            echo "PLEASE FILL UP ALL REQUIRED FIELDS";
        }
        echo "<br /><hr />";
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