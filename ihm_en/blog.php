<html>
    <head>
        <meta charset="UTF-8">
        <!--<link href="css/index.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="css/blo.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>

        <script src="http://malsup.github.com/jquery.cycle2.js"></script>
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>

    </head>
<!-- end heade part-->
    <body class="animsition">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>     
         <div id="global">
            <div id="entete">
                <div id="navbar">
                    <div id="logo">
                        <a href="index.php"><img class="img_logo_1" src="img/logos/logo_v2.png" alt="logo_ef"></a>
                        <a href="../ihm/" id="language-ch"><img src="../lng/fr.png" alt="english"> French</a>
                    </div>
                        <ul id="nav">
                            <li><a href="guesthouse.php">CHOOSE YOUR GUEST HOUSE  </a></li>
                            <li><a href="select_activities.php"> CHOOSE YOUR ACTIVITIES </a></li>
                            <li><a href="guide_plus.php">OUR LOCAL GUIDES </a></li>
                            <li><a href="onglets.php">OUR HISTORY & OUR VALUES</a></li>
                        </ul>
                </div>
            </div>
        </div>
             
        <div class="intro-header">
            <div class="video-bg">
            <object class="embed-responsive-item">
                <video autoplay muted loop style="width:100%;">
                    <source src="video/ship.mp4" type="video/mp4">
                </video>
            </object>
            <div class="repertoire">
                    <h1><b>The Escapade of the Month</b></h1>
                    <b> Every month we celebrate a region to visit based on events,</br> festivals and seasonal summer times. </b>
            </div>
           </div>            
        </div>
        <div class="container">
            <div class="row">
                <div class="case1"><!-- case 1 start-->
                        <h2>The French Riviera</h2>
                        <p>july 5 2016 | Heloise Melen</p>
                    <figure>
                        <img src="img/mm.jpg" width="900px" height="600px" class="img-responsive" class="img-thumbnail" alt="La Côte d'Azur">
                    </figure>
                        <br>
                        <p>In September, choose the French Riviera. <br>As the school holidays are over, the month of September is the perfect time to discover the French Riviera in all its authenticity. The beaches are empty, and the area literally turns into a small ...
                        </p>
                        <br>
                        <a href="post1.php"><button type="button" class="btn btn-danger"> Read More</button></a>
                        <!--second image-->
                        <h2>Normandy and Brittany</h2>
                        <p>july 5; 2017 | Heloise Melen</p>
                    <figure>
                        <img src="img/mm1.jpg" width="900px" height="600px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagre">
                    </figure>
                        <br>
                         <p>Summer is a season when France is full of tourists, so we advise you to avoid the French Riviera and the Paris region, where the heat can be difficult to bear.<br>Escapade Française offers you the possibility of going to recharge your batteries in Normandy ...
                        </p>
                        <br>
                         <a href="post2.php"><button type="button" class="btn btn-danger"> Read More</button></a>
                         <br>
                        <br>
                 </div>
            </div>
        </div><!-- case 1 end-->

        <div class="case2"><!-- case 2 stat -->
            <div class="col-md-3">
                <br>
                   <figure>
                       <a href="http://facebook.com"> <img src="img/face5.jpg"></a>
                        <p style="color: white;">facebook</p>
                   </figure>      
                <br>
            </div>

            <div class="col-md-3">
                <br>
                     <figure>
                        <a href="http://intergram.com"> <img src="img/face2.jpg"></a>
                    </figure>
                        <p style="color: white;">Instagram</p>
                <br>
            </div>

            <div class="col-md-3">
                <br>
                     <figure>
                        <a href="http://www.Printrest.com"> <img src="img/face3.jpg"></a>
                    </figure> 
                         <p style="color: white;">Pinterest</p> 
                <br> 
            </div>

            <div class="col-md-3">
                <br>
                    <figure>
                        <a href="http://www.twitter.com">  <img src="img/face4.jpg"></a>
                    </figure>  
                        <p style="color: white;">Twitter</p>
                <br>
            </div> 
    </div> <!--end case2-->

    <!--start case3-->
    <div class="case3slideshow cycle-slideshow"   data-cycle-speed="50" data-cycle-caption="#custom-caption"
    data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}">
        
            <img src="img/e.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/a.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/g.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/n.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/m.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/musique.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/bo.jpg" width="auto" height="400px;" alt="L'Escapade du mois">
            <img src="img/d.jpg" width="auto" height="400px;" class="fill img-responsive">       
            <img src="img/carsol.jpg" width="auto" height="400px;" class="fill img-responsive" alt="L'Escapade du mois">   

    </div> <!--end case3 slidshow-->

 <!-- start footer-->
     <?php include 'footer.php'; ?>
 </body>
</html>










