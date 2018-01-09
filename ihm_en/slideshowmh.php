<!DOCTYPE html>
<html>
    <head>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">-->
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
        <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>-->
        <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/animate.min.css'>
        <link rel="stylesheet" href="css/slideshowmh.css">

    </head>

    <body>

      <?php include 'connexion.php';

      // Si tout va bien, on peut continuer
      //On récupère la valeur de la maison d'hote sélectionnée
      $nom_mh = $_GET['nom_mh'];

      // On récupère tout le contenu de la table chambre en prenant en compte la ville choisie
      $reponse = $bdd->query("SELECT * FROM chambre WHERE nom_chambre='$nom_chambre'");
      ?>


      <div>

        <div id="carousel-example-generic" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
            <li data-target="#carousel-example-generic" data-slide-to="6"></li>

          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

              
              
            <!-- First slide -->
            <div class="item active ef0" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_0.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->


             <!-- First slide -->
            <div class="item active ef1" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_1.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->


             <!-- First slide -->
            <div class="item active ef02" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_2.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->



             <!-- First slide -->
            <div class="item active ef3" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_3.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->


             <!-- First slide -->
            <div class="item active ef4" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_4.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->


             <!-- First slide -->
            <div class="item active ef5" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_5.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->


             <!-- First slide -->
            <div class="item active ef6" style="background-image: url(<?php echo 'img/guesthouses/'.$nom_mh.'/'.$nom_chambre.'_6.jpg';?>);">
                <div class="carousel-caption">
                </div>
            </div> <!-- /.item -->
              
              


              
          </div><!-- /.carousel-inner -->

          <!-- Controls -->
          <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>-->
        </div><!-- /.carousel -->

    </div><!-- /.container -->
        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
    <script src="js/slideshow.js"></script>

    </body>
</html>