<?php

include "connection.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
</head>
<body>

<h1>Registration Form</h1>
	<form method="POST" action="insertRegistration.php">
		<fieldset>
			<legend>Register New Trader</legend><br>
			<label>Trader Name: </label><input type="text" name="tname" placeholder= "Your Name"><br>
			<?php
			?><br><br>

			<label>Email: </label><input type="email" name="email" placeholder= "Your Email"><br>
			<?php

			?><br><br>

			<label>Password: </label><input type="password" name="password" placeholder= "Enter Password Here"><br>
			<?php
        
			?><br><br>

			<label>Location: </label><select type="location" name= "location">
              <option selected>Select your location from the menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
			<?php
        
			?><br><br>
			</select> <br>
			<br><br>

			<label>Est. Date: </label><input type="date" name="date"><br>
			<?php
        
			?><br><br>

			<input type="checkbox" name="terms" <?php if (!empty($terms)) {echo "checked";}?>><label> I agree to all the terms and condition</label><br>
			<?php

			?><br><br>

			<input type="submit" name="submit" value="Submit" class="submit"><br><br>
			
		</fieldset>
	</form>

</body>
</html>