<?php
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'fragments/head.php' ?>
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
                        <h2>Checked FeedBack</h2>   
                    </div>    
                </div>
               <div class="jumbotron">
                
                    <table class="table table-striped table-border table-hover">
                        <?php   
                            $status = 2;
                            include 'fragments/feedback-query.php';
                            
                        ?>   
                    </table>
                    <div class="modal-container">
                        
                    </div>
                </div>            
            </div>
        </div>
    </div>
</body>
</html>    
