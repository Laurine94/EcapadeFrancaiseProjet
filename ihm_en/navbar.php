<?php $activities_work =0; ?>
<style>  
#nav {
    list-style-type: none;
    margin: 0 auto;
    text-align: center;
    padding: 0;
    white-space: nowrap;
    overflow-y : auto;
    border: 1px solid #e7e7e7;
    background-color: #183e67;
    font-family: "Open Sans", sans-serif;
    font-size: 16px;
}

#nav li {
    display: inline;
}

#nav li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 17px 30px;
    text-decoration: none;
}

#nav li a:hover:not(.active) {
    background-color: #697f9c;
}
    
#logo{
    text-align: center;
    margin-bottom: 8px;
    margin-top: 8px;
}
    
#logo img {
max-width: 200px;
	height: auto;
}
    
body{
    margin: 0;
    padding: 0;
}
    
body p, body input[type=button]{
    /*font-family: 'Verdana, sans-serif;*/
    /*font-family: 'Pacifico', cursive;*/
    /*font-family: 'Slabo 27px', serif;*/
    /*font-family: 'Open Sans', sans-serif;*/
    /*font-family: 'Lobster', cursive;*/
    /*font-family: 'Carter One', cursive;*/
    /*font-family: 'Racing Sans One', cursive;*/
    font-family: 'Montserrat', sans-serif;
    /*font-family: 'Ubuntu', sans-serif;*/
    /*font-family: 'Roboto', sans-serif;*/
}

#language-ch {
	position: absolute;
	z-index: 9999999999;
	top: 10px;
	right: 20px;
	color: #183E67;
	text-decoration: none;
	font: normal 16px/16px 'Arial', serif;
}

#language-ch img {
	position: relative;
	max-width: none;
	max-height: 15px;
	top: -2px;
}

</style>

<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<div id="navbar">
<div id="logo">
    <a href="index.php"><img class="img_logo_1" src="img/logos/logo_basic.png" alt="logo_ef"></a>
    <a href="../ihm_fr/" id="language-ch"><img src="../lng/fr.png" alt="english"> Français</a>
</div>

<ul id="nav">
    <li><a href="genre.php">CHOOSE YOUR GUEST HOUSE  </a></li>
    <li><a href="genrebis.php"> CHOOSE YOUR ACTIVITIES </a></li>
    <li><a href="guide_plus.php">OUR LOCAL GUIDES </a></li>
    <li><a href="onglets.php">OUR HISTORY & OUR VALUES</a></li>
    <li><a href="EspaceClient/indexClient.php">MY ACCOUNT</a></li>
</ul>
</div>