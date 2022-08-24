<?php include "header.php";
    if(isset($_GET['pid']))
    {
        if(isset($_GET['number'])){
            echo'   <center><h1>UPDATE PHONE '.$_GET['number'].'</h1></center><br>
                    <center>
                    <form action = "updatephone.php" method = "GET" id = "myform" name = "myform">
                        <input type = "hidden" name = "oldphone" value = '.$_GET['number'].'>
                        <input type = "text" name = "Id" placeholder = "ID πελάτη">
                        <input type = "text" name = "phone" placeholder = "Τηλέφωνο">
                        <input type = "text" name = "phcountry" placeholder = "Χώρα(κωδικός)">
                        <select name="phtype">
                            <option value="st">Σταθερό</option>
                            <option value="mob">Κινητό</option>
                            <option value="fax">Fax</option>
                            <option value="other">Άλλο</option>
                        </select>
                            <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                                submit
                            </button>
                        </form> 
                    
                    </center>
                ';
        }
    }
    else{
        by_pid_search_bar("edditphonesrc.php");
        by_phonenum_search_bar("edditphonesrc.php");
    }
    
?>
