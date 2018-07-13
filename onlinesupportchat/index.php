<?
session_start();

if(isset($_GET['logout'])){

	//Simple exit message
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
	fclose($fp);

	session_destroy();
	header("Location: index.php"); //Redirect the user
}

function loginForm(){
	echo'
	<div id="loginform">
	<form action="index.php" method="post">
		<p>Please enter a name to continue:</p>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" />
		<input type="submit" name="enter" id="enter" value="Enter" />
	</form>
	</div>
	';
}

if(isset($_POST['enter'])){
	if($_POST['name'] != ""){
		$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
	}
	else{
		echo '<span class="error">Please type in a name</span>';
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Google support chat</title>    <link rel="shortcut icon" type="image/png" href="Chrome_icon.png"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>.team-clean {
color:#313437;
background-color:#fff;
}

.team-clean p {
color:#7d8285;
}

.team-clean h2 {
font-weight:bold;
margin-bottom:40px;
padding-top:40px;
color:inherit;
}

@media (max-width:767px) {
.team-clean h2 {
margin-bottom:25px;
padding-top:25px;
font-size:24px;
}
}

.team-clean .intro {
font-size:16px;
max-width:500px;
margin:0 auto;
}

.team-clean .intro p {
margin-bottom:0;
}

.team-clean .people {
padding-bottom:40px;
}

.team-clean .item {
text-align:center;
padding-top:50px;
}

.team-clean .item .name {
font-weight:bold;
margin-top:28px;
margin-bottom:8px;
color:inherit;
}

.team-clean .item .title {
text-transform:uppercase;
font-weight:bold;
color:#d0d0d0;
letter-spacing:2px;
font-size:13px;
}

.team-clean .item .description {
font-size:15px;
margin-top:15px;
margin-bottom:20px;
}

.team-clean .item img {
max-width:160px;
}

.team-clean .social {
font-size:18px;
color:#a2a8ae;
}

.team-clean .social a {
color:inherit;
margin:0 10px;
display:inline-block;
opacity:0.7;
}

.team-clean .social a:hover {
opacity:1;
}

</style>
<style>.highlight-clean {
color:#313437;
background-color:#fff;
padding:50px 0;
}

.highlight-clean p {
color:#7d8285;
}

.highlight-clean h2 {
font-weight:bold;
margin-bottom:25px;
line-height:1.5;
padding-top:0;
margin-top:0;
color:inherit;
}

.highlight-clean .intro {
font-size:16px;
max-width:500px;
margin:0 auto 25px;
}

.highlight-clean .buttons {
text-align:center;
}

.highlight-clean .buttons .btn {
padding:16px 32px;
margin:6px;
border:none;
background:none;
box-shadow:none;
text-shadow:none;
opacity:0.9;
text-transform:uppercase;
font-weight:bold;
font-size:13px;
letter-spacing:0.4px;
line-height:1;
outline:none;
background-color:#ddd;
}

.highlight-clean .buttons .btn:hover {
opacity:1;
}

.highlight-clean .buttons .btn:active {
transform:translateY(1px);
}

.highlight-clean .buttons .btn-primary {
background-color:#055ada;
color:#fff;
}

</style>
<style>.header-blue {
background:linear-gradient(135deg, #21a9af, #4d60fe);
background-color:#184e8e;
padding-bottom:80px;
font-family:'Source Sans Pro', sans-serif;
}

@media (min-width:768px) {
.header-blue {
padding-bottom:120px;
}
}

.header-blue .navbar {
background:transparent;
padding-top:.75rem;
padding-bottom:.75rem;
color:#fff;
border-radius:0;
box-shadow:none;
border:none;
}

@media (min-width:768px) {
.header-blue .navbar {
padding-top:1rem;
padding-bottom:1rem;
}
}

.header-blue .navbar .navbar-brand {
font-weight:bold;
color:inherit;
}

.header-blue .navbar .navbar-brand:hover {
color:#f0f0f0;
}

.header-blue .navbar .navbar-collapse {
border-top:1px solid rgba(255,255,255,0.3);
margin-top:.5rem;
}

@media (min-width:768px) {
.header-blue .navbar .navbar-collapse {
border-color:transparent;
margin:0;
}
}

.header-blue .navbar .navbar-collapse span .login {
color:#d9d9d9;
margin-right:.5rem;
text-decoration:none;
}

.header-blue .navbar .navbar-collapse span .login:hover {
color:#fff;
}

.header-blue .navbar .navbar-toggler {
border-color:rgba(255,255,255,0.3);
}

.header-blue .navbar .navbar-toggler:hover, .header-blue .navbar-toggler:focus {
background:none;
}

.header-blue .navbar .navbar-nav a.active, .header-blue .navbar .navbar-nav > .show .dropdown-item {
background:none;
box-shadow:none;
}

@media (min-width: 768px) {
.header-blue .navbar-nav .nav-link {
padding-left:.7rem;
padding-right:.7rem;
}
}

@media (min-width: 992px) {
.header-blue .navbar-nav .nav-link {
padding-left:1.2rem;
padding-right:1.2rem;
}
}

.header-blue .navbar .navbar-nav > li > .dropdown-menu {
margin-top:-5px;
box-shadow:0 4px 8px rgba(0,0,0,.1);
background-color:#fff;
border-radius:2px;
}

.header-blue .navbar .dropdown-menu .dropdown-item:focus, .header-blue .navbar .dropdown-menu .dropdown-item {
line-height:2;
color:#37434d;
}

.header-blue .navbar .dropdown-menu .dropdown-item:focus, .header-blue .navbar .dropdown-menu .dropdown-item:hover {
background:#ebeff1;
}

.header-blue .action-button, .header-blue .action-button:not(.disabled):active {
border:1px solid rgba(255,255,255,0.7);
border-radius:40px;
color:#ebeff1;
box-shadow:none;
text-shadow:none;
padding:.3rem .8rem;
background:transparent;
transition:background-color 0.25s;
outline:none;
}

.header-blue .action-button:hover {
color:#fff;
}

.header-blue .navbar .form-inline label {
color:#d9d9d9;
}

.header-blue .navbar .form-inline .search-field {
display:inline-block;
width:80%;
background:none;
border:none;
border-bottom:1px solid transparent;
border-radius:0;
color:#ccc;
box-shadow:none;
color:inherit;
transition:border-bottom-color 0.3s;
}

.header-blue .navbar .form-inline .search-field:focus {
border-bottom:1px solid #ccc;
}

.header-blue .hero {
margin-top:20px;
text-align:center;
}

@media (min-width:768px) {
.header-blue .hero {
margin-top:60px;
text-align:left;
}
}

.header-blue .hero h1 {
color:#fff;
font-size:40px;
margin-top:0;
margin-bottom:15px;
font-weight:300;
line-height:1.4;
}

@media (min-width:992px) {
.header-blue .hero h1 {
margin-top:190px;
margin-bottom:24px;
line-height:1.2;
}
}

.header-blue .hero p {
color:rgba(255,255,255,0.8);
font-size:20px;
margin-bottom:30px;
font-weight:300;
}

.header-blue .phone-holder {
text-align:right;
}

.header-blue div.iphone-mockup {
position:relative;
max-width:300px;
margin:20px;
display:inline-block;
}

.header-blue .iphone-mockup img.device {
height: auto;
width: 520px;
margin: 0;
}



.header-blue .iphone-mockup .screen {
position:absolute;
width:88%;
height:77%;
top:12%;
border-radius:2px;
left:6%;
background-color:#aaa;
overflow:hidden;
background:url(Chrome_icon.png);
background-size:cover;
}

.header-blue .iphone-mockup .screen:before {
content:'';
background-color:#fff;
position:absolute;
width:70%;
height:140%;
top:-12%;
right:-60%;
transform:rotate(-19deg);
opacity:0.2;
}

</style>
<style>.footer-clean {
padding:50px 0;
background-color:#fff;
color:#4b4c4d;
}

.footer-clean h3 {
margin-top:0;
margin-bottom:12px;
font-weight:bold;
font-size:16px;
}

.footer-clean ul {
padding:0;
list-style:none;
line-height:1.6;
font-size:14px;
margin-bottom:0;
}

.footer-clean ul a {
color:inherit;
text-decoration:none;
opacity:0.8;
}

.footer-clean ul a:hover {
opacity:1;
}

.footer-clean .item.social {
text-align:right;
}

@media (max-width:767px) {
.footer-clean .item {
text-align:center;
padding-bottom:20px;
}
}

@media (max-width: 768px) {
.footer-clean .item.social {
text-align:center;
}
}

.footer-clean .item.social > a {
font-size:24px;
width:40px;
height:40px;
line-height:40px;
display:inline-block;
text-align:center;
border-radius:50%;
border:1px solid #ccc;
margin-left:10px;
margin-top:22px;
color:inherit;
opacity:0.75;
}

.footer-clean .item.social > a:hover {
opacity:0.9;
}

@media (max-width:991px) {
.footer-clean .item.social > a {
margin-top:40px;
}
}

@media (max-width:767px) {
.footer-clean .item.social > a {
margin-top:10px;
}
}

.footer-clean .copyright {
margin-top:14px;
margin-bottom:0;
font-size:13px;
opacity:0.6;
}

</style>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<script type="text/javascript">
function image(img) {
    var src = img.src;
    window.open(http://pwww.google.com);
}
</script>
<div>
	 <div class="header-blue">
			<nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
				 <div class="container">
						<a href="../index.html" class="navbar-brand">Chrome Support<br></a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
						<div class="collapse navbar-collapse" id="navcol-1">
							 <ul class="nav navbar-nav">
									<li role="presentation" class="nav-item"><a href="#" class="nav-link active">Home</a></li>
									<li class="dropdown">
										 <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle nav-link dropdown-toggle">Other</a>
										 <div role="menu" class="dropdown-menu"><a role="presentation" href="#" class="dropdown-item">First Item</a><a role="presentation" href="#" class="dropdown-item">Second Item</a><a role="presentation" href="#" class="dropdown-item">Third Item</a></div>
									</li>
							 </ul>
							 <form target="_self" class="form-inline mr-auto">
									<div class="form-group"><label for="search-field"></label></div>
							 </form>
							 <span class="navbar-text"> <a href="#" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="#"><strong>Chat Support</strong><br></a>
						</div>
				 </div>
			</nav>

<?php
if(!isset($_SESSION['name'])){
	loginForm();
}
else{
?>
<div id="wrapper">
	<div id="menu">
		<p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
		<p class="logout"><a id="exit" style="color:#b4b4b4;"href="#">Exit Chat</a></p>
		<div style="clear:both"></div>
	</div>
	<div id="chatbox"><?php
	if(file_exists("log.html") && filesize("log.html") > 0){
		$handle = fopen("log.html", "r");
		$contents = fread($handle, filesize("log.html"));
		fclose($handle);

		echo $contents;
	}
	?></div>

	<form name="message" action="">
		<input name="usermsg" type="text" id="usermsg" size="63" />
		<input name="submitmsg" type="submit"  maxlength="500" id="submitmsg" class="fooDiv" value="Send" />
	</form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});
		$("#usermsg").attr("value", "");
		return false;
	});

	//Load the file containing the chat log
	function loadLog(){
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}
		  	},
		});
	}
	setInterval (loadLog, 1200);	//Reload file every 1.2 seconds

	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}
	});
});
</script>
<?php
}
?>
</body>
</html>
