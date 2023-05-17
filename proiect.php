<?php

$nume_server = "localhost";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $cod = $temperatura = $umiditate  = $calitate_aer ="";

if (strtoupper($_SERVER["REQUEST_METHOD"]) == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) 
    {
        //$senzor = test_input($_POST["senzor"]);
        $cod = test_input($_POST["cod"]);
        $umiditate = test_input($_POST["umiditate"]);
        $temperatura = test_input($_POST["temperatura"]);
        $calitate = test_input($_POST["calitate_aer"]);
        
        echo $temperatura+" ";
        
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