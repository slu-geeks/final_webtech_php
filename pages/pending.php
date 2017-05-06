<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet Services</title><meta charset="UTF-8" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="assets/js/script.js" defer="defer"></script>
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

        function echoActiveClassIfRequestMatches($requestUri){
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

            if ($current_file_name == $requestUri)
                echo 'class="active-menu"';
        }

    ?>
    
    <div id="wrapper">
        <?php include 'fragments/page-head.php'; ?>
        <!-- /. NAV TOP  -->
        <?php include 'fragments/sidebar-nav.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Pending Requests</h2>   
                    </div>    
                </div>
                <div class="jumbotron">
                  <?php
               require_once 'fragments/connection.php';
                $query = $pdo->prepare("SELECT service_name, service_price, service_duration FROM pet_service");
                $query->execute();
                $result = $query->fetchAll();

            ?>  
                 <!-- /. ROW  -->
                        <div class="panel-heading">
                           Pending Requests as of <?php echo date("Y-m-d") ?> 
                        </div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                                        <?php
                                             require_once 'fragments/connection.php';

                                             $usr = $_SESSION['username'];

                                            $query = $pdo->prepare("SELECT b.username AS sp_username, a.username AS cust_username, request_status, pet_service.service_name, start_servicing, end_servicing,  service_price FROM service_request INNER JOIN user_account AS b ON service_request.account_id = b.account_id  INNER JOIN user_account AS a ON service_request.cust_id = a.account_id  INNER JOIN pet_service ON service_request.service_id = pet_service.service_id WHERE request_status = 01 AND b.username = '$usr'"); 
                                            $query->execute();
                                            $result = $query->fetchAll();
                                            
                                            echo "<tr>";
                                            echo "<th> Date </th>";
                                            echo "<th>Customer</th>";
                                            echo "<th> Service Name </th>";
                                            echo "<th>Amount</th>";
                                            echo "<th>More Details</th>";
                                            echo "</tr>";

                                            foreach($result as $query){
                                                echo "<tr>";
                                                echo "<td>" . $query['start_servicing'] . "</td>";
                                                echo "<td>" . $query['cust_username'] . "</td>";
                                                echo "<td>" . $query['service_name'] . "</td>";
                                                echo "<td>" . $query['service_price'] . "</td>";
                                                echo "<td>" . "<button onclick='document.getElementById('reply_modal').style.display='block''class='button'>Details</button>" . "</td>"; 
                                                echo "</tr>";
                                            }
                                        ?>

                                    </table>
                    
                    <button id="reply_btn" type="button" class="btn btn-default">View Details</button>

                    <!--
                    <button type="button" class="btn btn-primary">Accept</button>
                    <button type="button" class="btn btn-primary">Reject</button>
                -->

                </div>
                              
            </div>
        </div>
    </div>

    <!-- The Modal -->
   <div id="reply_modal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Request Details</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                         require_once 'fragments/connection.php';

                         $usr = $_SESSION['username'];
                         echo $usr;

                        $query = $pdo->prepare("SELECT b.username AS sp_username, a.username AS cust_username, request_status, pet_service.service_name, start_servicing, end_servicing,  service_price FROM service_request INNER JOIN user_account AS b ON service_request.account_id = b.account_id  INNER JOIN user_account AS a ON service_request.cust_id = a.account_id  INNER JOIN pet_service ON service_request.service_id = pet_service.service_id WHERE request_status = 01 AND b.username = '$usr'"); 
                        $query->execute();
                        $result = $query->fetchAll();

                        
                        foreach($result as $query){
                            echo "<tr>";
                            echo "<td>" . $query['start_servicing'] . "</td>";
                            echo "<td>" . $query['end_servicing'] . "</td>";
                            echo "<td>" . $query['request_status'] . "</td>";
                            echo "<td>" . $query['service_name'] . "</td>";
                            echo "<td>" . $query['cust_username'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";

                        ?>


                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Accept</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Reject</button>
                </div>
            </div>
        </div>
    </div></body>
</html>    
