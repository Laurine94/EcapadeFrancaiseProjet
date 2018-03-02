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
        <h2>Polynesian Paradise</h2>
        <p>November 5, 2017 | Hèloise Melen</p>
        <br>

        <p>In November, head for Polynesia! 
        <br>
        <br>
        French getaway takes you to the French archipelago, in the heart of the Pacific Ocean, to escape the European grey. As the season lends itself to this, there are many activities and events taking place in the archipelago in November to let you discover the culture and new scents of the Leeward Islands and the Windward Islands. Let yourself be tempted by the Hawaiki Nui Va' a from November 1st to 3rd, traditional dugout canoe race which gathers more than 100 boats, whose arrival is planned on the mythical beach of the Matira point in Bora Bora. The 17th edition of the book fair will take place from 22 to 29 November. What better way to discover Polynesian culture than to immerse yourself in its literature? You will be able to attend conferences and exhibitions, meet local and foreign authors, in the idyllic gardens and spaces of the Maison de la Culture in Papeete.
        <br>
        <br>
       Finally, the appearance of the constellation of Pleiades (or Matari' i ni' a) is celebrated from 20 November. It is the mark of the passage from one period to another, a key moment in ancient life marked by numerous rituals and rituals. Nowadays, several unique events allow us to relive these authentic moments.
        <br>
        <br>
       
       <p style="color: red;"> Our Weather Log</p>
        
      Whereas in November, it is getting cooler and cooler in mainland France, the temperatures in Polynesia are close to perfection: between 27°C and 31°C throughout the month. With lots of sunshine, there may be some light rains during the day.
       <br>
        <br>
        As for the water temperature, bathing is delicious because the seasonal averages rise to 28°C.
        <br>
        <br>
French Polynesia is waiting for you!
<br>
        <br>
        </p>
        <br>
        <figure>
            <img src="img/bora_bora.jpg" width="900px" height="400px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagne">
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