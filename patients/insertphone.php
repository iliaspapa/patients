<?php
    include_once "dbhandler.php";
    
    $ID = $_GET['ownerId'];
    $phone = $_GET['phone'];
    $phcountry = $_GET['phcountry'];
    $phtype = $_GET['phtype'];

    $query = " SELECT * FROM phones WHERE number = '$phone';";   
    $result =  mysqli_query($connection,$query);
    $counter = mysqli_num_rows($result);
    
    $query = " SELECT * FROM enc_patients WHERE id = '$ID';";   
    $result =  mysqli_query($connection,$query);
    $counter1 = mysqli_num_rows($result);

    if($counter > 0){
        header ("Location: addphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&status=το τηλέφωνο αυτό είναι είδη καταχωρημένο σε χρήστη"); 
    }
    else if($counter1 <= 0){
        header ("Location: addphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&status=δεν υπάρχει ο χρήστης $ID");
    }
    else if(!is_numeric($phone)){
        header ("Location: addphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&status=το πεδίο Τηλέφωνο πρέπει να είναι αριθμός");  
    }
    else if($phone > 9999999999 || $phone < 1000000000){
        header ("Location: addphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&status=το πεδίο τηλέφωνο πρέπει να έχει ακριβώς 10 ψηφεία");
    }

    else if(!is_numeric($phcountry)){
        header ("Location: addphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&status=το πεδίο κωδικός χώρας πρέπει να είναι αριθμός"); 
    }
    else if($phcountry > 300 || $phcountry < 1){
        header ("Location: addphone.php?ownerId=$ID&phone=$phone&phcountry=$phcountry&status=μη εγκυρη τιμή για το πεδίο κωδικός χώρας"); 
    }
    else
    {
        $query  = "INSERT INTO phones (number, pid, country, type) VALUES ('$phone', '$ID','$phcountry','$phtype');";
        mysqli_query($connection,$query);

        header ("Location: addphone.php?status=successful&id=$ID");
    }