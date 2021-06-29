<?php

require($_SERVER['DOCUMENT_ROOT'].'/configs/app.php'); // server

class Database extends AppConfig{
    const APP_CONFIG = null;
    const DB_CONNECTION = null;

    public function __construct() {}
    
    public function connect(){
        try {
            $connectivity_string = 'host='. AppConfig::DB_HOST
                                        .' dbname='.AppConfig::DB_NAME
                                        .' user='.AppConfig::DB_USER
                                        .' sslmode='.AppConfig::SSL_MODE
                                        .' password='.AppConfig::DB_PASSWORD;
            return pg_connect($connectivity_string);
        } catch (Exception $e) {
            return false;
        }
    }
}