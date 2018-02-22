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
        <h2>Normandy and Brittany</h2>
        <p>july 5, 2017 | Hèloise Melen</p>
        <br>

        <p>August is the most touristic season in France, so we advise you to avoid Paris and the French Riviera, where the heat can be difficult to bear. 
        <br>
        <br>
        To escape the crowd and the overwhelming heat, Escapade Française offers you the opportunity to recharge your batteries in Normandy and Brittany, two of the most exceptional regions in France with resplendent landscapes this time of year, both on sea and inland.
        <br>
        <br>
        There are many activities and monuments to admire, as well as many festivals. You can enjoy the “Musicales de Normandie”, a mix of world music, French traditional music and classical music. From the recital to the orchestra, the festival focuses on internationally renowned artists as well as promising young talents.
        <br>
        <br>
        If you stay until the beginning of September, do not miss the American Film Festival in Deauville, where you will have the chance to encounter many celebrities, from France and even Hollywood depending on the program. 
        In Brittany, Celtic music is often honored, with festivities such as village balls where you can learn traditional dances. Throughout the entire summer, the Arts Festival, at the tip of Finistere, brings together more than 30,000 people and combines religious and contemporary art in a very unique way.
        <br>
        <br>
       <p style="color: red;"> Our Weather Book</p>
        
        Whether it is in Brittany or in Normandy, one can never escape the rain. But do not worry, without rain, the charm of the region won’t be the same! It is part of the experience, even if the summer tends to have less rain than usual. 
        <br>
        <br>
        You will still have plenty of sun, with estimated temperatures between 18 ° C and 25 ° C during daytime.  For those wanting to go for a dip, the average temperature of the water is 18 ° C in Deauville and Honfleur, while it is cooler in Etretat and Cherbourg (17.6 ° C and 17.3 ° C respectively).
        <br>
        <br>
        </p>
        <br>
        <figure>
            <img src="img/mm1.jpg" width="900px" height="400px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagne">
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