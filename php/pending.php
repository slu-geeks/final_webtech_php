<!DOCTYPE html>
<html lang="en">

<head>
<title>Pet Services</title>
<meta charset="utf-8">
</head>
<body>
<?php
   //Start your session
	session_start();
	if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
		echo "You are logged in as, " . $_SESSION['username'] . "!";
	} else {
		header("location: login.php");
	}
  
?>
<?php 

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active-menu"';
}

?>

<?php
               require_once 'fragments/connection.php';
                $query = $pdo->prepare("SELECT service_name, service_price FROM pet_service");
                $query->execute();
                $result = $query->fetchAll();

            ?>  
                 <!-- /. ROW  -->
                        <div class="panel-heading">
                           Pending Requests as of <?php echo date("Y-m-d") ?> 
                        </div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                                    <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Service Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>

</body>
</html>    