<?php

require($_SERVER['DOCUMENT_ROOT'].'/libraries/db_connection.php');

class CarModel extends DatabaseConnection{
    public function __construct(){
        
    }

    public function all(){
        $dbc = new DatabaseConnection();
        $connect = $dbc->connect();
        if( $connect != false ) {
            if($connect != false) {
                $query = 'SELECT * FROM cars';
                try {
                    $result = pg_query($connect, $query);
                    $arr = pg_fetch_all($result);
                    return $arr;
                } catch (Exception $e) {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}