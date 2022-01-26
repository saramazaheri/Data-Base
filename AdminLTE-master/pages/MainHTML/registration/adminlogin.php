<?php
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //Database connection
    $con = new mysqli("localhost", "root", "", "consuling center");
    if($con->connect_error){
        die("Connection failed: " .$con->connect_error);
    } else {
        $stmt = $con->prepare("select email, password, role from users where email = ? and role = 'admin'");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if(password_verify($password, $data['password'])) {
                echo "<h2>Login Successful</h2>";
                header("Location: ../AdminPanel.php");
            } else {
                echo "<script>alert('Wrong Email or Password');</script>";
            }
        } else {
            echo "<script>alert('Wrong Email or Password');</script>";
            
        }
    }
?>