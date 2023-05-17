<?php
$con=mysqli_connect("localhost","r64511gran_raluca","z93VuZHqr2vbTwd") or die ("Nu se poate conecta la serverul MySQL");

mysqli_select_db($con,"r64511gran_date_senzori") or die("Nu se poate selecta baza de date");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    

    
    $sql="SELECT * FROM date_personale WHERE email= '".$email."'";
    $response=mysqli_query($con,$sql);
    $result=array();
    $result['login']=array();
    
    if(mysqli_num_rows($response)==1){
        $row=mysqli_fetch_assoc($response);

        if(strcmp($password, $row['parola'])==0){
            $index['name']=$row['nume'];
            $index['fname']=$row['prenume'];
            
            array_push($result['login'], $index);
            
            $result['success']="1";
            $result['message']="success";
            echo json_encode($result);
            mysqli_close($con);
        }
        else{
            $result['success']="0";
            $result['message']="error";
            echo json_encode($result); 
            mysqli_close($con);
        }
    }
}


?>