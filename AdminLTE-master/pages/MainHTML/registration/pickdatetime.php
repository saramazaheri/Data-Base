<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || (!isset($_SESSION["role"])) || $_SESSION["role"] !== "consultee"){
    header("location: index.php");
    exit;
}
$Consultee_Email = $_SESSION['email'];
$Consultant_Email = $_POST['consultantemail'];

$DateTime = $_POST['DateTime'];

//$Financial = financial ba consulant_email ;  => select role,email from consultant where email = Consultant_Email
$con = new mysqli("localhost", "root", "", "consuling center");
$stmt = $con->prepare("select Email,Role1 from consultant where Email = ?");
  $stmt->bind_param("s",  $Consultant_Email);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  $data2 = $stmt_result->fetch_assoc();
  //show all the money by role then it is financial
if($data2['Role1']=='Adult'){
    $Financial=250;
}elseif($data2['Role1']=='Teen'){
    $Financial=200;
}elseif($data2['Role1']=='Child'){
    $Financial=150;
}
//echo $DateTime;
//Updated consultee financial after paying some money
$query = "UPDATE `consultee` SET `Assets`= `Assets` - $Financial WHERE `Email` = '".$Consultee_Email."'";
$result = mysqli_query($con, $query);
//Updated consultant financial after adding some money
$query = "UPDATE `consultant` SET `Assets`= `Assets` + $Financial WHERE `Email` = '".$Consultant_Email."'";
$result = mysqli_query($con, $query);
//insert all of these into attends_to table
$stmt = $con->prepare("insert into attends_to(Consultee_Email, Consultant_Email, DateTime, Financial) values(?, ?, ?, ?)");
$stmt->bind_param("sssi", $Consultee_Email, $Consultant_Email, $DateTime, $Financial);
$execval = $stmt->execute();
//after book an appointment go to consultee panel again
header("location: ../ConsulteePanel.php")
?>