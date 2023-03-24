<?php
//Make connection to database
include 'connection.php'; 
//(a)Gather from $_POST[]all the data submitted and store in variables
if (isset($_POST['submit'])){
	$name = filter_var($_POST['tname'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	$shopname = filter_var($_POST['sname'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
	$sproducts = filter_var($_POST['sproducts'], FILTER_SANITIZE_STRING);
	
    $token = bin2hex(random_bytes(15));

	$emailquery = "select * from Reg where email = '$email'";
    $iquery = oci_parse($conn, $emailquery);

    $emailcount = oci_execute($iquery);

	// $err = '';
	if (empty($name)) {
		$err = $err."Please fill the name";
	} elseif (!preg_match('/^[aA-zZ]+$/', $name)) {
		$err = $err."Name can only have alpha characters";
	}
    
    if(empty($email)) {
		$err = $err."Please fill the email";
	}

	if (empty($shopname)) {
		$err = $err."Please select an location";
	}

	if (empty($category)) {
		$err = $err."Please accept all the terms";
	}
    if (empty($sproducts)) {
		$err = $err."Please accept all the terms";
	}

	$_SESSION['name']= $name;
	$_SESSION['email']= $email;
	$_SESSION['sname']= $shopname;
    $_SESSION['category']= $category;
	$_SESSION['sproducts']= $sproducts;

	if(!empty($err)){
		trim($err, "&");
		header ('location:addshop.php?'.$err); 
	} else {
		// $insertquery="INSERT INTO Reg(name, email, password, location, rdate, token, status) VALUES ('".$name."', '".$email."', '".$password."', '".$location."', '".$date."', '".$token."', 'inactive')";

		$query = oci_query($connection, $insertquery1);
		if($query){			
            $to_email = "shopup2022@gmail.com";
            $subject = "Verification for new shop.";
            $body = "This is the request from the $name. The shop name is $shopname from the $category category. Here are some products from the shop $sproducts. To activate the shop of $name. ,Click here 
			http://localhost/ShopUp/registration/activate.php?token=$token";
            $sender = "From: shopup2022@gmail.com";

            if(mail($to_email, $subject, $body, $headers)){
				$_SESSION['msg'] = "Check your mail to activate.";
                echo "Email successfully sent to $to_email....";
				//header('location:login.php);
            } else {
                echo "Email sending failed...";
            }
			session_destroy();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . oci_error($connection);
		}
		header ('location:addshop.php');
	}
	exit();
}
?>
