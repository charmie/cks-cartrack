<?php

require($_SERVER['DOCUMENT_ROOT'].'/libraries/database.php');

class CarModel extends Database{

    const table_columns = array('model_name','model_type','model_brand','model_year,','model_date_added','model_date_modified');
    private $id, $model_name, $model_type, $model_brand, $model_year, $model_date_added, $model_date_modified;
    private $table = 'cars';
    
    public $dbc = null;

    public function __construct(){
        $this->dbc = new Database();
    }

    
    public function all(){
        $connect = $this->dbc->connect();
        if( $connect != false ) {
            if($connect != false) {
                $query = 'SELECT * FROM '.$this->table;
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

    public function save($_data){
        $columns = array();
        $values = array();
        foreach($_data as $key => $value) {
            array_push($columns,$key);
            if($key == 'model_date_added' || $key == 'model_date_modified') {
                $date_string = date('Y-m-d H:i:s');
                $value = $date_string;
            }
            array_push($values,"'".$value."'");
        }
        $column_string = implode(',', $columns);
        $value_string = implode(',', $values);
        echo $column_string;
        echo "<br /><br /><hr />";
        echo $value_string;
        echo "<br /><br /><hr />";

        $query = 'INSERT INTO ' . $this->table . '(' . $column_string . ') VALUES(' . $value_string . ')';
        $connect = $this->dbc->connect();
        $result = pg_query($connect, $query);
        var_dump($result);
        echo "<br /><br /><hr />";

    }


}