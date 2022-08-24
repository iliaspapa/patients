<?php
    include_once "header.php";
    
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
    $phtype = $_GET['phtype'];
    $history = $_GET['history'];
    $comments = $_GET['comments'];
    $examination = $_GET['examination'];
    $meds = $_GET['meds'];
    $now = $_GET['fdiagn'];
    $history=preg_replace("/\n/", "%0A", $history);
    $history = preg_replace('/\s+/', '', $history);
    $comments=preg_replace("/\n/", "%0A", $comments);
    $comments = preg_replace('/\s+/', '', $comments);
    $meds=preg_replace("/\n/", "%0A", $meds);
    $meds = preg_replace('/\s+/', '', $meds);
    $examination=preg_replace("/\n/", "%0A", $examination);
    $examination = preg_replace('/\s+/', '', $examination);
    $query = " SELECT * FROM phones WHERE number = '$phone';";   
    $result =  mysqli_query($connection,$query);
    $counter = mysqli_num_rows($result);
    $Fname = $Fname;
    echo 1;
    echo $Fname;
    echo 1;
    $name = encrypt($key,' '.$Fname).'_'.encrypt($key,$Lname).'_'.encrypt($key,$Faname);
    if($counter > 0){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το τηλέφωνο αυτό είναι είδη καταχωρημένο σε χρήστη"); 
    }
    else if(!preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ\']+$/u',$Fname)==true){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=λάθος μορφή ονόματος");
    }
    else if(!preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ \']+$/u',$Lname)==true){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=λάθος μορφή επωνύμου");
    }
    else if($Faname!=''&&!preg_match('/^[A-ZΑ-ΩΉΆΌΊΎΈΏ][a-zα-ωίϊΐόάέύϋΰήώ \']+$/u',$Faname)==true){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=λάθος μορφή πατρωνύμου");
    }
    else if($shoe==''){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το νούμερο παπουτσιού πρέπει να μην ειναι κενό"); 
    }
    else if($number!=''&&!is_numeric($number)){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το πεδίο αριθμός πρέπει να είναι νούμερο");   
    }
    else if($hight!=''&&($hight > 2.5 || $hight < 0.3)&&( $hight>250||$hight<30)){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$med&fdiagn=$nows&status=ύψος εκτώς αποδεκτού εύρους"); 
    }
    else if($weight!=''&&($weight > 300 || $weight < 20)){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=Βάρος εκτώς αποδεκτού εύρους"); 
    }

    else if($Fname == ''){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το πεδίο Όνομα δεν πρέπει να είναι κενό");  
    }
    else if($Lname == ''){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το πεδίο Επώνυμο δεν πρέπει να είναι κενό");  
    }
    //else if($Faname == ''){
    //    header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το πεδίο Πατρώνυμο δεν πρέπει να είναι κενό");  
    //}
    
    // else if(!is_numeric($phone)){
    //     header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το πεδίο Τηλέφωνο πρέπει να είναι αριθμός");  
    // }
    // else if($phone > 9999999999 || $phone < 1000000000){
    //     header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το Πεδίο Τηλέφωνο πρέπει να έχει ακριβώς 10 ψηφεία");
    // }

    else if(!is_numeric($phcountry)){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=το πεδίο Κωδικός χώρας πρέπει να είναι αριθμός"); 
    }
    else if($phcountry > 300 || $phcountry < 1){
        header ("Location: addpatient.php?Fname=$Fname&Lname=$Lname&Faname=$Faname&street=$street&number=$number&city=$city&hight=$hight&weight=$weight&ref=$ref&bdate=$bdate&shoe=$shoe&profetion=$profetion&e-mail=$email&amka=$amka&phone=$phone&country=$country&phtype=$phtype&history=$history&comments=$comments&phcountry=$phcountry&examination=$examination&meds=$meds&fdiagn=$now&status=μη εγκυρη τιμή για το Πεδίο κωδικός χώρας"); 
    }
    else
    {
        if($now == '')$now = date('Y-m-d');
        $query  = " INSERT INTO enc_patients (nameenc,street,number,city,hight,weight,sourse,date_of_birth,comments,
                    foot_size,history,meds,examination,date_of_first_diagnosis,country,profetion,email,amka) 
                    VALUES ( '$name', '$street', '$number', '$city', '$hight','$weight','$ref','$bdate','$comments',
                    '$shoe','$history','$meds','$examination','$now','$country','$profetion','$email','$amka'); ";
        mysqli_query($connection,$query);
        echo $query;
        $query = " SELECT id FROM enc_patients WHERE nameenc = '$name' and date_of_birth = '$bdate';";
        $result = mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        $st=$row['id'];
        // echo $phone;
        $query  = "INSERT INTO phones (number, pid, country, type) VALUES ('$phone', '$st','$phcountry','$phtype');";
        mysqli_query($connection,$query);

        header ("Location: addpatient.php?status=successful&id=$st");
        //Fname=Nikos&Lname=Papandreou&Faname=Dimitrios&street=agias&number=10&city=Penteli&hight=1.66&weight=61&ref=nop&bdate=1970-06-13&shoe=41&profetion=doctor&e-mail=ni.papandreou@gmail.com&amka=424223091981&phone=6944005297&country=Greece&phtype=st&history=&comments=&phcountry=0030&examination=&meds=&status=successful&id=14
    }