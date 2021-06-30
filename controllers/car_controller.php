<?php

class CarController extends CarModel{
    private $car_model = null;

    public function __construct(){
        $this->car_model = new CarModel();
    }
    
    // http://ec2-18-207-184-223.compute-1.amazonaws.com/api/car/create  
    public function create(){
        echo "<br /><hr />";
        var_dump($_POST);
        echo "<br /><hr />";
        if( $_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_values = array(
                'id' => '000001',
                'model_name' => 'Toyota Camry 2010',
                'model_type' => 'Camry',
                'model_brand' => 'Toyota',
                'model_year' => '2010',
                'model_date_added' => '',
                'model_date_modified' => ''
            );
    
            $this->car_model->save($new_values);
    
            $data = array(
                'status' => 'SUCCESS',
                'message' => 'This is the create api'
            );
            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'FAILED',
                'message' => 'Method not allowed'
            );
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