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
                        <h2>Unchecked FeedBack</h2>   
                    </div>    
                </div>
                <div class="jumbotron">
        
                    <table class="table table-striped table-border table-hover">
                        <?php   
                            $status = 1;
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
                    Reply to clients feedback
                </h4>
            </div>
              <?php
               echo '<form action="#" method="get" role="form" id="editform">';
                echo '<div class="modal-body">';

                  echo '<div class="form-group">';
                    echo '<label class="control-label">Feedback:</label>';
                    echo '<div class="jumbotron">';
                        
                            if(isset($_GET['modalbtn'])){
                                $value = $_GET['modalbtn'];
                            }

                            $qry = $pdo->prepare("select feedback_messages from feedback where feedback_id = '$value';");
                            $qry->execute();
                            $result = $qry->fetch(PDO::FETCH_ASSOC); 

                            echo "<p>".$result['feedback_messages']."</p>";
                        
                    echo '</div>';
                  echo '</div>';
                  echo '<div class="form-group">';
                    echo '<label for="message-text" class="control-label">Message:</label>';
                    echo '<textarea class="form-control" id="message-text" name="reply"></textarea>';
                  echo '</div>';

                echo '</div>';
                echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    echo "<button type='submit' class='btn btn-primary' name='srep' value='$value'>Save</button>";
                echo '</div>';
                echo '</form>';
                
                ?>
                
        </div>
        </div>
    </div>
    
    <?php
    include "fragments/connection.php";
                    
        if(isset($_GET['srep'])){
            
            $reply = $_GET['reply'];
            $value = $_GET['srep'];
            $sql = $pdo->prepare("update feedback set checked_description = '$reply', feedback_status=3 where feedback_id = '$value';");
            $sql->execute();
        }
    ?>
</body>
</html>    
