<?php

require($_SERVER['DOCUMENT_ROOT'].'/libraries/db_connection.php');

class CarModel extends DatabaseConnection{
    const DB_CONNECTION = '';

    public function __construct(){
        
    }

    public function all(){
        echo "called model all()";
        echo "<br /><hr />";
        $this->dbconnect = new DatabaseConnection();
        $connect = $this->dbconnect->connect();
        echo "yah!";
        echo "<br /><hr />";
        var_dump($connect);
        echo "<br /><hr />";
        if( $connect != false ) {
            echo "connect in";
            echo  "<br /><hr />";
            var_dump("yep here i am in true");
            if($connect != false) {
                echo "connect not false";
                $query = 'SELECT * FROM cars';
                try{
                    $result = pg_query($this->DB_CONNECTION, $query);
                    $arr = pg_fetch_all($result);
                    // return pg_fetch_all($result);
                } catch (Exception $e) {
                    return false;
                }
            } else {
                echo "else 2";
                echo "<br /><hr />";
                return false;
            }
        } else {
            echo "else 1";
            echo "<br /><hr />";
            return false;
        }
    }
}