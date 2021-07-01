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
            if($validate) {
                $save = $this->car_model->save($new_values);
                if ($save) {
                    $data = array(
                        'status' => 'SUCCESS',
                        'message' => 'This is the create api'
                    );
                } else {
                    $data = array(
                        'status' => 'FAILED',
                        'message' => 'Something went wrong. Please contact system administrator.'
                    );
                }
            } else {
                $data = array(
                    'status' => 'FAILED',
                    'message' => 'Please complete all fields.'
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

    public function validate($_data) {
        $valid_fields_counter = 0;
        $fields_counter = count(CarModel::table_columns);
        $keys = array_keys($_data);
        foreach(CarModel::table_columns as $field){
            $test = array_search($field, $keys);
            if($test !== false) {
                
                $valid_fields_counter++;
            }
        }
        if($fields_counter == $valid_fields_counter) {
            return true;
        } else {
            return false;
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
        $data = array();
        if( $_SERVER['REQUEST_METHOD'] == 'PUT') {
            $update_values = json_decode(file_get_contents('php://input'), true);
            $validate = $this->validate_update($update_values);
            if($validate) {
                $this->car_model->modify($update_values);
                $data = array(
                    'status' => 'SUCCESS',
                    'message' => 'This is the update api'
                );
            } else {
                $data = array(
                    'status' => 'FAILED',
                    'message' => 'Unexisting column identified.'
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

    public function validate_update($_data) {
        $keys = array_keys($_data);
        $columns = CarModel::table_columns;
        if(array_search("id", $keys) === false){
            return false;
        } else {
            array_push($columns,'id');
            foreach($keys as $key) {
                $test = array_search($key, $columns);
                if($test === false) {
                    return false;
                }
            }
        }
        return true;
    }

    public function delete($id){
        $data = array();
        if( $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $this->car_model->destroy($id[0]);
            $data = array(
                'status' => 'Success',
                'message' => 'This is the delete api'
            );
            
        } else {
            $data = array(
                'status' => 'FAILED',
                'message' => 'Method not allowed'
            );
        }   
        echo json_encode($data);
    }

    public function search(){
        
        if( $_SERVER['REQUEST_METHOD'] == 'GET') { 
            if(empty($_GET)){
                $data = array(
                    'status' => 'FAILED',
                    'message' => 'Please enter query string in URL param'
                );
            } else {
                $is_valid_fields = true;
                foreach($_GET as $key => $value) {
                    $is_valid_field = array_search($key,CarModel::table_columns);
                    if($is_valid_field === false) {
                        $data = array(
                            'status' => 'Failed',
                            'message' => 'Invalid search key(s)'
                        );
                        $is_valid_fields = false;
                        break;    
                    }
                    
                }
                
                if($is_valid_fields) {
                    $search_result = $this->car_model->find($_GET);
                    $data = array(
                        'data' => $search_result,
                        'status' => 'Success',
                        'message' => 'This is the search api'
                    );
                }
            }
            
        } else {
            $data = array(
                'status' => 'FAILED',
                'message' => 'Method not allowed'
            );
        } 
        echo json_encode($data);
    }

    
}