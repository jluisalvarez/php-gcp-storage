<!DOCTYPE html>
<html>
	<head>
		<title>Mi blog</title>
		<meta charset="UTF8" />
	</head>
	
	<body>
		<h1>Welcome to my blog</h1>
		<img src="https://storage.googleapis.com/BUCKETNAME/FILEIMG.jpg" />
		<p>
		<?php
		  $dbserver = "IP-DNS-DATABASE";
		  $dbuser = "USER";
		  $dbpassword = "PASSWORD";
		  // Munca exponga claves en un documento raiz
		  
		  $conn = new mysqli($dbserver, $dbuser, $dbpassword);
		  
		  if(mysqli_connect_error()) {
			echo ("Database not available, ERROR: " . mysqli_connect_error());
		  } else {
			echo ("Database connection was successful.");
		  }
		 ?>
		 </p>

         <p><a href="index.html">Back to home</a></p>

	</body>
	
</html>
