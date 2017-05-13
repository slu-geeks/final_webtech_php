
<?php

    $user = $_SESSION["userAccount"];
    $user_id = $user->getAccountId();
    $query = $pdo->prepare("select * from feedback natural join service_request natural join user_account where feedback_status = '$status'and
    service_request.sp_id = '$user_id'");
    $query->execute();
    
 
    echo "<tr>";
    echo "<th>Feedback ID</th>";
    echo "<th>Customer</th>";
    echo "<th>Date of Feedback</th>";
    echo "<th>Ranking</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $firstname = $row['first_name'];
        $middlename = $row['middle_name'];
        $lastname = $row['last_name'];
        $customer = $firstname. " ". $middlename. " ". $lastname;
        $id = $row['feedback_id'];
        echo "<tr>";
        echo "<td>" .$id ."</td>";
        echo "<td>" .$customer ."</td>";
        echo "<td>" .$row['feedback_date'] ."</td>";
        echo "<td>" .$row['ranking'] ."</td>";
        if($status == 1){
            echo "<td>"
            .'<form action="#" method="get">'
            ."<button type='submit' class='modellink btn btn-default' data-toggle='modal' data-target='#myModal' name='modalbtn' value='$id'>Reply</button>" 
            .'<button type="button" class="details-modal btn btn-default">Done</button>' 
            .'</form>'
            ."</td>"; 
                                    
        }elseif($status == 2){
            echo "<td>"
            .'<form action="#" method="get">'
            ."<button type='submit' class='modellink btn btn-default' data-toggle='modal' data-target='#myModal' name='modalbtn' value='$id'>Reply</button>"
                .'</form>'
            ."</td>"; 
        }elseif($status == 3){
            echo "<td>"
                .'<form action="#" method="get">'
                ."<button type='submit' class='modellink btn btn-default' data-toggle='modal' data-target='#myModal' name='modalbtn' value='$id'>Details</button>"
                .'</form>'
                ."</td>";       
        } 
        echo "</tr>";
    }
                        
?>