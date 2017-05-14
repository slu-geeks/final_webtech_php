<!DOCTYPE html>
<?php
    require '../classes/UserAccount.php';
?>
<html lang="en">

<?php
    include 'fragments/head.php';
?>

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
                    <?php
                        
                        $user = $_SESSION["userAccount"];
                        $user_id = $user->getAccountId();
                        
                        $qry = $pdo->prepare("select * from user_account left join sp_profile using(account_id) where user_account.account_id = '$user_id'");
                        $qry->execute();
                        $profileqry = $qry->fetch();
                        
                        $username = $profileqry['username'];  
                        $password = $profileqry['password'];  
                        $address = $profileqry['address'];  
                        $cname = $profileqry['first_name'] ." " .$profileqry['middle_name'] ." " .$profileqry['last_name'];  
                        $emailadd = $profileqry['email_address'];  
                        $birthday = $profileqry['birthday'];  
                        $pnum = $profileqry['phone_number'];  
                        $pic = $profileqry['user_picture'];  
                        $services = $profileqry['services_offered'];  
                        $petspec = $profileqry['pet_specialization'];  
                        $selfinto = $profileqry['self_introduction'];  
                        $exp = $profileqry['years_experience'];  
                        
                    ?> 
                    <div class="row">
                        <div class="col-md-12">
                        <h2>Edit Profile</h2>   
                        </div>    
                    </div>
                    <div class="jumbotron">

                        <div>
                            <img scr="<?
                                      
                                      header('content-Type: image/jpeg');
                                      php echo $pic;
                                      ?> 
                                      "/> 
                        </div>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Services Offerred</label>
                                <div class="col-lg-10">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1">
                                        Grooming
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Sitting
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Vaccine
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Medical Services
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Specialization</label>
                                <div class="col-lg-10">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1">
                                        Dog
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Cat
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Snake
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Horse
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Fish
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Hamster
                                        </label>
                                    </div>

                                </div>
                                <label for="textArea" class="col-lg-2 control-label">About Yourself</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-success btn-lg clearfix " name="update"><i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i></button>
                                    <a href="view-profile.php" onclick=""><button type="button" class="btn btn-success btn-lg clearfix" name="update"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button></a>
                                </div>
                            </div>
                        </form>

                    </div>
<<<<<<< HEAD
                    
                    <?php
                        if(isset($_GET['saveprofile'])){
                            $username = $_GET['inputUsername'];  
                            $password = $_GET['inputPassword'];  
                            $address = $_GET['inputAddress'];  
                            $fname = $_GET['inputFname'];
                            $mname = $_GET['inputMname'];
                            $lname = $_GET['inputLname'];  
                            $emailadd = $_GET['inputEmail'];  
                            $birthday = $_GET['inputBirthday']; 
                            $phonenum = $_GET['inputPhonenum'];
                            $selfinfo = $_GET['selfinfo'];
                            $yearexp = $_GET['inputExp'];
        
                        } 
                                       
                    ?>
=======
>>>>>>> fa1338f54a058a3b27f89a1fb4137e8cbc33f945
                </div>
            </div>
        </div>
    </body>
</html>    