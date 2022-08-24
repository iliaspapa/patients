<?php include "header.php";
    

    if(isset($_GET['ownerId']))
    {
        echo '
                <center><h1>INSERT PHONE</h1></center><br>
                <center>
                    <form action = "insertphone.php" method = "GET" id = "myform" name = "myform">
                        <input type = "text" name = "ownerId" placeholder = "Id πελάτη" value = '.$_GET['ownerId'].' >
                        <input type = "text" name = "phone" placeholder = "Τηλέφωνο" value = '.$_GET['phone'].' >
                        <input type = "text" name = "phcountry" placeholder = "Χώρα(κωδικός)" value = '.$_GET['phcountry'].' >
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
    else
    {
        echo
        '
            <center><h1>INSERT PHONE</h1></center><br>
            <center>
            <form action = "insertphone.php" method = "GET" id = "myform" name = "myform">
                <input type = "text" name = "ownerId" placeholder = "ID πελάτη">
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
    by_name_search_bar("addphonesrc.php");
?>

