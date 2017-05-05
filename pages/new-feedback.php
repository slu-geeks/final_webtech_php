<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Feedback</title><meta charset="UTF-8" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
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
                        <h2>New FeedBack</h2>   
                    </div>    
                </div>
               <?php
                    $query = $pdo->prepare("select f.ranking, f.contacting_phone_number cpn, f.feedback_messages m, u.username, concat(u.first_name, ' ', u.middle_name, ' ', u.last_name) name, u.email_address ea, f.feedback_date fd from feedback f natural join user_account u where f.feedback_status = 1;");
                    $query->execute();

                    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $ranking = $row['ranking'];
                        $cpn = $row['cpn'];
                        $message = $row['m'];
                        $usr = $row['username'];
                        $name = $row['name'];
                        $email = $row['ea'];
                        $fdate = $row['fd'];
                        
                        echo ('<div class="jumbotron">'
                            .$ranking
                            .$cpn
                            .$message
                            .$usr
                            .$name
                            .$email
                            .$fdate.
                            '<button id="reply_btn" type="button" class="btn btn-default">Reply</button>'.
                            '<button type="button" class="btn btn-primary">Done</button>'.
                        '</div>');
                    }

                ?>
                              
            </div>
        </div>
    </div>
    
    <div id="reply_modal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Reply</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>    