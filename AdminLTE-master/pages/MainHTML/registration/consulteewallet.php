<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || (!isset($_SESSION["role"])) || $_SESSION["role"] !== "consultee"){
        header("location: index.php");
        exit;
    }


    if(isset($_POST['Update'])){
        $connect = mysqli_connect("localhost", "root", "", "consuling center");
        $Assets = $_POST['Assets'];
        $Email = $_SESSION['email'];
        //The money that you want to put in ur wallet must be natural number(positive number)
        if ($Assets>0){
        $query = "UPDATE `consultee` SET `Assets`= `Assets` + $Assets WHERE `Email` = '".$Email."'";
        $result = mysqli_query($connect, $query);
            if ($result){
                echo 'Data Updated';
            } else{
                echo 'Data Not Updated';
            }
            mysqli_close($connect);
            header("location: ../ConsulteePanel.php");
        } else {
            echo "<script>alert('Put a real money!')</script>";

        }
    
    }
    
?>
