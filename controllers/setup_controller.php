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
            // $this->create_schema();
            $this->check_data();

        } else {
            echo 'Connection status bad';
        }
    }

    private function check_data(){
        /*$query = "SELECT *
        FROM pg_catalog.pg_tables
        WHERE schemaname != 'pg_catalog' AND 
            schemaname != 'information_schema'"; */
        $query = 'SELECT * FROM orders';

        $result = pg_query($this->DB_CONNECTION, $query);
        var_dump($result);
        $arr = pg_fetch_all($result);
        foreach( $arr as $data) {
            var_dump($data) . "<br />";
        }

    }

    /*
    private function create_schema(){
        $query = 'CREATE SCHEMA cks_exam1';
        try {
            $result = pg_query($this->DB_CONNECTION, $query);
            
            if (!$result) {
                echo "DB Already exists.\n";
            }
            return true;
            
        } catch (Exception $e) {
            echo json_encode('An error occurred');
            return false;
        }       
        echo "Did i still reach here?"; 
    }
   
    private function delete_schema(){
        $query = 'SELECT datname FROM pg_database';
        try {
            $result = pg_query($this->DB_CONNECTION, $query);
            $arr = pg_fetch_all($result);
            foreach( $arr as $db) {
                echo $db['datname']
            }

            if (!$result) {
                echo "An error occurred.\n";
                return false;
            }
            
            return true;

        } catch (Exception $e) {
            echo json_encode('An error occurred');
            return false;
        }
    }
    */
}