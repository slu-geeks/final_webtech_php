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
                        <h2>Finished Requests</h2>   
                    </div>    
                </div>
                <div class="jumbotron">

                   <?php
                    require_once 'fragments/connection.php';
                    $query = $pdo->prepare("SELECT * FROM service_request natural join pet_service where status = '01'");
                    $query->execute();
                    $result = $query->fetchAll();
                    ?>  

                    <div class="panel-heading">
                           Finished Requests as of <?php echo date("Y-m-d") ?> 
                        </div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                                    <thead>
                                        <tr>
                                            <th>Request Name</th>
                                            <th>Start of Service</th>
                                            <th>End of Service</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>

                    <button id="reply_btn" type="button" class="btn btn-default">View Details</button>

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
