<!DOCTYPE html>
<html lang="en">
    
<head>
      <title>Pet Services</title><meta charset="UTF-8" />
    
      <link rel="stylesheet" href="assets/css/style.css">

      <style type="text/css"> 
      body {
      	background-image: url("assets/img/background.jpg");
      	background-repeat: no-repeat;
      	background-size: cover;
      	background-color: rgb(0,0,0); /* Black fallback color */
    	background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
      }

      </style>

    </head>
    <body>
        <div class="login">
            <div class="login-screen">            
                <form id="loginform" method="post" class="form-vertical" action="login.php">
                    <div class="app-title">
                        <h1>Login</h1>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                                <input name="usernameinp" id="usernameinp" type="text" class="login-field" placeholder="Username" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                                <input name="passwordinp" id="passwordinp" class="login-field" type="password" placeholder="Password" />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">

                        <span class="pull-right">
                            <input type="submit" class="btn btn-primary btn-large btn-block" name="Submit" value="Login" class="btn btn-success"/>
                        </span>
                    </div>
                </form>

            </div>
        </div>
		<?php
				
			error_reporting(0);
            ini_set('display_errors', 0);
			
			ob_start();
			session_start();
			
			$host="localhost"; // Host name 
			$username="root"; // Mysql username 
			$password=""; // Mysql password 
			$db_name="webtek_final"; // Database name 
			$tbl_name="user_account"; // Table name 

			// Connect to server and select databse.
			mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
			mysql_select_db("$db_name")or die("cannot select DB");

            // Define $myusername and $mypassword 
			$myusername=$_POST['usernameinp']; 
			$mypassword = md5($_POST['passwordinp']); 
        
			// Test if the variables have data
			if(isset($myusername, $mypassword)){
			
				// If result matched $myusername and $mypassword, table row must be 1 row
				if($count == 1){
                    
                    $_SESSION['createlog']=1;
                    die();
					session_register("usernameinp");
					session_register("passwordinp"); 
                    die();
					}  
					
				else if($count == 0){
						
					$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
					$result=mysql_query($sql);
					$count=mysql_num_rows($result);
					if($count == 1){
                        $_SESSION['createlog']=1;
					 die();
					
					}
				}else{
					echo "Wrong Username or Password";
				}							
			}
			if($_SESSION['logout'] == 3){
					session_destroy();	
				}
         die();
		?>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
