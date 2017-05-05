<?php

			$host="localhost"; 
			$username="root";  
			$password=""; 
			$db_name="webtek-final";

			// Connect to server and select databse.
			$conn = mysqli_connect("$host", "$username", "$password", "$db_name");
			
			if(! $conn){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
?>
