<?php
$con=mysqli_connect("localhost","r64511gran_raluca","z93VuZHqr2vbTwd") or die ("Nu se poate conecta la serverul MySQL");

mysqli_select_db($con,"r64511gran_date_senzori") or die("Nu se poate selecta baza de date");


$sql = "select * from date_senzori where id='690'";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
    array_push($result,array('locatie'=>$row[1],'umiditate'=>$row[2],'temperatura'=>$row[3],'calitate_aer'=>$row[4], 'timp'=>$row[8],'id'=>$row[0],'UV'=>$row[5], 'presiune'=>$row[6],'distanta'=>$row[7]));
}
 
echo json_encode(array("result"=>$result));

mysqli_close($con);
 
?>
