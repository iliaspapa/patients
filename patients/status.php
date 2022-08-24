<?php
    if(isset($_GET['status'])){
        $error = $_GET['status'];
        if($error == 'successful')
        {
            if(isset($_GET['id']))
            {
                $type = 'success';
                $id=$_GET['id'];
                echo "<center> <h1> <div class='alert alert-$type' role='alert'>
                        $error the id of that patient id=$id 
                        </div> <h1> </center>";
            }
            else{
                $type = 'success';
                echo "<center> <h1> <div class='alert alert-$type' role='alert'>
                        $error 
                        </div> <h1> </center>";
            }
           
        }
        else
        {
            $type = 'danger';
            echo "<center> <h1> <div class='alert alert-$type' role='alert'>
                    $error
                    </div> <h1> 
                  </center>";
        }
    }