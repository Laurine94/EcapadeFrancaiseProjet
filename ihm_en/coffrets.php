<?php include 'connexion.php';?>

<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Escapade Française is a large array of guest houses, activities and private guided all over France. Our activities are shoping, skydiving, trekking, sightseeing tour and more all around France ">

        <meta name="keyword" content="paris stay, stay in paris,where to stay in paris,where to stay in paris with family, where to stay in paris as a tourist, where to stay in france as a tourist, best area to stay in paris as a tourists,best area of paris to stay for tourist,best area in paris to stay as tourist, best area in france to stay as a tourist,best place to stay in paris for tourist,best tourist area to stay in paris, best tourist area to stay in france, paris best area to stay tourist, paris tour guide, france tour guide, french riviera tour guide, tour guide paris, tour guide france, paris guided tours,guided tours paris,tour in paris,guided tours in paris,guided tours in France, guided tours of Paris, city tour Paris,city tour of Paris,city tour in paris,guided tours to paris, guided paris tours, tour guides in Paris, paris city tour itinerary, hotel all inclusive,all inclusive vacances, hotel all exclusive,all in exclusive, paris stay, france stay, french riviera stay, stay in paris, stay in france, where to stay paris, where to stay france, where to stay in paris,where to stay in paris with family,where to stay in paris as a tourist,best place to stay in paris for tourist, best place to stay in france for tourist, paris best area to stay tourist, paris tour guide, tour guide France,book amazing guesthouses, book amazing activities, book amazing private guides,Strasbourg stay, where to Stay in Strasbourg, Bordeaux Stay, where to stay in Bordeaux as a tourist, normandy stay, French Brittany stay, best area to stay in French Riviera as a tourist, Corse Stay, French Polynesia stay, bora bora stay, Courchevel stay, Annecy Stay, Winter holidays in France, christmas market strasbourg, Paris, Strasbourg,Lyon,normandy,bretagne,Brittany,Corse,haute-savoie, Annecy, Courchevel, Mont Blanc, marseille, Martinique, Saint barthelemy, St-barth, French Polynesia, Polynesie francaise, bora bora, bordeaux,ile de la reunion, Reunion island, France, paris hotels, hotels in paris, hotels strasbourg, hotels bordeaux, guest houses paris, paris guest houses, france guest houses, guest houses in france, hotel in paris, guest house in paris, bed and breakfast, b&b, escapade francaise, escapade française,   ">

        
        <!--css link-->
        <link rel="stylesheet" type="text/css" href="css/coffrets_collection.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>


        <!--script for form-->
       <script> 
          $(document).ready(function(){
              $("input").focus(function(){
              $(this).css("background-color", "#CDD128");
          });

              $("input").blur(function(){
              $(this).css("background-color", "#CDD128");
          });
        });

      </script>
      <!-- end script-->

     
    </head>
    <!-- end heade part-->
<body style="font-family:'Montserrat', sans-serif;">
	<!-- add navigation boar-->
	<?php include 'coffrets_navbar.php'; ?>

<div id="circle" style="position:fixed;">
  <i class="icon1 fa fa-cog fa-lg"></i>
  <i class="icon2 fa fa-cog fa-lg"></i>
</div>
<div id="sub" style="position:fixed;">
  <div id="circle">
    <i class="icon1 fa fa-home fa-lg"></i>
    <i class="icon2 fa fa-home fa-lg"></i>
    <a href="coffrets.php">HOME</a>
  </div>
  <div id="circle">
    <i class="icon1 fa fa-shopping-cart fa-lg" style="font-size:17px;"></i>
    <i class="icon2 fa fa-shopping-cart fa-lg" style="font-size:17px;"></i>
    <a href="coffrets.php #shop">SHOP</a>
  </div>
  <div id="circle">
    <i class="icon1 fa fa-question-circle fa-lg"></i>
    <i class="icon2 fa fa-question-circle fa-lg"></i>
    <a href="coffrets.php #about">ABOUT</a>
  </div>
  <div id="circle">
    <i class="icon1 fa fa-envelope fa-lg" style="font-size:15px;"></i>
    <i class="icon2 fa fa-envelope fa-lg" style="font-size:15px;"></i>
    <a href="coffrets.php #contact">CONTACT US</a>
  </div>
