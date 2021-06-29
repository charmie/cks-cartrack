<?php

require($_SERVER['DOCUMENT_ROOT'].'/PHP/cks-cartrack/libraries/db_connection.php');

class CarModel extends DatabaseConnection{
    const DB_CONNECTION = '';

    public function __construct(){
        
    }

    public function all(){
        $this->dbconnect = new DatabaseConnection();
        $connect = $this->dbconnect->connect();
        if( $connect == true ) {
            if($connect != false) {
                $query = 'SELECT * FROM cars';
                try{
                    $result = pg_query($this->DB_CONNECTION, $query);
                    return pg_fetch_all($result);
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