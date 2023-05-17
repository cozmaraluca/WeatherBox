<?php

$nume_server = "localhost";

$nume_bd = "r64511gran_date_senzori";

$nume_utilizator = "r64511gran_raluca";

$parola = "z93VuZHqr2vbTwd";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $cod = $temperatura = $umiditate  = $calitate_aer =$UV =$presiune =$distanta ="";

if (strtoupper($_SERVER["REQUEST_METHOD"]) == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) 
    {
        //$senzor = test_input($_POST["senzor"]);
        $cod = test_input($_POST["cod"]);
        $umiditate = test_input($_POST["umiditate"]);
        $temperatura = test_input($_POST["temperatura"]);
        $calitate = test_input($_POST["calitate_aer"]);
        $UV = test_input($_POST["UV"]);
        $presiune = test_input($_POST["presiune"]);
        $dist = test_input($_POST["distanta"]);
        $distanta=0.075*(13-$dist)*10;
        //*10 pt ca masoara in cm si eu vreau mm
        //0.075 este aria in metri patrati a recipientului 
        //12.5 este inaltimea din care scade dist pana la apa si obtine niv apei
        
  /*      if($calitate<50)
        $calitate_aer=$calitate/4.1;
        if($calitate>50 && $calitate<100)
        $calitate_aer=$calitate/2.8;
         if($calitate>100 && $calitate<150)
        $calitate_aer=$calitate/2.7;
         if($calitate>150 && $calitate<200)
        $calitate_aer=$calitate/1.3;
        if($calitate>200 && $calitate<300)
        $calitate_aer=$calitate/1.2;
        if($calitate>300 && $calitate<400)
        $calitate_aer=$calitate/1.1;
        if($calitate>400 )
        $calitate_aer=$calitate/1;
        
       */ 
        
        // Create connection
        $conn = new mysqli($nume_server, $nume_utilizator, $parola, $nume_bd);
        // Check connection
        if ($conn->connect_error) 
        {
            die("Eroare conexiune: " . $conn->connect_error);
        } 
         $query=mysqli_query($conn,"SELECT temp_min from date_personale where cod='".$cod."'");
     $row= mysqli_fetch_array($query);
    $tMin_dp = $row['temp_min'];
    
    $query2=mysqli_query($conn,"SELECT temp_max from date_personale where cod='".$cod."'");
     $row2= mysqli_fetch_array($query2);
        $tMax_dp = $row2['temp_max'];
        
        $query3=mysqli_query($conn,"SELECT email from date_personale where cod='".$cod."'");
     $row3= mysqli_fetch_array($query3);
        $email_dp = $row3['email'];
        
         $query4=mysqli_query($conn,"SELECT umid_min from date_personale where cod='".$cod."'");
     $row4= mysqli_fetch_array($query4);
    $uMin_dp = $row4['umid_min'];
    
    $query5=mysqli_query($conn,"SELECT umid_max from date_personale where cod='".$cod."'");
     $row5= mysqli_fetch_array($query5);
        $uMax_dp = $row5['umid_max'];
        
    $query6=mysqli_query($conn,"SELECT aer_min from date_personale where cod='".$cod."'");
     $row6= mysqli_fetch_array($query6);
    $aMin_dp = $row6['aer_min'];
    
    $query7=mysqli_query($conn,"SELECT prec_max from date_personale where cod='".$cod."'");
     $row7= mysqli_fetch_array($query7);
        $precMax_dp = $row7['prec_max'];
        
    $query8=mysqli_query($conn,"SELECT uv_min from date_personale where cod='".$cod."'");
     $row8= mysqli_fetch_array($query8);
    $uvMin_dp = $row8['uv_min'];
    
    $query9=mysqli_query($conn,"SELECT uv_max from date_personale where cod='".$cod."'");
     $row9= mysqli_fetch_array($query9);
        $uvMax_dp = $row9['uv_max'];
        
    $query10=mysqli_query($conn,"SELECT pres_min from date_personale where cod='".$cod."'");
     $row10= mysqli_fetch_array($query10);
    $presMin_dp = $row10['pres_min'];
    
    $query11=mysqli_query($conn,"SELECT pres_max from date_personale where cod='".$cod."'");
     $row11= mysqli_fetch_array($query11);
        $presMax_dp = $row11['pres_max'];
        
        if($temperatura<$tMin_dp || $temperatura>$tMax_dp || $umiditate<$uMin_dp ||$umiditate>$uMax_dp || $calitate_aer>$aMin_dp || $precipitatii> $precMax_dp || $UV<$uvMin_dp || $UV> $uvMax_dp|| $presiune<$presMin_dp || $presiune> $presMax_dp)
    {
        $to = "raluca_cozma97@yahoo.com" ; 
        $from = $email_dp; 
         $subject = "Alerta WeatherBox";
    $message = "Bună ziua! \n Aveți o alertă de la WeatherBox. Un parametru nu se află în limitele stabilite de dumneavoastră. Aceasta este lista valorilor înregistrate: \n Temperatura: ".$temperatura . "\n Umiditatea: " . $umiditate . "\nCalitatea aerului: ".$calitate_aer . "\n Indicele UV: " . $UV . "\n Presiunea atmosferică: " . $presiune . "\n Precipitații: " . $distanta . "" . "\n\n";

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    }
        else{
        $sql = "INSERT INTO date_senzori ( cod,  temperatura, umiditate, calitate_aer, UV, presiune, distanta)
        VALUES ( '" . $cod . "', '" . $temperatura . "' , '" . $umiditate . "','" . $calitate_aer . "','" . $UV . "','" . $presiune . "', '" . $distanta . "')";
        
        if ($conn->query($sql) === TRUE) 
        {
            echo "A fost adaugata o noua inregistrare";
        } 
        else 
        {
            echo "Eroare: " . $sql . "<br>" . $conn->error;
        }
            
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "HTTP POST nu a furnizat date.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}