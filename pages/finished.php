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
    <script src="../assets/js/script.js" defer="defer"></script>
</head>
<body>
    
       <?php
        //Start your session
        session_start();
        if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
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
                        <h2>Finished Requests</h2>   
                    </div>    
                </div>
                <div class="jumbotron">

                <div class="panel-heading">
                        
                        <!--Start of table -->
                        Finished Requests as of <?php echo date("Y-m-d") ?> 
                        </div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                                        <?php
                                             require_once 'fragments/connection.php';

                                             $usr = $_SESSION['username'];

                                            $query = $pdo->prepare("SELECT pet_service.service_name, start_servicing, end_servicing,  service_price FROM service_request inner join pet_service using (service_id) WHERE request_status = 04"); 
                                            $query->execute();
                                            $result = $query->fetchAll();
                                            
                                            echo "<tr>";
                                            echo "<th>Date Started</th>";
                                            echo "<th>Date Finished</th>";
                                            echo "<th> Service Name </th>";
                                            echo "<th>Amount</th>";
                                            echo "</tr>";

                                            foreach($result as $query){
                                                echo "<tr>";
                                                echo "<td>" . $query['start_servicing'] . "</td>";
                                                echo "<td>" . $query['end_servicing'] . "</td>";
                                                echo "<td>" . $query['service_name'] . "</td>";
                                                echo "<td>" . $query['service_price'] . "</td>";
                                                echo "</tr>";
                                            }
                                        ?>

                                    </table>


                </div>
                              
            </div>
        </div>
    </div>
    
    <div id="reply_modal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Service Details</h4>
                </div>
                <div class="modal-body">
                    <p>
                    <?php
                    require_once 'fragments/connection.php';
                    $query = $pdo->prepare("SELECT * FROM service_request where status = 'done'");
                    $query->execute();
                    $result = $query->fetchAll();
                    ?>  
                    </p>
                </div>
                <div class="modal-footer">                    
                <button type="button" class="btn btn-primary">Done</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>    
