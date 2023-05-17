<?php
$nume_server = "localhost";

$nume_bd = "r64511gran_date_senzori";

$nume_utilizator = "r64511gran_raluca";

$parola = "z93VuZHqr2vbTwd";


 $conn = new mysqli($nume_server, $nume_utilizator, $parola, $nume_bd);
        // Check connection
        if ($conn->connect_error) 
        {
            die("Eroare conexiune: " . $conn->connect_error);
        } 
session_start();
$email = $_SESSION['email'];

    $query3=mysqli_query($conn,"SELECT cod from date_personale where email='".$email."'");
     $row3= mysqli_fetch_array($query3);
    $cod_dp = $row3['cod'];

$query2=mysqli_query($conn,"select  cod, temperatura, umiditate, calitate_aer, UV, presiune, distanta, timp from date_senzori where cod='".$cod_dp."'");
$nr_inreg=mysqli_num_rows($query2);


echo "<div class=layer>";
 //daca exista inregistrari
if ($nr_inreg>0){

 echo "<table >";
 echo"<tr bgcolor='silver'>";
 
 //echo "<th>ID</th>";
  //echo "<th>SENZOR</th>";
   echo "<th>COD</th>";
    echo "<th>UMIDITATE</th>";
     echo "<th>TEMPERATURA</th>";
      echo "<th>CALITATE AER</th>";
      echo "<th>UV</th>";
      echo "<th>PRESIUNE ATMOSFERICA</th>";
      echo "<th>PRECIPITATII</th>";
      echo "<th>TIMP</th>";
 //}
 echo"</tr>";
 
 while($row=mysqli_fetch_assoc($query2)){
 echo"<tr>";
	 foreach ($row as $value1){
		 	echo "<td>$value1</td>";}
		 

 echo"</tr>";
 }
 
 echo"</table>";
}

else{ 
 echo"<center>";
 echo "Nu s-a gasit nici o inregistrare!!!";
 echo"</center>";
}

mysqli_close($conn);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>STAREA VREMII</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style>
	
body {
	
	margin:0;
}
	table{
		width: 100%; 
		height:80%;
		border:2;
		font:900;
		font-size:26;
		top:55px;
		position:absolute;
		margin:0px;
		}
		th{
			background-color: #1EECAE;
			margin:0px;
  color: white;
		}
   h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}


ul {
  list-style-type: none;
  margin: 0 px;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #f3f3f3;
   position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
 
}

li {
  float: left;
}

li a {
     
  display: block;
  color: #666;
  text-align: center;
  padding: 16px 18px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ddd;
}

li a.active {
  color: white;
  background-color: #4CAF50;
} 
.login{
    left:1200px;
    position:absolute;
}
.signup{
    left:1100px;
   position:absolute;
}
.logo_bar{
     left:1270px;
     height:50px;
    position:absolute;
}
		
	</style>
</head>

<body>
    <ul>
  <li><a href="http://vremeata.ro/WeatherBox.php">Acasă</a></li>
  <li><a class="signup" href="http://vremeata.ro/fenomene.php">Curiozități</a></li>
  <li><a href="http://vremeata.ro/afisarenou.php">Toate măsuratorile</a></li>
   <li><a class="login" href="http://vremeata.ro/contact.php">Contact</a></li>
   <li><a href="http://vremeata.ro/cautare.php">Cum a fost vremea?</a></li>
   <li><a href="http://vremeata.ro/alerte.php">Configurare alerte</a></li>
    <li><img src="logo.png" class="logo_bar"></li> 
  
</ul>
	

</body>
</html>