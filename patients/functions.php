    <?php
    function show_res($result, $counter) {
        global $key;
        if($counter <= 0) {
            echo "<center> <div class='alert alert-danger' role='alert'>
                        No such patient!!
                        </div> </center>";
        } 
        else{
            echo '<center><table style="width:30%">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father Name</th>
                        <th>birth date</th>
                    </tr>';
            while($row=mysqli_fetch_assoc($result))
            {  
                $name = explode('_',$row['nameenc']);
                echo '          <tr>
                                        <td>'. $row['id'].'</td>
                                        <td>'. str_replace(' ','',decrypt($key,$name[0])).'</td>
                                        <td>'. decrypt($key,$name[1]).'</td>
                                        <td>'. decrypt($key,$name[2]).'</td>
                                        <td>'. $row['date_of_birth'].'</td>
                                </tr>';
            }    
            echo '</center>';                       
        }
    }

    function show_full_res($result,$counter,$file){
        global $key;
        // if($file == "client.php"){
        //     echo '<br><br>
        //     <center><table style="width:30%">
        //         <tr>
        //             <th>ID</th>
        //             <th>First Name</th>
        //             <th>Last Name</th>
        //             <th>Father Name</th>
        //             <th>birth date</th>
        //         </tr>';
        //     while($row=mysqli_fetch_assoc($result))
        //     {  
        //         $name = explode('_',$row['nameenc']);
        //         $name[0] = str_replace(' ','',decrypt($key,$name[0]));
        //         $name[1] = decrypt($key,$name[1]);
        //         $name[2] = decrypt($key,$name[2]);
        //         foreach($row as &$val)
        //         {
        //             $val=str_replace(' ','%20',$val);
        //         }
        //         //echo $row[''];
        //         echo '          <tr>
        //                             <td><a href = client.php?Id=' . $row['id'] .'&Fname=' . $name[0] . '&Lname=' . $name[1] . '&Faname=' . $name[2] . '&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $row['id'].' </a></td>
        //                             <td><a href = client.php?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $name[0] .' </a></td>
        //                             <td><a href = client.php?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $name[1].' </a></td>
        //                             <td><a href = client.php?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $name[2].' </a></td>
        //                             <td><a href = client.php?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $row['date_of_birth'].' </a></td>    
        //                         </tr>';
        //     }    
        //     echo '</center>';
        //     return;
        // }
        if($counter <= 0) {
            echo "<center> <div class='alert alert-danger' role='alert'>
                        No such patient!!
                        </div> </center>";
        } 
        else{
            echo '<center><table style="width:30%">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father Name</th>
                        <th>birth date</th>
                    </tr>';
            while($row=mysqli_fetch_assoc($result))
            {  
                $name = explode('_',$row['nameenc']);
                $name[0] = str_replace(' ','',decrypt($key,$name[0]));
                $name[1] = decrypt($key,$name[1]);
                $name[2] = decrypt($key,$name[2]);
                foreach($row as &$val)
                {
                    $val=str_replace(' ','%20',$val);
                }
                echo '          <tr>
                                    <td><a href = '.$file.'?Id=' . $row['id'] .'&Fname=' . $name[0] . '&Lname=' . $name[1] . '&Faname=' . $name[2] . '&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $row['id'].' </a></td>
                                    <td><a href = '.$file.'?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $name[0] .' </a></td>
                                    <td><a href = '.$file.'?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $name[1].' </a></td>
                                    <td><a href = '.$file.'?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $name[2].' </a></td>
                                    <td><a href = '.$file.'?Id=' . $row['id'] .'&Fname='.$name[0].'&Lname='.$name[1].'&Faname='.$name[2].'&street='.$row['street'].'&number='.$row['number'].'&city='.$row['city'].'&hight='.$row['hight'].'&weight='.$row['weight'].'&ref='.$row['sourse'].'&bdate='.$row['date_of_birth'].'&shoe='.$row['foot_size'].'&profetion='.$row['profetion'].'&e-mail='.$row['email'].'&amka='.$row['amka'].'&country='.$row['country'].'&history='.$row['history'].'&comments='.$row['comments'].'&examination='.$row['examination'].'&meds='.$row['meds'].'&exdate='.$row['date_of_first_diagnosis'].'>'. $row['date_of_birth'].' </a></td>    
                                </tr>';
            }    
            echo '</center>';                       
        }
    }

    function show_res_ph($result,$counter,$file){
        global $key;
        if($counter <= 0) {
            echo "<center> <div class='alert alert-danger' role='alert'>
                        No such phone!!
                        </div> </center>";
        } 
        else{
            echo '<center><table style="width:30%">
                    <tr>
                        <th>phone number</th>
                        <th>country code</th>
                        <th>phone type</th>
                        <th>owner id</th>
                    </tr>';
            while($row=mysqli_fetch_assoc($result))
            {  
                echo '          <tr>
                                    <td><a href = '.$file.'?pid=' . $row['pid'] .'&number='. $row['number'].'>'. $row['number'] .' </a></td>
                                    <td><a href = '.$file.'?pid=' . $row['pid'] .'&number='. $row['number'].'>'. $row['country'].' </a></td>
                                    <td><a href = '.$file.'?pid=' . $row['pid'] .'&number='. $row['number'].'>'.$row['type'].' </a></td>
                                    <td><a href = '.$file.'?pid=' . $row['pid'] .'&number='.$row['number'].'>'. $row['pid'].' </a></td>
                                </tr>';
            }    
            echo '</center>';                       
        }
    }

    function by_name_search_bar($file){
        echo   '<center>
                <br><br><br>
                <b><h2>Aναζήτηση με βάση το όνομα</h2></b>
                <br>
                <form action = "'.$file.'" method = "GET" id = "myform" name = "myform">
                    <input type = "text" name = "FName" placeholder = "Ονομα">
                    <input type = "text" name = "LName" placeholder = "Επώνυμο">
                    <input type = "text" name = "FaName" placeholder = "Πατρώνυμο">
                    <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                        search
                    </button>
                </form> 
            </center>
            </body>
            </html>';
    }

    function by_id_search_bar($file){
        echo   '<center>
        <br><br><br>
                <b><h2>Aναζήτηση με βάση το ID</h2><b>
                <br>
                <form action = "'.$file.'" method = "GET" id = "myform2" name = "myform2">
                    <input type = "text" name = "Id" placeholder = "ID">
                    <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                        search
                    </button>
                </form> 
            </center>
            </body>
            </html>';
    }

    function search_by_name_res($file,$bool=FALSE){
        global $connection,$key;
        $FName = $_GET['FName'];
        $LName = $_GET['LName'];
        $FaName = $_GET['FaName'];
        $FName = str_replace("%","[A-Za-zΑ-Ωα-ωΉΆΌΊΎΈΏίϊΐόάέύϋΰήώ \']+",$FName);
        $FName = "/^".$FName."$/u";
        $LName = str_replace("%","[A-Za-zΑ-Ωα-ωΉΆΌΊΎΈΏίϊΐόάέύϋΰήώ \']+",$LName);
        $LName = "/^".$LName."$/u";
        $FaName = str_replace("%","[A-Za-zΑ-Ωα-ωΉΆΌΊΎΈΏίϊΐόάέύϋΰήώ \']+",$FaName);
        $FaName = "/^".$FaName."$/u";
        $names = array();
        if($FName == '/^$/u'&&$LName == '/^$/u'){
            header("Location: ".$file."?FaName=$FaName&status=χρειάζεται να έχεται τουλάχιστον όνομα ή επώνυμο");
        }
        else{
            $query = " SELECT * FROM enc_patients;";
            $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($result)){
                $name = explode('_',$row['nameenc']); 
                // echo $LName;
                if((preg_match($FName,decrypt($key,$name[0]))||$FName=='/^$/u')&&(preg_match($LName,decrypt($key,$name[1]))||$LName=='/^$/u')&&(preg_match($FaName,decrypt($key,$name[2]))||$FaName=='/^$/u')){
                    array_push($names,$name);
                    // echo 1;
                }
            }
            // echo $names[0][1];
            $query = " SELECT * FROM enc_patients WHERE ";
            for($i=0;$i<count($names)-1;$i++){
                $query = $query . "nameenc LIKE '".$names[$i][0]. "%".$names[$i][1]."%".$names[$i][2]."%' OR ";
            }  
            if(count($names)>0){
                $query = $query . "nameenc LIKE '".$names[count($names)-1][0]. "%".$names[count($names)-1][1]."%".$names[count($names)-1][2]."%';";
            }
            else{
                echo "<center> <br><div class='alert alert-danger' role='alert'>
                        No such patient!!
                        </div> </center>";
                        return;
            }
            // echo $query;
            $result =  mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            if($bool) show_full_res($result,$counter,$file);
            else show_res($result,$counter);
        }
    }

    function search_by_id_res($file,$bool=FALSE){
        global $connection;
        $Id = $_GET['Id'];
        if($Id == ''){
            header("Location: ".$file."?FaName=$FaName&status=χρειάζεται να έχεται id");
        }
        else{
            $query = " SELECT * FROM enc_patients WHERE id = '$Id';";  
            $result =  mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            if($bool)  show_full_res($result,$counter,$file);
            else show_res($result,$counter);
        }
    }

    function by_phonenum_search_bar($file){
        echo   '<center>
                <br><br><br>
                <b><h2>Aναζήτηση με βάση τον αριθμό τηλεφώνου</h2></b>
                <br>
                <form action = "'.$file.'" method = "GET" id = "myform" name = "myform">
                    <input type = "text" name = "PhNum" placeholder = "Αριθμός Τηλεφώνου">
                    <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                        search
                    </button>
                </form> 
            </center>
            </body>
            </html>';
    }

    function by_pid_search_bar($file){
        echo   '<center>
        <br><br><br>
                <b><h2>Aναζήτηση με βάση το ID του ιδιοκτήτη</h2><b>
                <br>
                <form action = "'.$file.'" method = "GET" id = "myform2" name = "myform2">
                    <input type = "text" name = "pid" placeholder = "ID">
                    <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                        search
                    </button>
                </form> 
            </center>
            </body>
            </html>';
    }
    function search_by_pid_res($file,$bool=FALSE){
        global $connection;
        $Id = $_GET['pid'];
        if($Id == ''){
            header("Location: ".$file."?FaName=$FaName&status=χρειάζεται να έχετε id");
        }
        else{
            $query = " SELECT * FROM phones WHERE pid = '$Id';";  
            $result =  mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            if($bool)  show_res_ph($result,$counter,$file);
            else show_res_ph($result,$counter);
        }
    }

    function search_by_phonenum_res($file,$bool=FALSE){
        global $connection;
        $phone = $_GET['PhNum'];
        //$phone = str_replace("%","[0-9 \']+",$phone); 
        //$phone = "/^".$phone."$/u";
        if($phone == ""){
            header("Location: ".$file."?FaName=$FaName&status=χρειάζεται να έχετε αριθμό τηλεφώνου");
        }
        else{
            $query = " SELECT * FROM phones WHERE number LIKE '$phone';";  
            $result =  mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            if($bool)  show_res_ph($result,$counter,$file);
            else show_res_ph($result,$counter);
        }
    }