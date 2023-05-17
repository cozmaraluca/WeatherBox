<?php
$date1 = "2020-12-21";
$date2 = date("Y-m-d");

$diff = abs(strtotime($date2) - strtotime($date1));

$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$monthyear = date("Y-m"); 
$start = "2020-12";
if ($start <= $monthyear )
$months=12-$months

//printf(" %d months, %d days\n", $years, $months, $days);

?>
<html>
<head>
    
<title>Form submission</title>
<style>
body {
	
 background-image: url("ninsoare.gif");
/*	background-repeat: no-repeat;*/
  height: 100%;
	background-size: cover;
	margin:0;
	

}

.text{
    top:100px;
    left:150px;
    font-size:100px;
    font-weight:bold;
    position:absolute;
    color:black;
}

ul {
  list-style-type: none;
  margin: 0 px;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #f3f3f3;
  position:sticky;
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
    
    <div style = " background-color: rgba(248, 247, 216, 0.7);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;">
      </div>
	<ul>
  <li><a href="http://vremeata.ro/WeatherBox.php">Acasă</a></li>
  <li><a href="http://vremeata.ro/fenomene.php">Curiozități</a></li>
  <li><a class="login" href="http://vremeata.ro/login.php">Log in</a></li>
  <li><a class="signup" href="http://vremeata.ro/signup.php">Sign up</a></li>
  <li><img src="logo.png" class="logo_bar"></li>
   <li><a href="http://vremeata.ro/contact.php">Contact</a></li>
</ul>
<?php if($months==1)
echo "<p class='text'>Mai este $months luna pana la solstitiul de iarna</p>";
if($months==0)
echo "<p class='text'>Luna aceasta va avea loc solstitiul de iarna</p>";
 else 
echo "<p class='text'>Mai sunt $months luni pana la solstitiul de iarna</p>"; ?>


</body>
</html> 