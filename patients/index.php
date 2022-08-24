<?php include "header.php";
    by_id_search_bar("index.php");
    by_name_search_bar("index.php");
    if(isset($_GET['Id'])){
        search_by_id_res("client.php",TRUE);
    }
    else if(isset($_GET['FName'])){
        search_by_name_res("client.php");
    }
    else{
        $query = " SELECT * FROM enc_patients;";  
        $result =  mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
        show_full_res($result,$counter,"client.php");
    }
?>
