<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!--<link href="css/index.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="css/post2.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>
        <title>ESCAPADE FRANCAISE</title>
        
    </head>

<?php require 'navbar.php' ?>


<div class="container1" style="font-family: 'Montserrat', sans-serif;">
    <div class="row">
       <h2>Saint-Barthélémy</h2>
        <p>January 5, 2018 | OUTTIER Léonie </p>
        <br>

        <p>The tropical maritime climate of the island is between 22°C and 30°C all year round. With small temperature variations, the small surface area of the island (24km²) allows to enjoy the trade winds, these gentle and pleasant winds.
        <br>
        <br>
        <br>
        Saint-Barthélémy is located in the northern hemisphere, the same as in France, so winter and summer are the same as in mainland France.  That said, with so little difference in temperature, meteorologists rely on precipitation to define the seasons.
        <br>
        <br>
        Two seasons are therefore notable. The first is the "dry period", also known as the "Lenten period" from December to April. It is the best season to travel to St. Bartholomew's Day, and only the month of January remains the most ideal. In fact, tourists are mainly present during December and February, so you will be more peaceful after the New Year. The other, the "rainy" period from May to November, also known as the "wintering period". Then comes the cyclonic period, from late August to early October.
        <br>
        <br>
       Come and enjoy the port of Gustavia to admire the most beautiful yachts from all over the world. If you have a particular interest in architecture, you will not be disappointed by the few pretty houses of Caribbean style, in traditional wood that the port has. However, if you prefer to stroll in the sun, we strongly recommend the Grand-Cu-de-Sac. A stretch of white sand bordered by a coral reef, something to take your breath away! Of course you will be able to admire it more closely, if you are passionate about diving.
        <br>
        <br>
       Pack light clothing in your suitcases at any time of departure. Remember to wear a light sweater for the evening from December to March. For the reef, we advise you to take water shoes.
        <br>
        <br>
        </p>
        <br>
        <figure>
            <img src="img/voyage_antillais_sejour_pas_cher_sejour_derniere_minute.jpg" width="900px" height="400px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagne">
        </figure>         
    </div>    
</div>

<div class="case1">
    <div class="row">
        <!--Facebook-->
        <div id="fb-root"></div>
        <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.11&appId=139490473398600&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="fb-share-button" data-href="http://localhost/escapadefrancaisebis-master-a1d272ea9f21aac76bc0beb4361af1a62156fd63/ihm_en/post2.php" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fescapadefrancaisebis-master-a1d272ea9f21aac76bc0beb4361af1a62156fd63%2Fihm_en%2Fpost2.php&amp;src=sdkpreparse">Share</a></div>
        <!--Twitter-->
        <script>
        function(d,s,id){
            var js,fjs=d.getElementsByTagName(s)[0];
            if(!d.getElementById(id)){js=d.createElement(s);
                js.id=id;
                js.src="//platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js,fjs);}
            }(document,"script","twitter-wjs");
        </script>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <!--Linkedin-->
        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
        <script type="IN/Share" data-url="http://localhost/escapadefrancaisebis-master-a1d272ea9f21aac76bc0beb4361af1a62156fd63/ihm_en/post2.php" data-counter="top"></script>
        <!--Pinterest-->
        <a href="http://www.pinterest.com"> <img src="img/pinterest.png" width="32px" height="30px" style="margin-top:2%;"></a>
        <!--Google+-->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <g:plusone></g:plusone>
    <a style="margin-left:43%;">
        <?php
        echo '<a href="select_guesthouse.php?genre=SEA&ville=Normandie/%20Bretagne"><input type="button" value="See the guest houses"/></a>'
        ?>
    </a>
    </div>
</div>

<div class="case2" style="font-family: 'Montserrat', sans-serif;">
    <div class="row">
        <div class="col-md-6">
            <h2>You Might Also Like:</h2>
            <figure>
                <a href="post1.php" >
                <img src="img/mm.jpg" width="430px" height="300px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagne">
                </a>
            </figure>
                <h2>The French Riviera</h2>
                <small>july 5, 2017</small>
        </div>

        <div class="col-md-6">
            <br>
            <br>
            <br>
            <figure>
                <img src="img/mm1.jpg" width="430px" height="300px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagne">
            </figure>
                <h2>Normandy and Brittany</h2>
                <small>july 5, 2017</small>
        </div>
    </div>
</div>

 <!-- start footer-->
    <?php include 'footer.php'; ?>
<!--end footer-->
</boody>
</html>