</div>

<style>
#circle {
    width: 51px;
    height: 51px;
    border-radius: 50%;
    background: #E40404;
    position: absolute;
    z-index:2;
    top: 75px;
    left: 5px;
    box-shadow: 0 0 4px rgba(0, 0, 0, .11), 0 4px 8px rgba(0, 0, 0, .22);
    cursor: pointer;
}
#circle:after {
    content:'';
    width: 10px;
    height: 10px;
    position: absolute;
    border-radius: 50%;
    background: #E40404;
    left: 35px;
    top: 35px;
}
#circle i {
    font-size: 25px;
    color: #fff;
    position: absolute;
    top: 16px;
    left: 15px;
    z-index: 1;
}
#circle i.icon1 {
    opacity: 1;
}
#circle i.icon2 {
    opacity: 0;
    top: 22px;
    left: 15px;
}
/* ANIMATION */
#circle, #circle i, #circle:after {
    -webkit-transition: all .2s cubic-bezier(.4, 0, .2, 1);
    transition: all .2s cubic-bezier(.4, 0, .2, 1);
}
/* HOVER */
#circle:hover {
    background: #E40404;
    box-shadow: 0 0 4px rgba(0, 0, 0, .15), 0 4px 8px rgba(0, 0, 0, .30);
}
#circle:hover:after {
    width: 50px;
    height: 50px;
    left: 0;
    top: 0;
}
#circle:hover > i {
    -webkit-transform: rotate(720deg);
    transform: rotate(720deg);
}
#circle:hover > i.icon1 {
    opacity: 0;
}
#circle:hover > i.icon2 {
    opacity: 1;
}

