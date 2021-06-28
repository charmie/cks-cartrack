<?php

class SetupController {
    const DB_CONNECTION =  'host=ec2-176-34-237-141.eu-west-1.compute.amazonaws.com dbname=d1b4oe0cmou81i user=jljbzxjcxicvvn sslmode=require port=5432 password=f608bcd12574fc48e322dcc08ca5dc6829404f3cb598eb36812439392ad2b4d7';

    public function test(){
        echo json_encode('henlow! dont cha worry this is part of learning and brushing up okie? no rush.');
    }

    public function setup_database(){
        $db_connection = pg_connect(self::DB_CONNECTION);
        $stat = pg_connection_status($db_connection);
        if ($stat === PGSQL_CONNECTION_OK) {
            echo 'Connection status ok';
        } else {
            echo 'Connection status bad';
        }    
    }
}