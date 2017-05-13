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
                        <h2>Old FeedBack</h2>   
                    </div>    
                </div>
                <div class="jumbotron">
    
                    <table class="table table-striped table-border table-hover">
                        <?php   
                            $status = 3;
                            include 'fragments/feedback-query.php';
                        ?>    
                    </table>
                    <div class="modal-container">
                        
                    </div>
                </div>         
            </div>
        </div>
    </div>
    
     <div id="myModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?php
        if(isset($_GET['modalbtn'])){
            $value = $_GET['modalbtn'];
            echo $value;
        }
    ?>
                </h4>
            </div>
            <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
        </div>
    </div>
</body>
</html>    
