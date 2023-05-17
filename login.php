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
    

    
    
    $from = $_POST['email']; // this is the sender's Email address
    $password = $_POST['parola'];

session_start();
$_SESSION['email'] = $from;


     $query=mysqli_query($conn,"SELECT parola from date_personale where email='".$from."'");
     $row= mysqli_fetch_array($query);
    $parola_bd = $row['parola'];
     
     
    $query2=mysqli_query($conn,"SELECT email from date_personale where parola='".$password."' ");
     $row2= mysqli_fetch_array($query2);
    $email_bd = $row2['email'];
    
if(strcmp($parola_bd,$_POST['parola'])==0 ){
  if(strcmp($email_bd,$_POST['email'])==0) { 
           header('Location:logat.php'); 
    
    }
    else echo "<p class='parola'>Adresa de email incorecta!</p>";
}
    else echo "<p class='parola'>Parola incorecta!</p>";
}
     $conn->close();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <style>

        
body {
	
/* background-image: url("gray.png");
	background-repeat: no-repeat;*/
  height: 100%;
	background-size: cover;
	margin:0;
	

}
.parola{
    color:red;
    top:300px;
    left:250px;
    font-size:15px;
    position:absolute;
}
.submit{
    height: 50px;
    width: 15%;
		position: absolute;
  top: 350px;
		left:50px;
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
.gmail{
    position:absolute;
    top:100px;
    left:50px;
}
.gmailT{
    position:absolute;
    top:150px;
    left:50px;
}
.pas{
    position:absolute;
    top:200px;
    left:50px;
}
.pasT{
    position:absolute;
    top:250px;
    left:50px;
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
  <li><a href="http://vremeata.ro/fenomene.php">Curiozități</a></li>
  <li><a class="login" href="http://vremeata.ro/login.php">Log in</a></li>
  <li><a class="signup" href="http://vremeata.ro/signup.php">Sign up</a></li>
   <li><a href="http://vremeata.ro/contact.php">Contact</a></li>
    
</ul>

<form action="" method="post">

<p class="gmail">Gmail:</p> <input class="gmailT" type="text" name="email"><br>
<p class="pas">Parola:</p> <input class="pasT" type="text" name="parola"><br>
<input type="submit" class="submit" name="submit" value="Submit">
</form>

<img src="logo.png" class="logo">

</body>
</html> 