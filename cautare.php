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
    
    $an = $_POST['an']; // this is the sender's Email address
    $luna = $_POST['luna'];
    $zi = $_POST['zi'];
    $ora = $_POST['ora'];
    

  $query =mysqli_query($conn,"SELECT * FROM  date_senzori  WHERE timp BETWEEN '" . $an . "-" . $luna . "-" . $zi . " " . $ora . ":00:00' AND '" . $an . "-" . $luna . "-" . $zi . " " . $ora . ":59:59'");
   $row= mysqli_fetch_array($query); 
   
        $umid_bd = $row['umiditate'];
      echo "<p class='umid'>$umid_bd</p>";
      echo "<img src='drop.jpg' class='water'>";
      
       $temperatura_bd = $row['temperatura'];
        echo "<p class='temp'>$temperatura_bd</p>";
        if($temperatura_bd<=0)
        echo"<img class='termometru' src='rece.png' >";
                if($temperatura_bd>0 && $temperatura_bd<15)
        echo"<img src='mediu.png' class='termometru'>";
                if($temperatura_bd>=15)
        echo"<img src='cald.png' class='termometru'>";
      
        $aer_bd = $row['calitate_aer'];
      echo "<p class='aer'>$aer_bd</p>";
      echo "<img src='aer.jpg' class='calit'>";
      
      $pres_bd = $row['presiune'];
      echo "<p class='pres'>$pres_bd</p>";
      echo "<img src='pres.png' class='presiune'>";
      
      $prec_bd = $row['distanta'];
      echo "<p class='prec'>$prec_bd</p>";
      echo "<img src='ploaie.png' class='rain'>";
      
       $uv_bd = $row['UV'];
      echo "<p class='uv'>$uv_bd</p>";
      echo "<img src='uv.png' class='sun'>";
      
     
}
        
     $conn->close();
   ?>
   <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <style>

        
body {
	
/* background-image: url("logo.png");
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
   bottom: 120px;
		left:0px;
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
.temp{
   top:120px;
   left:420px;
   font-weight:bold;
   position:absolute;
}
.select{
    width:15%;
    height:30px;
}
.termometru{
    position:absolute;
    top:120px;
    left:370px;
}
.logo{
    position:absolute;
    left:800px;
    bottom:0px;
    height:400px;
    width:550px;
}
.umid{
   top:120px;
   left:600px;
   font-weight:bold;
   position:absolute;
}
.water{
       top:110px;
   left:540px;
   position:absolute;
   height:70px;
}
.prec{
   top:210px;
   left:430px;
   font-weight:bold;
   position:absolute;
}
.rain{
       top:190px;
   left:320px;
   position:absolute;
   height:90px;
}
.pres{
   top:210px;
   left:610px;
   font-weight:bold;
   position:absolute;
}
.presiune{
       top:190px;
   left:530px;
   position:absolute;
   height:70px;
}
.aer{
   top:280px;
   left:610px;
   font-weight:bold;
   position:absolute;
}
.calit{
       top:270px;
   left:510px;
   position:absolute;
   height:60px;
}
.uv{
   top:280px;
   left:430px;
   font-weight:bold;
   position:absolute;
}
.sun{
       top:270px;
   left:350px;
   position:absolute;
   height:60px;
}


</style>
</head>
<body>

	<ul>
  <li><a href="http://vremeata.ro/WeatherBox.php">Acasă</a></li>
  <li><a class="signup" href="http://vremeata.ro/fenomene.php">Curiozități</a></li>
  <li><a href="http://vremeata.ro/afisarenou.php">Toate masuratorile</a></li>
   <li><a class="login" href="http://vremeata.ro/contact.php">Contact</a></li>
   <li><a href="http://vremeata.ro/cautare.php">Cum a fost vremea?</a></li>
   <li><a href="http://vremeata.ro/alerte.php">Configurare alerte</a></li>
</ul>

<form action="" method="post">
<p  >An:</p> <input type="text" name="an"><br>
<p >Luna:</p> <select class="select" name="luna">
  <option value="01">Ianuarie</option>
  <option value="02">Februarie</option>
  <option value="03">Martie</option>
  <option value="04">Aprilie</option>
  <option value="05">Mai</option>
  <option value="06">Iunie</option>
  <option value="07">Iulie</option>
  <option value="08">August</option>
  <option value="09">Septembrie</option>
  <option value="10">Octombrie</option>
  <option value="11">Noiembrie</option>
  <option value="12">Decembrie</option>
</select><br>
<p >Zi:</p><select class="select"  name="zi">  
  <option value="01">1</option>
  <option value="02">2</option>
  <option value="03">3</option>
  <option value="04">4</option>
  <option value="05">5</option>
  <option value="06">6</option>
  <option value="07">7</option>
  <option value="08">8</option>
  <option value="09">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">18</option>
  <option value="26">19</option>
  <option value="27">20</option>
  <option value="28">21</option>
  <option value="29">22</option>
  <option value="30">23</option>
  <option value="31">24</option>
</select><br><br>
<p >Ora:</p> </p><select class="select"  name="ora">  
  <option value="00">00</option>
  <option value="01">1</option>
  <option value="02">2</option>
  <option value="03">3</option>
  <option value="04">4</option>
  <option value="05">5</option>
  <option value="06">6</option>
  <option value="07">7</option>
  <option value="08">8</option>
  <option value="09">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  
</select><br><br><br>
<input type="submit" class="submit" name="submit" value="Cauta">
</form>

<img src="logo.png" class="logo">
</body>
</html> 
        
        
        