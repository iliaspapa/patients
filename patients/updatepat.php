<?php
    include_once "header.php";

    $Id = $_GET['Id'];
    $Fname = $_GET['Fname'];
    $Lname = $_GET['Lname'];
    $Faname = $_GET['Faname'];
    $street = $_GET['street'];
    $number = $_GET['number'];
    $city = $_GET['city'];
    $country = $_GET['country'];
    $hight = $_GET['hight'];
    $weight = $_GET['weight'];
    $ref = $_GET['ref'];
    $bdate = $_GET['bdate'];
    $shoe = $_GET['shoe'];
    $profetion = $_GET['profetion'];
    $email = $_GET['e-mail'];
    $amka = $_GET['amka'];
    $phone = $_GET['phone'];
    $phcountry = $_GET['phcountry'];
    //$phtype = $_GET['phtype'];
    $phtype='';
    $history = $_GET['history'];
    $comments = $_GET['comments'];
    $examination = $_GET['examination'];
    $meds = $_GET['meds'];
    $now = $_GET['now'];
    $history=preg_replace("/\n/", "%0A", $history);
    $history = preg_replace('/\s+/', '', $history);
    $comments=preg_replace("/\n/", "%0A", $comments);
    $comments = preg_replace('/\s+/', '', $comments);
    $meds=preg_replace("/\n/", "%0A", $meds);
    $meds = preg_replace('/\s+/', '', $meds);
    $examination=preg_replace("/\n/", "%0A", $examination);
    $examination = preg_replace('/\s+/', '', $examination);
    $query = "SELECT * FROM enc_patients WHERE id = '$Id';";    
    $result =  mysqli_query($connection,$query);
    $counter = mysqli_num_rows($result);

    if($phone !=''){
        $query = "SELECT * FROM phones WHERE number = '$phone' AND pid <> '$Id';"; 
        $res =  mysqli_query($connection,$query);
        $phcounter = mysqli_num_rows($res);
    }
    else $phcounter = 0;
    $row = mysqli_fetch_assoc($result);
    $oldname = explode('_',$row['nameenc']);
    
    if($Fname == ''){
        $Fname = str_replace(' ','',decrypt($key,$oldname[0]));
    }
    if($Lname == '')$Lname = decrypt($key,$oldname[1]);
    if($Faname == '')$Faname = decrypt($key,$oldname[2]);
    echo $Fname;
    echo preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ\']+$/u',$Fname);
    if($counter <= 0){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=Αυτός ο χρήστης δεν υπάρχει"); 
    }
    else if(!preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ\']+$/u',$Fname)==true){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=οχι έγγυρο μικρο όνομα"); 
    }
    else if(!preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ \']+$/u',$Lname)==true){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=μη εγγυρο επωνυμο"); 
    }
    else if($Faname!=''&&!preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ \']+$/u',$Faname)==true){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=μη εγγυρο πατρωνυμο"); 
    }
    else if($phcounter>0){
        header("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=Αυτό το τηλέφωνο ανήκει είδη σε χρήστη");
    }
    else if($shoe==''){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το νούμερο παπουτσιού πρέπει να είναι νούμερο"); 
    }
    else if(!is_numeric($number)&&$number!=''){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο αριθμός πρέπει να είναι νούμερο");   
    }
    else if(!is_numeric($hight)&&$hight!=''){
        // echo $now;
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο υψος πρέπει να είναι νούμερο");  
    }
    else if($hight!=''&&$hight!=0&&($hight > 2.5 || $hight < 0.3)&&( $hight>250||$hight<30)){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=ύψος εκτώς αποδεκτού εύρους"); 
    }
    else if(!is_numeric($weight)&&$weight!=''){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο Βάρος πρέπει να είναι νούμερο");  
    }
    else if($weight!=''&&$weight!=0&&($weight > 300 || $weight < 20)){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=Βάρος εκτώς αποδεκτού εύρους"); 
    }

    else if($Fname == ''){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο Όνομα δεν πρέπει να είναι κενό");  
    }
    else if($Lname == ''){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο Επώνυμο δεν πρέπει να είναι κενό");  
    }   

    else if(!is_numeric($phone)&&$phone!=''){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο Τηλέφωνο πρέπει να είναι αριθμός");  
    }
    // else if($phone!=''&&($phone > 9999999999 || $phone < 1000000000)){
    //     header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το Πεδίο Τηλέφωνο πρέπει να έχει ακριβώς 10 ψηφεία");
    // }

    else if($phone!=''&&!is_numeric($phcountry)){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=το πεδίο Κωδικός χώρας πρέπει να είναι αριθμός"); 
    }
    else if($phone!=''&&($phcountry > 300 || $phcountry < 1)){
        header ("Location: edditpat.php?Id=$Id&Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&exdate=$now&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&status=μη εγκυρη τιμή για το Πεδίο κωδικός χώρας"); 
    }
    else
    {
        if($street == '')$street=$row['street'];
        if($number == '')$number=$row['number'];
        if($city == '')$city=$row['city'];
        if($hight == '')$hight=$row['hight'];
        if($weight == '')$weight=$row['weight'];
        if($ref == '')$ref=$row['sourse'];
        if($bdate == '')$bdate=$row['date_of_birth'];
        if($comments == '')$comments=$row['comments'];
        if($shoe == '')$shoe=$row['foot_size'];
        if($history == '')$history=$row['history'];
        if($meds == '')$meds=$row['meds'];
        if($examination == '')$examination=$row['examination'];
        if($now == '')$now=$row['date_of_first_diagnosis'];
        if($country == '')$country=$row['country'];
        if($profetion == '')$profetion=$row['profetion'];
        if($email == '')$email=$row['email'];
        if($amka == '')$amka=$row['amka'];
        $Fname = ' '.$Fname;
        echo '42424242';    
        echo $Fname;
        $name = encrypt($key,$Fname).'_'.encrypt($key,$Lname).'_'.encrypt($key,$Faname);
        $d=explode($name,'_');
        echo decrypt($key,$d[0]);   
        echo $history;
        $query  = " UPDATE enc_patients SET nameenc='$name',street='$street',number='$number',city='$city',
                    hight='$hight',weight='$weight',sourse='$ref',date_of_birth='$bdate',comments='$comments',
                    foot_size='$shoe',history='$history',meds='$meds',examination='$examination',
                    date_of_first_diagnosis='$now',country='$country',profetion='$profetion',email='$email',amka='$amka'
                    WHERE id='$Id';";
        echo $query;
        mysqli_query($connection,$query);
        if($phone!=''){
            $query  = "INSERT INTO phones (number, pid, country, type) VALUES ('$phone', '$Id','$phcountry','$phtype');";
            mysqli_query($connection,$query);
        }
        header ("Location: edditpat.php?status=successful&id=$Id");
    }