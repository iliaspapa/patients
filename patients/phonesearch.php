<?php include "header.php";
    by_phonenum_search_bar("phonesearch.php");
    by_pid_search_bar("phonesearch.php");
    if(isset($_GET['pid'])){
        search_by_pid_res("phonesearch.php",TRUE);
    }
    else if(isset($_GET['PhNum'])){
        search_by_phonenum_res("phonesearch.php",TRUE);
    }
    else{
        $query = " SELECT * FROM phone;";  
        $result =  mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
        show_full_res($result,$counter,"phone.php");
    }