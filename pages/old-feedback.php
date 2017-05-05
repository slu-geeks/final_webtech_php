<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Old Feedback</title><meta charset="UTF-8" />

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">  
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <script type="text/javascript" scr="assets/js/script.js" defer="defer"></script>
    
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
                        <h2>FeedBack</h2>   
                    </div>    
                </div>
                <div class="jumbotron">
                   <?php
                        $query = $pdo->prepare("SELECT * FROM feedback where feedback_status = 0 ");
                        $query->execute();
                        $result = $query->fetchAll(); 
                    ?>
                    
                    <button type="button" class="btn btn-default" id="reply_btn">Reply</button>
                    <button type="button" class="btn btn-primary">Done</button>

                    
                </div>

                              
            </div>
        </div>
        <div id="reply_modal" class="modal fade" role="dialog">
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
</html>    
