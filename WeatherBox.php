<?php
if(isset($_POST['primavara'])){
 header('Location:primavara.php'); 
}
if(isset($_POST['vara'])){
 header('Location:vara.php'); 
}
if(isset($_POST['toamna'])){
 header('Location:toamna.php'); 
}
if(isset($_POST['iarna'])){
 header('Location:iarna.php'); 
}
?>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        

    <style>

        
body {
	
 /*background-image: url("inserat.gif");
	background-repeat: no-repeat;*/
  height: 100%;
	background-size: cover;
	margin:0;
	

}
	
/*		.afisare_date3{
		height: 50px;
    width: 30%;
		position: absolute;
   bottom: 200px;
		left:500px;
	font: 900;
			font-size: 28;
		background-color:indianred;
		border-color:black;
	
		}	
	.layer {
    background-color: rgba(248, 247, 216, 0.7);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}*/



/*h1 {
  color: white;
  text-align: center;
}*/

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

.primavara{
    top:52px;
    left:0px;
    position:absolute;
    width:50%;
     height:380px;
     background-image: url("primavara.gif");
     background-size: cover;
}

.vara{
    top:52px;
    right:0px;
    position:absolute;
    width:50%;
    height:380px;
    background-image: url("soare.gif");
     background-size: cover;
}
.toamna{
    top:432px;
    left:0px;
    position:absolute;
    width:50%;
    height:380px;
    background-image: url("toamna.gif");
     background-size: cover;
}

.iarna{
    top:432px;
    right:0px;
    position:absolute;
    width:50%;
    height:380px;
    background-image: url("ninsoare.gif");
     background-size: cover;
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
  <li><a href="http://vremeata.ro/fenomene.php">Curiozități</a></li>
  <li><a class="login" href="http://vremeata.ro/login.php">Log in</a></li>
  <li><a class="signup" href="http://vremeata.ro/signup.php">Sign up</a></li>
  <li><img src="logo.png" class="logo_bar"></li>
   <li><a href="http://vremeata.ro/contact.php">Contact</a></li>
</ul>
        
       <form action="http://vremeata.ro/afisarenou.php">
            <input class="afisare_date3" type="submit" value="Toate inregistrarile"/>
            <br />
        </form>
        <form action="" method="post">
        <input type="submit"  class="primavara" name="primavara" value=""/>
        <input type="submit"  class="vara" name="vara" value=""/>
        <input type="submit"  class="toamna" name="toamna" value=""/>
       <input type="submit"  class="iarna" name="iarna" value=""/>
         </form>
        
    </body>
</html>