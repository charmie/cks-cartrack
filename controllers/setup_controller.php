<?php

class SetupController {
    const DB_CONNECTION = null;

    public function __construct(){
        $this->DB_CONNECTION = pg_connect('host=ec2-176-34-237-141.eu-west-1.compute.amazonaws.com dbname=d1b4oe0cmou81i user=jljbzxjcxicvvn sslmode=require port=5432 password=f608bcd12574fc48e322dcc08ca5dc6829404f3cb598eb36812439392ad2b4d7');
    }

    public function test(){
        echo json_encode('henlow! dont cha worry this is part of learning and brushing up okie? no rush.');
    }

    public function setup_database(){
        $stat = pg_connection_status($this->DB_CONNECTION);
        if ($stat === PGSQL_CONNECTION_OK) {
            $delete = $this->delete_schema();
            if( $delete ){
                $this->create_schema();
            }
        } else {
            echo 'Connection status bad';
        }    
    }

    private function create_schema(){
        $query = 'CREATE SCHEMA cks_exam1';
        try {
            $result = pg_query($this->DB_CONNECTION, $query);
            
            if (!$result) {
                echo "DB Already exists.\n";
            }

            $arr = pg_fetch_array($result, 0, PGSQL_NUM);
            var_dump($arr);
            $searchDB = array_search('cks_exam1', $arr);
            echo "-------------------------------------------";
            var_dump*($searchDB);
            
        } catch (Exception $e) {
            echo json_encode('An error occurred');
            return false;
        }
        

        
    }

    private function delete_schema(){
        $query = 'SELECT datname FROM pg_database';
        try {
            $result = pg_query($this->DB_CONNECTION, $query);
            if (!$result) {
                echo "An error occurred.\n";
                exit;
            }
            var_dump(gettype($result));
            return true;

        } catch (Exception $e) {
            echo json_encode('An error occurred');
            return false;
        }
    }
}