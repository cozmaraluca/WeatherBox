
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        

    <style>

        
body {
	
	margin:0;
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
    .intrebare{
        left:170px;
   top:250px;
   font-weight:bold;
    position:absolute;
    }
    .op1{
         left:740px;
   top:220px;
    position:absolute;
    }
        .l1{
         left:770px;
   top:220px;
   font-weight:bold;
    position:absolute;
    }
     .op2{
         left:740px;
   top:260px;
    position:absolute;
    }
        .l2{
         left:770px;
   top:260px;
   font-weight:bold;
    position:absolute;
    }
      .op3{
         left:740px;
   top:300px;
    position:absolute;
    }
        .l3{
         left:770px;
   top:300px;
   font-weight:bold;
    position:absolute;
    }
     .op4{
         left:740px;
   top:340px;
    position:absolute;
    }
        .l4{
         left:770px;
   top:340px;
   font-weight:bold;
    position:absolute;
    }
    .submit{
    height: 50px;
    width: 10%;
		position: absolute;
   bottom: 100px;
		left:750px;
	font: 900;
			font-size: 28;
		background-color:white;
		border-color:black;
}
.corect{
    left:30px;
   bottom:10px;
   font-weight:bold;
    position:absolute;
}
.fulg{
    left:1000px;
   top:150px;
   font-weight:bold;
   font-size:50px;
    position:absolute;
}
.vulc{
    left:150px;
   bottom:100px;
   right:20px;
    position:absolute;
    height:450px;
}
.incorect{
      left:1000px;
  top:200px;
   font-weight:bold;
    position:absolute;
    color:red;
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
  <li><img src="logo.png" class="logo_bar"></li>
   <li><a href="http://vremeata.ro/contact.php">Contact</a></li>

     <form action="" method="post"> 
</ul>
<p class="intrebare">Cea mai mare temperatură din toate timpurile: 56,7°C, a fost înregistrată în: </p>
   <input type="radio"  name="ans" value="sua" class="op1">
<label for="sua" class="l1">S.U.A.</label><br>
 <input type="radio"  name="ans" value="africa" class="op2">
<label for="africa" class="l2">Africa de Sud</label><br>

<input type="radio"  name="ans" value="aus" class="op3">
<label for="aus" class="l3">Australia</label><br>
 <input type="radio"  name="ans" value="tun" class="op4">
<label for="tun" class="l4">Tunisia</label><br>
<input type="submit" class="submit" name="submit" value="OK">
</form>
<?php


 if(isset($_POST['submit'])) {
        if(!empty($_POST['ans']))
            $ans = $_POST['ans'];
    }

    if($ans=="sua")
   {   echo "<p class='corect'>Norul de cenușă și de gaze eliberat în timpul erupțiilor vulcanice are o încărcătură electrostatică uriașă. Din această cauză, în anumite cazuri (destul de rare), acest fenomen poate genera furtuni electrice violente.</p>";
      echo "<img class='vulc' src='vulc.jpg'>";
      echo "<p class='fulg'>Fulgere vulcanice</p>";}
       if($ans=="africa" || $ans=="aus" || $ans=="tun")
      echo "<p class='incorect'>Incorect</p>";

?>
      

</body>
</html> 