/* ///// SUB CIRCLES ///// */
 #sub {
  width: 100px;
  height: 50%;
  z-index: 1;
  position: absolute;
  visibility:hidden;
}
#sub #circle {
    width: 35px;
    height: 35px;
    top: 0;
    left: 11px;
    opacity: 0;
    transition: 0.2s opacity;
}
#sub #circle:nth-child(1) {
    top: -50px;
    background: #E40404;
}
#sub #circle:nth-child(2) {
    top: -10px;
    background: #E40404;
}
#sub #circle:nth-child(3) {
    top: 30px;
    background: #E40404;
}
#sub #circle:nth-child(4) {
    top: 70px;
    background: #E40404;
}
#sub #circle:nth-child(1):after {
    background: #E40404;
}
#sub #circle:nth-child(2):after {
    background: #E40404;
}
#sub #circle:nth-child(3):after {
    background: #E40404;
}
#sub #circle:nth-child(4):after {
    background: #E40404;
}
#sub #circle:after {
    left: 20px;
    top: 20px;
}
#sub #circle i {
    font-size: 20px;
    top: 10px;
    left: 9px;
}
#sub #circle i.icon1 {
    opacity: 1;
}
#sub #circle i.icon2 {
    opacity: 0;
}
/* HOVER */
#sub #circle:hover:after {
    width: 35px;
    height: 35px;
    left: 0;
    top: 0;
}
#circle:hover + #sub #circle:nth-child(1) {
    opacity:1;
    transition-delay:0.05s;
}
#circle:hover + #sub #circle:nth-child(2) {
    opacity:1;
    transition-delay:0.1s;
}
#circle:hover + #sub #circle:nth-child(3) {
    opacity:1;
    transition-delay:0.15s;
}
#circle:hover + #sub #circle:nth-child(4) {
    opacity:1;
    transition-delay:0.15s;
}
#sub #circle:hover > i {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}
#sub #circle:hover > i.icon1 {
    opacity: 0;
}
#sub #circle:hover > i.icon2 {
    opacity: 1;
}
#circle:hover + #sub {
visibility:visible;
}
#sub:hover {
visibility:visible;
}
#sub:hover > #circle {
    opacity:1;
}
/* ///// SUB TITLES ///// */
#circle a {
  display: block;
  margin-right: -200px;
  margin-top: 16px;
  color: black;
  font-family: 'Montserrat', sans-serif;
  font-weight:bold;
  text-transform: uppercase;
  text-align: left;
  padding-left: 60px;
  letter-spacing: 0.25em;
  opacity: 0;
  -webkit-transition: all .4s cubic-bezier(.4, 0, .2, 2);
  transition: all .4s cubic-bezier(.4, 0, .2, 2);
  font-size:10pt;
}
/* HOVER */
#sub #circle:hover > a {
    opacity: 1;
    padding-left: 40px;
}
</style>

 <div class="case1 background">
        <div class="carre1">
        	<div class="border">
        		<h1 style="color: #183e67;">The collection <br>of Escapade <br>Coffrets</h1>
          		<h3 style="color: #183e67;">HAND MADE - MADE WITH LOVE</h3>
        	</div>
        </div>
  </div>
  <!--case02-->
  <div class="case2" id=shop name=shop>
  		<div class="parti">
      <br>
  			<h1 style="color: #183e67;">The collection by Lisa Bouillon</h1>
        <br>
        <br>
        <br>
  				<div class="container">
  					<div class="row">
              <?php $coffret = $DB->query('SELECT * FROM coffret'); ?>
              <?php foreach ($coffret as $coffret): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="view">
                    <a href="coffrets_<?= $coffret->id; ?>.php"><img src="img/cadeaux/<?= $coffret->id; ?>.jpg" class="img-thumbnail" width="400px" height=" 250px">
                    <div class="middle">
                      <button class="text"><a href="coffrets_<?= $coffret->id; ?>.php">SEE THIS BOX</a></button>
                    </div>
                    <div class="description">
                      <p><?= $coffret->nom_coffret; ?></p>
                      <p class="price" style="color:#183e67; text-align:center; font-family:'Montserrat', sans-serif;"><?= number_format($coffret->prix,2,',',''); ?> €</p>
                    </div>
                    <div id="button1" style="background-color:#183e67; height:25px;">
                      <a class="add addPanier" href="addpanier.php?id=<?= $coffret->id; ?>">
                      <p style="margin-top:-2%; color:white;">ADD TO CART</p></a>
                    </div>  
                    <br>
                    <br>     
                    <br>  
                    <br>           
                  </div>
                </div>
              <?php endforeach ?>
  				</div>
  			</div>

        
  		<!--end case 02-->
      <!--Création menu vertical-->
      <!--<nav class="style-ih1tlgxx" id="comp-igqd3whf" style="top: -208px; bottom: 0px; right: 5px; position: fixed; margin: auto; z-index: 50; width: 123px; height: 84px; font-family:'Montserrat', sans-serif; font-size:9pt;">
        <ul class="style-ih1tlgxx_orientation-right style-ih1tlgxx_text-align-right style-ih1tlgxxmenuContainer" id="comp-igqd3whfmenuContainer">
          <li class="style-ih1tlgxx_item">
            <a class="style-ih1tlgxx_link" aria-labelledby="anchor-label_1" href="#" target="_self" data-keep-roots="true" data-anchor="SCROLL_TO_TOP">
              <svg width="12" height="12" viewBox="0 0 24 24" class="style-ih1tlgxx_symbol" style="cursor:pointer; fill:transparent; stroke:#E40404;">
                <circle cx="12" cy="12" r="10"></circle>
              </svg>
              <span class="style-ih1tlgxx_text-wrapper">
                <span id="anchor-label_1" class="style-ih1tlgxx_label" style="color:#E40404;">HOME</span>
              </span>
            </a>
          </li>
          <li class="style-ih1tlgxx_item style-ih1tlgxx_active">
            <a class="style-ih1tlgxx_link" aria-labelledby="anchor-label_2" href="#shop" target="_self" data-keep-roots="true" data-anchor="dataItem-igqd45sx">
              <svg width="12" height="12" viewBox="0 0 24 24" class="style-ih1tlgxx_symbol" style="cursor:pointer; fill:transparent; stroke:#E40404;">
                <circle cx="12" cy="12" r="10"></circle>
              </svg>
              <span class="style-ih1tlgxx_text-wrapper">
                <span id="anchor-label_2" class="style-ih1tlgxx_label" style="color:#E40404;">SHOP</span>
              </span>
            </a>
          </li>
          <li class="style-ih1tlgxx_item">
            <a class="style-ih1tlgxx_link" aria-labelledby="anchor-label_3" href="#about" target="_self" data-keep-roots="true" data-anchor="dataItem-igqd85721">
              <svg width="12" height="12" viewBox="0 0 24 24" class="style-ih1tlgxx_symbol" style="cursor:pointer; fill:transparent; stroke:#E40404;">
                <circle cx="12" cy="12" r="10"></circle>
              </svg>
              <span class="style-ih1tlgxx_text-wrapper">
                <span id="anchor-label_3" class="style-ih1tlgxx_label" style="color:#E40404;">ABOUT</span>
              </span>
            </a>
          </li>
          <li class="style-ih1tlgxx_item">
            <a class="style-ih1tlgxx_link" aria-labelledby="anchor-label_4" href="#contact" target="_self" data-keep-roots="true" data-anchor="dataItem-igqd8xa9">
              <svg width="12" height="12" viewBox="0 0 24 24" class="style-ih1tlgxx_symbol" style="cursor:pointer; fill:transparent; stroke:#E40404;">
                <circle cx="12" cy="12" r="10"></circle>
              </svg>
              <span class="style-ih1tlgxx_text-wrapper">
                <span id="anchor-label_4" class="style-ih1tlgxx_label" style="color:#E40404;">CONTACT US</span>
              </span>
            </a>
          </li>
        </ul>
      </nav>-->

      <!--Fin du menu vertical-->

  		<div class="case3" id="about" name="about">
  			<div class="parti02">
  				<!-- paragraphe-->
  				<div class="container">
  					<div class="row">
  						<div class="col-md-12 col-sm-12 col-xs-12">
                <br>
   						 	<h1>ABOUT</h1>
   						 	<br>
   						 	<p style="text-align: center;">Fantastic, joyful, friendly and full of unforgettable surprises. Our first edition of Escapade Coffret will make you discover among the best tastes and flavors of the French home produce. From the design of the box to its contents, our Coffrets in limited edition were all worked individually. To offer or for oneself, Escapade Coffrets contain an incredible panel of memories to remember, or create in your next French Escapade.</p>

  						</div>
  					</div>
  				</div>

   			 	<!--icon task-->
     			 <!--<div class="container">
     			 	<div class="row">
     			 	 	<div class="line">
              <nav>
                <ul>
                  <li><img src="img/cotton.jpg" width="90px" height="90px">
                    <img src="img/icon6.jpg" width="70px" height="70px" alt="coffret">
                    <img src="img/icon7.jpg" width="110px" height="110px" alt="coffret">
                    <img src="img/icon4.jpg" width="75px" height="75px" alt="coffret">
                  </li>
                </ul>
              </nav>	
     			 	 	</div>	  
     			 	 </div>
     			 </div>-->
     			 <!--end icon task-->				 	 	  				
  			</div>		
  		</div>

  <!--end case03-->
  <div class="case4">
  <!-- for second image here-->
  </div>
  <!-- end case 04 -->
  <div>
    
  </div>
