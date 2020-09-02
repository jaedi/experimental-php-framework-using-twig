<?php
session_start();

require '../database/database_connection.php';
$connection = new DatabaseConnection();
$con = $connection->con();

if( !isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields!');
}

if($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        //Account exists and verify the password
        if(password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: ../../dashboard');
        } else {
            echo 'Incorrect password';
        }
    } else {
        echo 'Incorrect username';
    }
    $stmt->close();
}
?>