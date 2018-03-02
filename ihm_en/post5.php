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
        <h2>December in Strasbourg</h2>
        <p>December 5, 2017 | Hèloise Melen</p>
        <br>

        <p>
            Strasbourg is our favourite destination in December.<br>
        <br>
       During the Christmas holidays, Strasbourg (and Alsace in general) is adorned with its most beautiful garlands and lights, and hosts one of the most beautiful Christmas markets, which makes the whole of Europe dream. Escapade Française invites you to stay there, to immerse yourself in the magic of Alsatian Christmas, traditional, authentic and warm.
        <br>
        <br>
        More than 300 chalets are located on dozens of sites throughout the city, offering treats, local specialities, Christmas decorations and other souvenirs.
        <br>
        <br>
        For a few years now, there has also been the Christmas OFF, or responsible market, which provides an opportunity to experience the holiday season from a different and responsible consumption perspective. The Christmas market lasts exactly one month, between November 24 and December 24, and it is absolutely essential.
        <br>
        <br>
        Strasbourg and its region, however, is not only about Christmas celebrations, it is also a dynamic and modern space for all kinds of activities. From December 1st to 31st, the Première Festival takes place, which celebrates young European directors and gives a glimpse of the richness of the ideas of tomorrow's artists.
        <br>
        <br>
        <p style="color: red;"> Our weather report</p>
       In December in Alsace, the temperatures are low, often between -2°C and 5°C. They can vary greatly from year to year. As Strasbourg is situated in a basin, it is relatively protected from the wind. The sunshine is low, with rainfall ranging from 40mm to 50mm. However, it is easy to warm your heart with an excellent cinnamon mulled wine while strolling through the city's illuminated streets. 
       <br>
        <br>
        
        <br>
        </p>
        <br>
        <figure>
            <img src="img/strasbourg.png" width="900px" height="400px" class="img-responsive" class="img-thumbnail" alt="La Normandie et la Bretagne">
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