
		if($query){			
            
            $subject = "Verification of new user.";
            $body = "To activate the account of $name. ,Click here 
			http://localhost/ShopUp/registration/cactivate.php?token=$token";
            $sender = "From: garimagorkhali@gmail.com";

            if(mail($email, $subject, $body, $headers)){
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