<!--case 05-->
 <div class="container">
   <div class="row">
     <div class="col-md-3">
       
     </div>
     <div class="col-md-6">
       <div class="case5" id="contact" name="contact">
         <div class="parti2">
          <form method="post" action="contact_recup.php">
           <h1>Contact</h1>
           <p>For special requests and orders</p>
           <br> 
           <form>
            <p style="text-align:left; font-size:10pt;">Name :</p>
               <div class="form-group">
                     <input type="text" class="form-control" id="name" name="nom" placeholder="Write your first name and your last name" style="border:2px solid #7C7A00;">
               </div>
            <p style="text-align:left; font-size:10pt;">Email :</p>
              <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Write your email address" style="border:2px solid #7C7A00;">
              </div>
            <p style="text-align:left; font-size:10pt;">Subject : </p>
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="objet" placeholder="What is the purpose of your request?" style="border:2px solid #7C7A00;">
              </div>
            <p style="text-align:left; font-size:10pt;">Message : </p>
              <div class="form-group">
                <textarea type="text" class="form-control" id="message" name="message" row="10" cols="50" placeholder="Write the message" style="border:2px solid #7C7A00; height:120px;"></textarea>
              </div>
              <button type="submit" class="btn btn-default" style="border:2px solid #7C7A00; color: white; background-color: #7C7A00;">Submit</button>
          </form>       
         </div>
       </div>
     </div>

     <div class="col-md-3">
       
     </div>
   </div>
 </div>

