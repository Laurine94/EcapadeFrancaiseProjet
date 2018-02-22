
<style>
  .col-md-5 {  margin: 0; padding: 0 }
  .col-md-5 div { margin: 0; padding: 0;}
  #myCarousel1 img, #myCarousel2 img {
  margin: 0; padding: 0;
  width: 61%;
  height: 379px;
  max-height: 100%;
  }
  #slides .title {
/*  border:2px solid #245580;*/
  font-size: 42px;
  background-color: #245580;
  color: white;
  min-height: 379px;
  vertical-align: center;
text-align: left;
font-weight: bold;
padding-left: 25px;
}
#slides a {
  color: white;
}
  #slides a:hover {
  color: white;
  text-decoration: none;
  }
</style>
<div class="container" id="slides">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
          <div class="title">
            <a href="genre.php" style="letter-spacing : 0.10em;">
                UNE SÉLECTION<br> DE MAISONS D'HÔTES<br> ÉXCEPTIONNELLE
            </a>
          </div>
        </div>
        <div class="col-md-5">
            <a href="genre.php">
                <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
<!--                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel1" data-slide-to="1"></li>
                        <li data-target="#myCarousel1" data-slide-to="2"></li>
                        <li data-target="#myCarousel1" data-slide-to="3"></li>
                    </ol>-->

                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/indexslide/slide1.jpg" class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/slide2.jpg"  class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/slide3.jpg"  class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/slide4.jpg"  class="img-responsive"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-1">
        </div>	
    </div>
    <br>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <a href="genrebis.php" >
                <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
<!--                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel2" data-slide-to="1"></li>
                        <li data-target="#myCarousel2" data-slide-to="2"></li>
                        <li data-target="#myCarousel2" data-slide-to="3"></li>
                        <li data-target="#myCarousel2" data-slide-to="4"></li>
                        <li data-target="#myCarousel2" data-slide-to="5"></li>
                    </ol>-->

                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/indexslide/sli1.jpg"  class="img-responsive" />
                        </div>

                        <div class="item">
                            <img src="img/indexslide/sli2.jpg"  class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/sli3.jpg"  class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/sli4.jpg"  class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/sli5.jpg"  class="img-responsive"/>
                        </div>

                        <div class="item">
                            <img src="img/indexslide/sli6.jpg"  class="img-responsive"/>
                        </div>	   
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
          <div class="title">
            <a href="genrebis.php" style="letter-spacing : 0.10em;">
              UNE LARGE LISTE <br>D'ACTIVITÉ <br>À PARTAGER <br>AVEC VOS AMIS <br>OU VOTRE FAMILLE
            </a>
          </div>
        </div>
        <div class="col-md-1">
        </div>	
    </div>      
</div>
      
<script>
$(function(){
    $('#myCarousel1').carousel({
      interval: 1000
    });
    $('#myCarousel2').carousel({
      interval: 1000
    });
});
</script>
