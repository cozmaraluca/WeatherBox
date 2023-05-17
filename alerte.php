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
        

if(isset($_POST['submit'])){
    
         $cod= $_POST['cod'];

   $sql = "UPDATE date_personale SET temp_max='".$_POST['temp_max']."', temp_min='".$_POST['temp_min']."', umid_min='".$_POST['umid_min']."', umid_max='".$_POST['umid_max']."', aer_min='".$_POST['aer_min']."', prec_max='".$_POST['preciptatii_max']."', uv_min='".$_POST['uv_min']."', uv_max='".$_POST['uv_max']."', pres_min='".$_POST['presiune_min']."', pres_max='".$_POST['presiune_max']."' WHERE cod='".$cod."' " ;
  
        
        if ($conn->query($sql) === TRUE) 
        {
           header('Location:success.html'); 
        } 
        else 
        {
            echo "Eroare: " . $sql . "<br>" . $conn->error;
        }
    
       
    
}
     $conn->close();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <style>

        
body {
	
 /*background-image: url("tornada.gif");
	background-repeat: no-repeat;*/
  height: 100%;
	background-size: cover;
	margin:0;
	

}
.parola{
    color:red;
    top:260px;
    left:200px;
    font-size:15px;
    position:absolute;
}
.link{
    color:red;
    top:300px;
    left:200px;
    font-size:15px;
    position:absolute;
}

.submit{
    height: 50px;
    width: 15%;
		position: absolute;
   bottom: 100px;
		left:500px;
	font: 900;
			font-size: 28;
		background-color:white;
		border-color:black;
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
.logo{
    position:absolute;
    left:800px;
    bottom:0px;
    height:400px;
    width:550px;
}
.cod{
    position:absolute;
    left:30px;
    top:200px;
}
.codT{
    position:absolute;
    left:30px;
    top:250px;
}
.t_max{
    position:absolute;
    left:250px;
    top:120px;
}
.t_maxT{
    position:absolute;
    left:250px;
    top:160px;
}
.t_min{
    position:absolute;
    left:250px;
    top:180px;
}
.t_minT{
    position:absolute;
    left:250px;
    top:220px;
}

.u_max{
    position:absolute;
    left:250px;
    top:260px;
}
.u_maxT{
    position:absolute;
    left:250px;
    top:300px;
}
.u_min{
    position:absolute;
    left:250px;
    top:320px;
}
.u_minT{
    position:absolute;
    left:250px;
    top:360px;
}

.a_min{
    position:absolute;
    left:470px;
    top:180px;
}
.a_minT{
    position:absolute;
    left:470px;
    top:220px;
}

.prec_max{
    position:absolute;
    left:470px;
    top:260px;
}
.prec_maxT{
    position:absolute;
    left:470px;
    top:300px;
}

.v_max{
    position:absolute;
    left:720px;
    top:120px;
}
.v_maxT{
    position:absolute;
    left:720px;
    top:160px;
}
.v_min{
    position:absolute;
    left:720px;
    top:180px;
}
.v_minT{
    position:absolute;
    left:720px;
    top:220px;
}

.pres_max{
    position:absolute;
    left:720px;
    top:260px;
}
.pres_maxT{
    position:absolute;
    left:720px;
    top:300px;
}
.pres_min{
    position:absolute;
    left:720px;
    top:320px;
}
.pres_minT{
    position:absolute;
    left:720px;
    top:360px;
}



</style>
</head>
<body>
<div style = " background-color: rgba(0,0,0,0.1);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index:-1">
      </div>
	<ul>
  <li><a href="http://vremeata.ro/WeatherBox.php">Acasă</a></li>
  <li><a class="signup" href="http://vremeata.ro/fenomene.php">Curiozități</a></li>
  <li><a href="http://vremeata.ro/afisarenou.php">Toate măsuratorile</a></li>
   <li><a class="login" href="http://vremeata.ro/contact.php">Contact</a></li>
   <li><a href="http://vremeata.ro/cautare.php">Cum a fost vremea?</a></li>
   <li><a href="http://vremeata.ro/alerte.php">Configurare alerte</a></li>
</ul>

<form action="" method="post">
<p class="cod">Cod:</p> <input class="codT" type="text" name="cod"><br>
<p class="t_max">Temperatura maxima admisa:</p> <input class="t_maxT" type="text" name="temp_max"><br>
<p class="t_min">Temperatura minima admisa:</p> <input class="t_minT" type="text" name="temp_min"><br>
<p class="u_max">Umiditatea maxima admisa(%):</p> <input class="u_maxT" type="text" name="umid_max"><br>
<p class="u_min">Umiditatea minima admisa(%):</p> <input class="u_minT" type="text" name="umid_min"><br>
<p class="a_min">Calitatea aerului minima admisa:</p> <input class="a_minT" type="text" name="aer_min"><br>
<p class="prec_max">Nivelul de precipitatii maxim admis:</p> <input class="prec_maxT" type="text" name="precipitatii_max"><br>
<p class="cod">Cod:</p> <input class="codT" type="text" name="cod"><br>
<p class="v_max">Indexul UV maxim admis:</p> <input class="v_maxT" type="text" name="uv_max"><br>
<p class="v_min">Indexul UV minim admis:</p> <input class="v_minT" type="text" name="uv_min"><br>
<p class="pres_max">Presiunea atmosferica maxima admisa:</p> <input class="pres_maxT" type="text" name="presiune_max"><br>
<p class="pres_min">Presiunea atmosferica minima admisa:</p> <input class="pres_minT" type="text" name="presiune_min"><br>

<input type="submit" class="submit" name="submit" value="Salveaza">
</form>
<img src="logo.png" class="logo">
</body>
</html> 