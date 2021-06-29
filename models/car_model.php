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
            echo  "<br /><hr />";
            if($connect != false) {
                echo "connect not false";
                echo  "<br /><hr />";
                $query = 'SELECT * FROM cars';
                try{
                    echo "start try";
                    echo  "<br /><hr />";
                    $result = pg_query($this->DB_CONNECTION, $query);
                    echo "end try";
                    echo  "<br /><hr />";
                    $arr = pg_fetch_all($result);
                    var_dump($arr);
                    echo  "<br /><hr />";
                    // return pg_fetch_all($result);
                } catch (Exception $e) {
                    echo "oh no why am i here";
                    echo  "<br /><hr />";
                    var_dump($e);
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