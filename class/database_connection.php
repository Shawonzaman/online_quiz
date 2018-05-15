<?php

class Database_connection {
    public function __construct() {
        echo 'Construct Start';
        $localhost = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'db_online_exam';
        
        $conn = mysql_connect($localhost, $username, $password);
        if(!$conn){
            die('mysql server not connected');
        }
        else{
            mysql_select_db($db);
           // echo 'server and database connection ok';
        }
    }
}
