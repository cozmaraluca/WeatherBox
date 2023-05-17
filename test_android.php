<?php
$con=mysqli_connect("localhost","r64511gran_raluca","z93VuZHqr2vbTwd") or die ("Nu se poate conecta la serverul MySQL");

mysqli_select_db($con,"r64511gran_date_senzori") or die("Nu se poate selecta baza de date");

//$locatie  = $_GET['locatie'];
$timp = $_GET['timp'];
 
$sql = "select * from date_senzori where day(timp)= '".substr($timp,8,2)."' AND  month(timp)= '".substr($timp,5,2)."' AND  year(timp)= '".substr($timp,0,4)."' AND  hour(timp)= '".substr($timp,11,2)."'";
//;day(timp)= '".substr($timp,8,2)."'";
//timp like '%$timp%'"

 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
    array_push($result,array('locatie'=>$row[1],'umiditate'=>$row[2],'temperatura'=>$row[3],'calitate_aer'=>$row[4], 'timp'=>$row[8],'id'=>$row[0],'UV'=>$row[5], 'presiune'=>$row[6],'distanta'=>$row[7]));
}
 
echo json_encode(array("result"=>$result));

mysqli_close($con);
 
?>
