<?php
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Gender = $_POST['Gender'];
	$Email = $_POST['Email'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $DateOfBirth = $_POST['DateOfBirth'];
	$Password = $_POST['Password'];
	$ConfirmPassword = $_POST['ConfirmPassword'];

	// Database connection
	$conn = new mysqli('localhost','root','','consuling center');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $stmt = $conn->prepare("select email from users where email = ?");
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
        if ($Password == $ConfirmPassword){
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("insert into users (Email, Password, Role) values(?, ?, 'consultee')");
        $stmt->bind_param("ss", $Email, $Password);
        $execval = $stmt->execute();
		$stmt = $conn->prepare("insert into consultee(FirstName, LastName, Gender, Email, PhoneNumber, DateOfBirth) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssii", $FirstName, $LastName, $Gender, $Email, $PhoneNumber, $DateOfBirth);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
        }
    else{
        echo "Password and Confirm Password do not match";
    }
	}
}
?>