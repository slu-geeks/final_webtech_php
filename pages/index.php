<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet Services</title><meta charset="UTF-8" />
	<!-- BOOTSTRAP STYLES-->
    <link rel="stylesheet" type="text/css" href="assets/css/sb-admin-2.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/js/sb-admin-2.min.js">
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
</head>
<body id="index">
<?php 
    session_start();

function echoActiveClassIfRequestMatches($requestUri)
{
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
                     <h2>Dashboard</h2>   
                        <h5>Welcome 
                            <?php  
                                    
                                    echo  $_SESSION["username"];

                            ?> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/> 
            <div class="row">    
                <div class="col-md-3 col-sm-6 col-xs-6">           
                    <div class="panel panel-back noti-box">

                        <div class="text-box" >
                            <h4 align="center">
                                <strong>
                                    <?php
                                    $datenow = date("Y-m");
                                    require_once 'fragments/connection.php';
                                    $query = $pdo->prepare("SELECT webtek-final.request_name FROM service_request where request_status='00'");
                                    $query->execute();
                                    $result = $query->fetchAll();
                                    echo count($result);                                          

                                    ?> Pending
                                </strong>
                            </h4>
                        </div>
                     </div>
                 </div>
             </div>     
        </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
   
</body>
</html>

