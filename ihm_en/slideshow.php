<!DOCTYPE html>
<html>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">-->
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>-->
    <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/animate.min.css'>
    <link rel="stylesheet" href="css/slideshow.css">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 

<body>
      <link href="css/bootstrap.min.css" rel="stylesheet">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
<!-- <script src="js/slideshow.js"></script>-->
<div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%">
    <!-- Indicators -->
    <ol class="carousel-indicators">
<?php
      $files = array ();
for ($i = 1; $i < 16; $i++) {
    $file = "img/slide$i/$nom_activite" . "_slide$i.jpg";
//    echo $file;
    if (file_exists ($file)) {
        $files[] = $file;
        if ($i == 1) {
            echo "<li data-target=#myCarousel data-slide-to=0 class=active></li>";
        } else {
            echo "<li data-target=#myCarousel data-slide-to=". ($i - 1). "></li>";
        }
    } else {
        break;
    }
}
?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
<?php
    foreach ($files as $file) {
        if ($file == $files[0]) {
            echo "<div class='item active'>";
        } else {
            echo "<div class='item'>";
        }

        echo "<img src=\"" . $file . "\" style='width: 100%'></div>";
    }
?>
    <!-- Left and right controls
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    -->
  </div>
</div>

<script>
$(function(){
    $('#myCarousel').carousel({
      interval: 1000
    });
}
</script>
    
</body>
</html>