<!--end case5-->
 <!--<div class="case5">
  		<div class="parti2">
              <h1>Contact</h1>
            <p>For special requests and orders</p>
              <br>
            <fieldset>
              <form method="POST" action="coffrets_contact.php">

                <label>
                  <input type="text" class="form-control" name="name" placeholder="Name:" style="border:3px solid #7C7A00; width: 500px; height: 38px; padding: 15px;">
                </label>
                <br>

              <label>
                <input type="text" class="form-control" name="email" placeholder="Email: " style="border:3px solid #7C7A00; width: 500px; height: 38px; padding: 15px;">
              </label>
              <br>

               <label>
                  <input type="text" class="form-control" class="form-control" name="subject" placeholder="Subject:" style="border:3px solid #7C7A00; width: 500px; height: 38px; padding: 15px;">
              </label>
              <br>

               <label>
                  <textarea  name="message" class="form-control" placeholder="Message:" style="border:3px solid #7C7A00; width: 500px; height: 100px; padding: 15px;"></textarea>
              </label>
              <br>
              <button class="btn success" style="background-color: #7C7A00;">send</button>
              
            </form>  
          </fieldset>
      </div>
  </div>
  <br>
  <br>
  <br>-->
<!-- form-->
   </div>
</div>
<!--end case5-->
<div class="case6">
<!--		<?php /*include 'footer.php'*/; ?>-->
<!-- footer new one-->

    <!--<style>
    body{
        margin: 0;
        padding: 0;
        min-height: 100%;
    }
    
    footer{
        background-color: #183e67;
        position:relative;
        bottom:0;
        width:100%;
        height:151px;
        padding-top:10px;
        padding-bottom:10px;
        text-align: center;
        font-size: 15px;
        font-family: 'Montserrat', sans-serif;
    }
    
    .footer3{
        width: 33%;
        display: inline-block;
        color: white;
    }
    
    .droite p{
        padding: 0 10px 0px;
        float: right;
        margin: 0;
    }
    
    .form{
        text-align: center;
        margin: 0;
        padding: 0;
        top: 10px;
        position: absolute;
        width: 33%;
    }
    
    .form input[type=text]{
        width: 75%;
        padding: 5px;
        border: none;
        outline: none;
    }
    
    .form input[type=submit]{
        width: 20%;
        padding: 5px;
        background-color:white;
        color: #183e67;
        border: none;
        font-weight: bold;
        border-radius: 0px;
        cursor: pointer;
    }
    
    .partenaires{
        position: absolute;
        bottom: 5px;
        left: 43%;
        margin: 0 auto;
        text-align: center;
    }
        
    .social_media img{
        width: auto;
        height: 40px;
    }
    
    .social_media{
        padding-right: 10px;
        padding-top: 0;
        margin-top: 0;
    }
    
    .liens{
        float: left;
        top: 10px;
        position: absolute;
    }
    
    .sous_div_footer{
        text-align: center;
    }
    
</style>-->

<br />
<br />
<br />
 
</div>

<div class="case6">
 <?php include 'footer.php'; ?>
</div>

</body>
</html>









