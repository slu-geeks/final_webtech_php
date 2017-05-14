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
                        
                    ?> 
                    <div class="row">
                        <div class="col-md-12">
                        <h2>Edit Profile</h2>   
                        </div>    
                    </div>
                    <div class="jumbotron">
                        <form class="form-horizontal" action="#" method="get">
                          <fieldset>
                            <legend>Profile</legend>
                             <div class="form-group">
                              <label for="inputFirstname" class="col-lg-2 control-label">First Name</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputFname" placeholder="<?php echo $profileqry['first_name'] ?>" value="">
                              </div>
                            </div>
                               <div class="form-group">
                              <label for="inputMiddlename" class="col-lg-2 control-label">Middle Name</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputMname" placeholder="<?php echo $profileqry['middle_name'] ?>" value="">
                              </div>
                            </div>
                               <div class="form-group">
                              <label for="inputLastname" class="col-lg-2 control-label">Last Name</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputLname" placeholder="<?php echo $profileqry['last_name'] ?>" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputUsername" class="col-lg-2 control-label">Username</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputUsername" placeholder="<?php echo $profileqry['username'] ?>" value="">
                              </div>
                            </div>
                                <div class="form-group">
                              <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputPassword" placeholder="<?php echo $profileqry['password'] ?>" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-lg-2 control-label">Email Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputEmail" placeholder="<?php echo $profileqry['email_address'] ?>" value="">
                              </div>
                            </div>
                                <div class="form-group">
                              <label for="inputPhonenum" class="col-lg-2 control-label">Phone Number</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputPhonenum" placeholder="<?php echo $profileqry['phone_number'] ?>" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputAddress" class="col-lg-2 control-label">Home Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputAddress" placeholder="<?php echo $profileqry['address'] ?>" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputBirthday" class="col-lg-2 control-label">Birthday</label>
                              <div class="col-lg-10">
                                <input type="date" class="form-control" name="inputBirthday" placeholder="<?php echo $profileqry['birthday'] ?>" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputExp" class="col-lg-2 control-label">Years of Experience</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputExp" placeholder="<?php echo $profileqry['years_experience'] ?>" value="">
                              </div>
                            </div>
            
                            <div class="form-group">
                              <label for="selfinfo" class="col-lg-2 control-label">Self Introduction</label>
                              <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="selfinfo" placeholder="<?php echo $profileqry['self_introduction']?>" value=""></textarea>
                                <span class="help-block">Talk about your experiences with pets.</span>
                              </div>
                            </div>
                         
                          
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Services Offerred</label>
                                <div class="col-lg-10">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="serveoption" value="grooming">
                                        Grooming
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="serveoption" value="sitting">
                                        Sitting
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="serveoption" value="vaccine">
                                        Vaccine
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="serveoption" value="medical service">
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
                                        <input type="checkbox" name="optionsRadios" id="specoption" value="dog">
                                        Dog
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="specoption" value="cat">
                                        Cat
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="specoption" value="snake">
                                        Snake
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="specoption" value="horse">
                                        Horse
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="specoption" value="fish">
                                        Fish
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="optionsRadios" id="specoption" value="hamster">
                                        Hamster
                                        </label>
                                    </div>

                                </div>
                                </div>
                                   <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="saveprofile">Submit</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                    
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
                </div>
            </div>
        </div>
    </body>
</html>    