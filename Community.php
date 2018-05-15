<?php 
session_start();

date_default_timezone_set("Europe/London");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$userInput = $_POST["content"];
$nextLine = "
";
$DateTime = date("d.m.Y h:i");
$content = $userInput . $nextLine . $DateTime . $nextLine . $nextLine;

$userContent = fopen("usercontent.txt", "a");
fwrite($userContent, $content);
fclose($userContent);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Community</title>
<style type="text/css">

#Layout{
	background-color: #232323;
	text-transform: none;
	text-decoration: none;
	width:1200px;
	position:relative;
	margin-left:auto;
	margin-right:auto;
}

ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;	
}

li {
    float: left;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	background-color: #232323;	
}

li a:hover:not(.active) {
	text-decoration:underline;
}

.active {
	  color: white;
	  font-weight: bold;
	  font-family: "Arial Nova Light";
	  background-color:#FF3300;
  }
  
.NavBar{
	background-color: #232323;
	clear: both;
	height: auto;
	width: auto;
	float: none;
	border-bottom:thin;
	border-bottom-color:black;
	border-bottom-style:ridge;
}

h3{
	color:white;
	font-size:small;
	text-align:left;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:lighter;
}

</style>
</head>

<body id="Layout">
	<ul class="NavBar">
		<li><a href="Home.html"><img style="height:128px; width:128px; background-color:aqua" src="Logo.png" alt="Logo"/></a></li>
		<li style="	border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a href="Home.html">Home</a></li>
		<li style="	border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a href="Games.html">Games</a></li>
	    <li style="	border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a href="Media.html">Media</a></li>
	    <li style="	border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a class="active" href="Community.php">Community</a></li>
	    <li style="	border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a href="About.html">About</a></li>
	    <li style="float:right; border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a href="Settings.html">Settings</a></li>
	    <li style="float:right; border-bottom: thin; border-bottom: solid; border-bottom-color: #FF3300;"><a href="Login.html"><b>Login</b></a></li>
	</ul>
	
	<div style="padding-top:64px">
    <?php
        $diplayTextFile = fopen("usercontent.txt", "r") or die("Unable to Open File!");
        while(!feof($diplayTextFile))
        {
        echo fgets($diplayTextFile) . "<br>";
        }
        fclose($diplayTextFile);
    ?>
    
        <form method="post" action="" name="loginform">
        <input type="text" value="" placeholder="User Content" id="content" name="content" />
        <button type="submit">Submit</button>
        </form>
	</div>
    

</body>

</html>
