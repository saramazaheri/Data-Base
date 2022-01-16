<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //Database connection
    $con = new mysqli('localhost', 'root', '', 'consuling center');
    if($con->connect_error){
        die("Connection failed: " .$con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['password'] === $password) {
                echo "<h2>Login Successful</h2>";
            } else {
                echo "<h2>Login Failed</h2>";
            }
        } else {
            echo "<h2>Login Failed</h2>";
        }
    }
?>