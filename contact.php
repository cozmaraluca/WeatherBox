<?php 
if(isset($_POST['submit'])){
    $to = "raluca_cozma97@yahoo.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['nume'];
    $last_name = $_POST['prenume'];
    $subject = "Form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['mesaj'];

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
     header('Location:thank_you.html'); 
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <style>

        
body {
	
 background-image: url("curenti.gif");
/*	background-repeat: no-repeat;*/
  height: 100%;
	background-size: cover;
	margin:0;
	

}

.submit{
    height: 50px;
    width: 25%;
		position: absolute;
   bottom: 70px;
		left:0px;
	font: 900;
			font-size: 28;
		background-color:white;
		border-color:gray;
		
}

.telefon{
      font-family: verdana;
  font-size: 20px;
  font-weight:bold;
  	position: absolute;
  left:880px;
    top:80px;
  color:white;
  animation: a_telefon 3s;
}

@keyframes a_telefon {
  from {left: 1050px;}
  to {left: 880px;}
}

.adresa{
      font-family: verdana;
  font-size: 20px;
  font-weight:bold;
  	position: absolute;
  left:880px;
  top:140px;
  color:white;
  animation: a_adresa 3s;
}
@keyframes a_adresa {
  from {left: 1050px;}
  to {left: 880px;}
}

.formular{
      font-family: verdana;
  font-size: 20px;
  font-weight:bold;
  	position: absolute;
  left:0px;
  top:550px;
  color:white;
  animation: a_formular 3s;
}
@keyframes a_formular {
  from {left: 1000px;}
  to {left: 0px;}
}

.tel{
    	position: absolute;
  left:820px;
    top:95px;
    width:3%;
    animation: a_tel 3s;
}

@keyframes a_tel {
  from {left: 600px;}
  to {left: 820px;}
}

.adr{
    	position: absolute;
  left:810px;
    top:140px;
    animation: a_adr 3s;
}

@keyframes a_adr {
  from {left: 600px;}
  to {left: 810px;}
}

.arr{
    	position: absolute;
  left:790px;
    top:270px;
    animation: a_arr 3s;
}

@keyframes a_arr {
  from {top: 250px;}
  to {top: 270px;}
}
	
p {
  font-family: verdana;
  font-size: 20px;
  font-weight:bold;
  
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
.logo_bar{
     left:1270px;
     height:50px;
    position:absolute;
}
.login{
    left:1200px;
    position:absolute;
}
.signup{
    left:1100px;
       position:absolute;
}

    </style>
    </head>
    <body>
        
        <body>
            
                      <div style = " background-color: rgba(0,0,0,0.4);
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
  <li><img src="logo.png" class="logo_bar"></li>
   <li><a href="http://vremeata.ro/contact.php">Contact</a></li>
</ul>


        <form action="" method="post">
<p style="color:white;">Nume:</p> <input type="text" name="nume"><br>
<p style="color:white">Prenume:</p> <input type="text" name="prenume"><br>
<p style="color:white">Gmail:</p> <input type="text" name="email"><br>
<p style="color:white">Mesaj:</p><br><textarea rows="5" name="mesaj" cols="30"></textarea><br>
<input type="submit" class="submit" name="submit" value="Trimite"><br>
</form>
<p class="telefon" > 0732238738</p><br>
<p class="adresa" > Str. Bucovinei nr.46.</p><br>
<p class="formular" >Lasati-ne un mesaj </p><br>
<img src="te.png" class="tel">
<img src="locatie.png" class="adr">


    </body>
</html>