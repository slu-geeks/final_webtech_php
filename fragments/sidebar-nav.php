<!-- /. NAV SIDE  -->
<?php
    require_once 'connection.php'; 
    
    $query = $pdo->prepare("SELECT * FROM user WHERE username='".$_SESSION['usersession']."';");
    $query->execute();
    $print = $query->fetch();
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
        <li class="text-center">
            <?php echo '<img  class="user-image img-responsive" src="data:image/png;base64,' . base64_encode($print["user_image"]) . '">'; ?>
        </li>
        <li>
            <a href="index.php"><i class="fa fa-home fa-3x"></i> Dashboard</a>
        </li>
        <li>
            <a href="records.php"><i class="fa fa-book fa-3x"></i> Donation Records</a>
        </li>
		<li>
            <a  href="collected-units.php"><i class="fa fa-medkit fa-3x"></i>Collected Blood Units</a>
        </li>
        <li>
            <a  href="blood-units.php"><i class="glyphicon glyphicon-tint fa-3x"></i>Available Blood Units</a>
        </li>
        <li>
            <a  href="issued-units.php"><i class="fa fa-tags fa-3x"></i>Issued Blood Units</a>
        </li>
        <li>
            <a  href="ledger.php"><i class="fa fa-table fa-3x"></i>Stock Cards</a>
        </li>
        <li >
            <a  href="wastage.php"><i class="fa fa-exclamation-triangle fa-3x"></i>Blood Wastage</a>
        </li>
        <li >
            <a  href="spoilage.php"><i class="glyphicon glyphicon-time fa-3x"></i>Blood Spoilage</a>
        </li>	
          <li>
            <a  href="reports.php"><i class="glyphicon glyphicon-list-alt fa-3x"></i>Reports</a>
            <!-- <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Quarterly</a>
                    </li>
                    <li>
                        <a href="#">Monthy</a>
                    </li>
                    <li>
                        <a href="#">Annualy</a>
                    </li>
            </ul> -->
        </li>
        <li  >
            <a  href="user-accounts.php"><i class="fa fa-user fa-3x"></i>User Accounts</a>
        </li>				
        </ul>
    </div>
</nav> 