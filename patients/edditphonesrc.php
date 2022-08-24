<?php
    include "edditphone.php";
    if(isset($_GET['pid'])){
        search_by_pid_res("edditphone.php",TRUE);
    }
    else if(isset($_GET['PhNum'])){
        search_by_phonenum_res("edditphone.php",TRUE);
    }
    else{
        header("Location: edditphone.php?status=Δεν έχουν συμπληρωθεί αρκετά πεδία!");
    }