    <?php include "header.php";
    if(isset($_GET['Id'])){
        if(isset($_GET['Fname']))
        {
            echo '
                    <center><h1>Eddit PATIENT</h1></center><br>
                    <center>
                        <form action = "updatepat.php" method = "GET" id = "myform" name = "myform">
                            <input type = "hidden" name = "Id" value = "'.$_GET['Id'].'" >
                            <label for="fname">Όνομα</label>
                            <input type = "text" name = "Fname" id = "fname" placeholder = "Όνομα" value = "'.$_GET['Fname'].'">
                            <br><label for="lname">Επώνυμο</label>
                            <input type = "text" name = "Lname" id = "lname" placeholder = "Επώνυμο" value = "'.$_GET['Lname'].'">
                            <br><label for="faname">Πατρώνυμο</label>
                            <input type = "text" name = "Faname" id = "faname" placeholder="Πατρώνυμο" value = "'.$_GET['Faname'].'">
                            <br><label for="street">Δρόμος</label>    
                            <input type = "text" name = "street" id = "street" placeholder = "Δρόμος" value = "'.$_GET['street'].'">
                            <br><label for="num">Αριθμός</label>
                            <input type = "text" name = "number" id = "num" placeholder = "Αριθμός" value = "'.$_GET['number'].'">
                            <br><label for="city">Πόλη</label>
                            <input type = "text" name = "city" id = "city" placeholder = "Πόλη" value = "'.$_GET['city'].'">
                            <br><label for="country">Χώρα</label>
                            <input type = "text" id = "country" name = "country" placeholder = "Χώρα" value = "'.$_GET['country'].'">
                            <br><label for="hi">Ύψος</label>
                            <input type = "text" id = "hi" name = "hight" placeholder = "Ύψος" value = "'.$_GET['hight'].'">
                            <br><label for="wei">Βάρος</label>
                            <input type = "text" id = "wei" name = "weight" placeholder = "Βάρος" value = "'.$_GET['weight'].'">
                            <br><label for="ref">Σύσταση</label>
                            <input type = "text" id = "ref" name = "ref" placeholder = "source of reference" value = "'.$_GET['ref'].'">
                            <br><label for="bdate">Ημερομηνία γέννησης</label>
                            <input type = "date" id = "bdate" name = "bdate" placeholder = "Ημερομηνία Γέννησης" value = "'.$_GET['bdate'].'">
                            <br><label for="shoe">Νουμερο παπουτσιού</label>
                            <input type = "text" id = "shoe" name = "shoe" placeholder = "Νούμερο παπουσιού" value = "'.$_GET['shoe'].'">
                            <br><label for="fdate">Ημερομηνία πρώτης διάγνωσης</label>
                            <input type = "date" id = "fdate" name = "now" placeholder = "Ημερομηνία πρώτης διάγνωσης" value = "'.$_GET['exdate'].'">
                            <br><label for="work">επάγγελμα</label>
                            <input type = "text" id = "work" name = "profetion" placeholder = "επάγγελμα" value = "'.$_GET['profetion'].'">
                            <br><label for="email">e-mail</label>
                            <input type = "text" id = "email" name = "e-mail" placeholder = "e-mail" value = "'.$_GET['e-mail'].'">
                            <br><label for="amka">αμκα</label>
                            <input type = "text" id = "amka" name = "amka" placeholder = "ΑΜΚΑ"  value = "'.$_GET['amka'].'">
                            <!--<br><label for="phone">τηλεφωνο</label>-->
                            <input type = "hidden" id = "phone" name = "phone" placeholder = "Τηλέφωνο" value = "">
                            <!--<br><label for="phcou">Κωδικός χώρας</label>-->
                            <input type = "hidden" id = "phcou" name = "phcountry" placeholder = "Χώρα(κωδικός)" value = "">
                            <br>
                            <!--<select type = "hidden" name="phtype">
                                <option value="st">Σταθερό</option>
                                <option value="mob">Κινητό</option>
                                <option value="fax">Fax</option>
                                <option value="other">Άλλο</option>
                            </select>-->
                            <br><br>
                            <textarea rows="8" cols="150" name="history" form="myform" placeholder="Ιστορικό..." >'.$_GET['history'].'</textarea>
                            <br><br>
                            <textarea rows="8" cols="150" name="comments" form="myform" placeholder="Σχόλια..." >'.$_GET['comments'].'</textarea>
                            <br><br>
                            <textarea rows="8" cols="150" name="examination" form="myform" placeholder="Εξέταση...">'.$_GET['examination'].'</textarea>
                            <br><br>
                            <textarea rows="8" cols="150" name="meds" form="myform" placeholder="φάρμακα...">'.$_GET['meds'].'</textarea>
                            <br><br>
                            <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                                submit
                            </button>
                        </form> 
                    
                    </center>
                    </body>
                    </html>
                ';
        }
        else
        {
            echo '
                    <center><h1>Update Patient '.$_GET['Id'].'</h1></center><br>
                    <center>
                        <form action = "updatepat.php" method = "GET" id = "myform" name = "myform">
                            <input type = "hidden" name = "Id" value = '.$_GET['Id'].' >
                            <label for="fname">Όνομα</label>
                            <input type = "text" name = "Fname" id = "fname" placeholder = "Όνομα">
                            <br><label for="lname">Επώνυμο</label>
                            <input type = "text" name = "Lname" id = "lname" placeholder = "Επώνυμο">
                            <br><label for="faname">Πατρώνυμο</label>
                            <input type = "text" name = "Faname" id = "faname" placeholder="Πατρώνυμο">
                            <br><label for="street">Δρόμος</label>    
                            <input type = "text" name = "street" id = "street" placeholder = "Δρόμος">
                            <br><label for="num">Αριθμός</label>
                            <input type = "text" name = "number" id = "num" placeholder = "Αριθμός">
                            <br><label for="city">Πόλη</label>
                            <input type = "text" name = "city" id = "city" placeholder = "Πόλη">
                            <br><label for="country">Χώρα</label>
                            <input type = "text" id = "country" name = "country" placeholder = "Χώρα">
                            <br><label for="hi">Ύψος</label>
                            <input type = "text" id = "hi" name = "hight" placeholder = "Ύψος">
                            <br><label for="wei">Βάρος</label>
                            <input type = "text" id = "wei" name = "weight" placeholder = "Βάρος">
                            <br><label for="ref">Σύσταση</label>
                            <input type = "text" id = "ref" name = "ref" placeholder = "source of reference">
                            <br><label for="bdate">Ημερομηνία γέννησης</label>
                            <input type = "date" id = "bdate" name = "bdate" placeholder = "Ημερομηνία Γέννησης">
                            <br><label for="shoe">Νουμερο παπουτσιού</label>
                            <input type = "text" id = "shoe" name = "shoe" placeholder = "Νούμερο παπουσιού">
                            <br><label for="fdate">Ημερομηνία πρώτης διάγνωσης</label>
                            <input type = "date" id = "fdate" name = "now" placeholder = "Ημερομηνία πρώτης διάγνωσης">
                            <br><label for="work">επάγγελμα</label>
                            <input type = "text" id = "work" name = "profetion" placeholder = "επάγγελμα">
                            <br><label for="email">e-mail</label>
                            <input type = "text" id = "email" name = "e-mail" placeholder = "e-mail">
                            <br><label for="amka">αμκα</label>
                            <input type = "text" id = "amka" name = "amka" placeholder = "ΑΜΚΑ" >
                            <br><label for="phone">τηλεφωνο</label>
                            <input type = "text" id = "phone" name = "phone" placeholder = "Τηλέφωνο">
                            <br><label for="phcou">Κωδικός χώρας</label>
                            <input type = "text" id = "phcou" name = "phcountry" placeholder = "Χώρα(κωδικός)">
                            <br>
                            <select name="phtype">
                                <option value="st">Σταθερό</option>
                                <option value="mob">Κινητό</option>
                                <option value="fax">Fax</option>
                                <option value="other">Άλλο</option>
                            </select>
                            <br><br>
                            <textarea rows="8" cols="150" name="history" form="myform" placeholder="Ιστορικό..."></textarea>
                            <br><br>
                            <textarea rows="8" cols="150" name="comments" form="myform" placeholder="Σχόλια..."></textarea>
                            <br><br>
                            <textarea rows="8" cols="150" name="examination" form="myform" placeholder="Εξέταση..."></textarea>
                            <br><br>
                            <textarea rows="8" cols="150" name="meds" form="myform" placeholder="φάρμακα..."></textarea>
                            <br><br>
                            <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                                submit
                            </button>
                        </form> 
                        <form action = "edditpat.php" method= "POST">
                                <input type="hidden" name="cancel" >
                                <button type = "submit" class="btn btn-danger">
                                    cancel
                                </button>
                        </form> 
                    </center>';
        }
    }
    else
    {
        by_id_search_bar("edditpatsrc.php");
        by_name_search_bar("edditpatsrc.php");
    }
?>
