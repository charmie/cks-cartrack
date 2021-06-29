<?php

require($_SERVER['DOCUMENT_ROOT'].'/libraries/db_connection.php');

class CarModel extends DatabaseConnection{
    const DB_CONNECTION = '';

    public function __construct(){
        
    }

    public function all(){
        var_dump("called model all()");
        $this->dbconnect = new DatabaseConnection();
        $connect = $this->dbconnect->connect();
        if( $connect != false ) {
            var_dump("yep here i am in true");
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