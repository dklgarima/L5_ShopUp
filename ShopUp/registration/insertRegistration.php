<?php
//Make connection to database
include 'connection.php'; 
//(a)Gather from $_POST[]all the data submitted and store in variables
if (isset($_POST['submit'])){
	$name = filter_var($_POST['tname'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
	$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
	$terms = filter_var($_POST['terms'], FILTER_SANITIZE_STRING);
	
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
	}elseif ($emailcount>0){
        $err = $err."Email already exists";
    }

	if (empty($password)) {
		$err = $err."Please fill the password";
	} elseif (!preg_match('/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/', $password)) {
		$err = $err."Password must includes at least one capital letter, a number and a symbol";
	} else {
		$password = md5($password);
	}

	if (empty($location)) {
		$err = $err."Please select an location";
	}

    if (!preg_match("^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$",$date))
    {
        $err = $err."Please fill the date in YYYY-MM-DD format.";
    }elseif(empty($date)) {
		$err = $err."Please select an date";
	}

	if (empty($terms)) {
		$err = $err."Please accept all the terms";
	}
	$_SESSION['name']= $name;
	$_SESSION['email']= $email;
	$_SESSION['location']= $location;
    $_SESSION['date']= $date;
	$_SESSION['terms']= $terms;
	if(!empty($err)){
		trim($err, "&");
		header ('location:register.php?'.$err); 
	} else {
		// $insertquery="INSERT INTO Reg(name, email, password, location, rdate, token, status) VALUES ('".$name."', '".$email."', '".$password."', '".$location."', '".$date."', '".$token."', 'inactive')";

		$insertquery1="INSERT INTO USER_TABLE(email, password, location, token, status) VALUES ('".$email."', '".$password."', '".$location."', '".$token."', 'inactive')";
		$insertquery2="INSERT INTO TRADER(email, rdate) VALUES ('".$name."', '".$date."')";
		$query = (oci_query($connection, $insertquery1) && (oci_query($connection, $insertquery2));
		if($query){			
            $to_email = "shopup2022@gmail.com";
            $subject = "Verification of new user.";
            $body = "To activate the account of $name. ,Click here 
			http://localhost/ShopUp/registration/activate.php?token=$token";
            $sender = "From: garimagorkhali@gmail.com";

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
		header ('location:register.php');
	}
	exit();
}
?>
