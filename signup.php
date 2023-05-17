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
    
        $to = "raluca_cozma97@yahoo.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['nume'];
    $last_name = $_POST['prenume'];
    $telefon = $_POST['telefon'];
    $password = $_POST['parola'];
    $cod= $_POST['cod'];
    $subject = "Form submission";
    
     $query=mysqli_query($conn,"SELECT parola from date_personale where cod='".$cod."'");
     $row= mysqli_fetch_array($query);
    $parola_bd = $row['parola'];
    $query2=mysqli_query($conn,"SELECT email from date_personale where cod='".$cod."'");
     $row2= mysqli_fetch_array($query2);
    $email_bd = $row2['email'];
        $query3=mysqli_query($conn,"SELECT telefon from date_personale where cod='".$cod."'");
     $row3= mysqli_fetch_array($query3);
    $telefon_bd = $row3['telefon'];
    

    
    $message = $first_name . " " . $last_name . " si-a creeat un cont pe vremeata.ro.";
    
if(strcmp($parola_bd,$_POST['parola'])==0){
    if(strcmp($email_bd,$_POST['email'])!=0){
         if(strcmp($telefon_bd,$_POST['telefon'])!=0){
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
   mail($to,$subject,$message,$headers);
   $sql = "UPDATE date_personale SET nume='".$_POST['nume']."', prenume='".$_POST['prenume']."', email='".$_POST['email']."', telefon='".$_POST['telefon']."' WHERE cod='".$cod."' " ;
  
        
        if ($conn->query($sql) === TRUE) 
        {
           header('Location:login.php'); 
        } 
        else 
        {
            echo "Eroare: " . $sql . "<br>" . $conn->error;
        }
    
       
    
    }
     else {echo "<p class='parola'>Exista deja un cont inregistrat pe aceast numar de telefon. </p>";
   echo"<a class='link' href='login.php'> Accesati-va contul</a>";}
       
    }
     else {echo "<p class='parola'>Exista deja un cont inregistrat pe aceasta adresa de email. </p>";
     echo"<a class='link' href='login.php'> Accesati-va contul</a>";}
} else echo "<p class='parola'>Parola incorecta!</p>";
 
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
.nume{
    position:absolute;
    left:50px;
    top:60px;
}
.numeT{
    position:absolute;
    left:50px;
    top:100px;
}
.prenume{
    position:absolute;
    left:50px;
    top:120px;
}
.prenumeT{
    position:absolute;
    left:50px;
    top:160px;
}
.gmail{
    position:absolute;
    left:50px;
    top:180px;
}
.gmailT{
    position:absolute;
    left:50px;
    top:220px;
}

.tel{
    position:absolute;
    left:50px;
    top:240px;
}
.telT{
    position:absolute;
    left:50px;
    top:280px;
}

.pas{
    position:absolute;
    left:50px;
    top:300px;
}
.pasT{
    position:absolute;
    left:50px;
    top:340px;
}

.cod{
    position:absolute;
    left:50px;
    top:360px;
}
.codT{
    position:absolute;
    left:50px;
    top:400px;
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
<p class="nume">Nume:</p> <input class="numeT" type="text" name="nume"><br>
<p class="prenume">Prenume:</p> <input class="prenumeT" type="text" name="prenume"><br>
<p class="gmail">Gmail:</p> <input class="gmailT" type="text" name="email"><br>
<p  class="tel">Telefon:</p> <input  class="telT"type="text" name="telefon"><br>
<p class="pas">Parola:</p> <input class="pasT" type="text" name="parola"><br>
<p class="cod">Cod:</p> <input class="codT" type="text" name="cod"><br>
<input type="submit" class="submit" name="submit" value="Submit">
</form>
<img src="logo.png" class="logo">
</body>
</html> 