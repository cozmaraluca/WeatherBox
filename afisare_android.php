<?php

$con=mysqli_connect("localhost","r64511gran_raluca","z93VuZHqr2vbTwd") or die ("Nu se poate conecta la serverul MySQL");

mysqli_select_db($con,"r64511gran_date_senzori") or die("Nu se poate selecta baza de date");


$query=mysqli_query($con,"SELECT * FROM date_senzori");



if($query)
{
    while($row=mysqli_fetch_array($query))
        $flag[]=$row;

print(json_encode($flag));
}
mysqli_close($con);
?>