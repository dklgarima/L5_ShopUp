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

<h1>Add Shop</h1>
	<form method="POST" action="insertRegistration.php">
		<fieldset>
			<legend>Register New Shop</legend><br>
			<label>Trader Name: </label><input type="text" name="tname" placeholder= "Your Name"><br>
			<?php
			?><br><br>

			<label>Email: </label><input type="email" name="email" placeholder= "Your Email"><br>
			<?php

			?><br><br>

			<label>Shop Name: </label><input type="text" name="sname" placeholder= "Your shop name"><br>
			<?php
        
			?><br><br>

			
			<label>Shop Category: </label><input type="text" name="category"><br>
			<?php
        
			?><br><br>

            <label>Some Products: </label><input type="sproducts" name="sproducts"><br>
			<?php
        
			?><br><br>

			<input type="submit" name="submit" value="Submit" class="submit"><br><br>
			
		</fieldset>
	</form>

</body>
</html>