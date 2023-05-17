<?php

$con=mysqli_connect("localhost","r64511gran_raluca","z93VuZHqr2vbTwd") or die ("Nu se poate conecta la serverul MySQL");

mysqli_select_db($con,"r64511gran_date_senzori") or die("Nu se poate selecta baza de date");


    
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $email=$_POST['email'];
    $telefon=$_POST['telefon'];
    $password=$_POST['parola'];
    $cod=$_POST['cod'];
    
 $sql="SELECT * FROM date_personale WHERE cod= '".$cod."'";
    $response=mysqli_query($con,$sql);
    $result=array();
    $result['login']=array();

    
  $sql1 = "UPDATE date_personale SET nume='".$nume."', prenume='".$prenume."', email='".$email."', telefon='".$telefon."',parola='".$password."' WHERE cod='".$cod."' ";
        
    if(mysqli_num_rows($response)==1){
        $row=mysqli_fetch_assoc($response);
        if(strcmp($password, $row['parola'])==0){
            $index['name']=$row['nume'];
            $index['fname']=$row['prenume'];
            
            array_push($result['login'], $index);    
 if(mysqli_query($con,$sql1)){
            $result["success"]="1";
            $result["message"]="success";
            
            echo json_encode($result);
            mysqli_close($con);
        }
        }
        else{
            $result["success"]="0";
            $result["message"]="error";
               echo json_encode($result);
            mysqli_close($con);
        }
}

 
}



?>