<?php
    include_once "header.php";
    
    $phone = $_GET['phone'];
    $oldphone = $_GET['oldphone'];
    $phcountry = $_GET['phcountry'];
    $pid = $_GET['Id'];
    $phtype = $_GET['phtype'];

    $query = " SELECT * FROM phones WHERE number = '$oldphone';";   
    $result =  mysqli_query($connection,$query);
    $counter = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if($phone == ''){
        $phone = $oldphone;
    }
    if($phcountry ==''){
        $phcountry = $row['country'];
    }
    if($phtype == ''){
        $phtype = $row['type'];
    }
    if($pid == ''){
        $pid = $row['pid'];
    }
    $query = " SELECT * FROM enc_patients WHERE id = '$pid';";   
    $result =  mysqli_query($connection,$query);
    $counter1 = mysqli_num_rows($result);

    $query = " SELECT * FROM phones WHERE number = '$phone';";   
    $result =  mysqli_query($connection,$query);
    $counter2 = mysqli_num_rows($result);
    
    if($counter <= 0){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=το τηλέφωνο αυτό δεν υπάρχει"); 
    }
    else if($counter2>0&&$phone!=$oldphone){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=το Τηλέφωνο υπάρχει είδη");

    }
    else if($counter1 <= 0){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=δεν υπάρχει ο χρήστης $ID");
    }
    else if(!is_numeric($phone)){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=το πεδίο Τηλέφωνο πρέπει να είναι αριθμός");  
    }
    else if($phone > 9999999999 || $phone < 1000000000){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=το πεδίο τηλέφωνο πρέπει να έχει ακριβώς 10 ψηφεία");
    }

    else if(!is_numeric($phcountry)){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=το πεδίο κωδικός χώρας πρέπει να είναι αριθμός"); 
    }
    else if($phcountry > 300 || $phcountry < 1){
        header ("Location: edditphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&number=$oldphone&status=μη εγκυρη τιμή για το πεδίο κωδικός χώρας"); 
    }
    else
    {
        $query  = "UPDATE phones SET number = '$phone', pid = '$pid', country = '$phcountry', type = '$phtype' WHERE number = '$oldphone';";
        mysqli_query($connection,$query);

        header ("Location: edditphone.php?status=successful");
    }