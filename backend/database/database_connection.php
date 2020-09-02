<?php

class DatabaseConnection {
   public function con() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASSWORD = '';
    $DATABASE_NAME = 'LoginSystemDatabase';
    if(mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    return $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);
   }
}

?>