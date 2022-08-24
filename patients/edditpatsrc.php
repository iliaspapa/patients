<?php
    include "edditpat.php";
    if(isset($_GET['Id'])){
        search_by_id_res("edditpat.php",TRUE);
    }
    else if(isset($_GET['FName']) || isset($_GET['LName'])){
        search_by_name_res("edditpat.php",TRUE);
    }
    else{
        header("Location: edditpat.php?status=Δεν έχουν συμπληρωθεί αρκετά πεδία!");
    }