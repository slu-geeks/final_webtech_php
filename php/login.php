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
  <div align="center">
    <div style="width:300px; border: solid 1px #006D9C; " align="left">
      <?php
        if(isset($errMsg)){
          echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
        }
      ?>
      <div style="background-color:#006D9C; color:#FFFFFF; padding:3px;text-align:center; font-size:18px;"><b>User Login </b></div>
      <div style="margin:30px">
        <form action="" method="post">
          <label>Username  :</label><input type="text" name="username" class="box"/><br /><br />
          <label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
          <input type="submit" name='submit' class="btn btn-info" value="Submit" class="col s6" class='submit'/><br />
        </form>
      </div>
    </div>
  </div>

    <?php
    $errMsg = "";
  if(isset($_POST['submit'])){
    //username and password sent from Form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($username == '')
      $errMsg .= 'You must enter your Username<br>';
    
    if($password == '')
      $errMsg .= 'You must enter your Password<br>';
    
    //if($errMsg == ''){
        if($username && $password){
            $connect = new PDO("mysql:host=localhost;dbname=webtek_final;charset=utf8", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $records = $connect->prepare("SELECT * FROM user_account WHERE username='$username' AND password='$password'");
            $numberrow = $connect->query("SELECT username, password FROM user_account ");
            
      //$records->bindParam(':username', $username);
            $records->execute();
            $counter = $numberrow->rowCount();
            
            
            if($counter != 0){
                while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                    $dbuser = $rows["username"];
                    $dbpass = $rows["password"];

                    
                    if($username == $dbuser && $password == $dbpass ) {
                        session_start();
                        $_SESSION["username"]=$dbuser;
                        header('Location: pages/index.php');

                    }else{
                       $errMsg .= "User Credentials Not Found!";
                    }
                }
            }

    }
        
  }
 
?>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
