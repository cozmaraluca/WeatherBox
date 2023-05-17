<?php

$con=mysqli_connect("localhost","r64511gran_raluca","z93VuZHqr2vbTwd") or die ("Nu se poate conecta la serverul MySQL");

mysqli_select_db($con,"r64511gran_date_senzori") or die("Nu se poate selecta baza de date");

$result=array();

$query=mysqli_query($con,"SELECT * FROM date_senzori");



if(mysqli_num_rows($query)>0)
{
    $data=array();
    while($row=mysqli_fetch_assoc($query))
        array_push($data,$row);
}
$result['data']=$data;

echo json_encode($result);
mysqli_close($con);
?>