
<style>
  .col-md-5 {  margin: 0; padding: 0 }
  .col-md-5 div { margin: 0; padding: 0;}
  #myCarousel1 img, #myCarousel2 img {
  margin: 0; padding: 0;
  width: 100%;
  height: 379px;
  max-height: 100%;
  }
  #slides .title {
  //      border:2px solid #245580;
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
      <a href="genre.php">
        A SELECTION <br>OF<br> EXCEPTIONAL<br> GUEST<br> HOUSES
      </a>
      </div>
    </div>
    <div class="col-md-5">
      <div>
	<a href="genre.php">
          <div id="myCarousel1" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel1" data-slide-to="1"></li>
              <li data-target="#myCarousel1" data-slide-to="2"></li>
              <li data-target="#myCarousel1" data-slide-to="3"></li>
            </ol>

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
    </div>
    <div class="col-md-1">
    </div>	
  </div>
<br>
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-5">
      <div>
	<a href="genrebis.php">
        <div id="myCarousel2" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel2" data-slide-to="1"></li>
            <li data-target="#myCarousel2" data-slide-to="2"></li>
            <li data-target="#myCarousel2" data-slide-to="3"></li>
            <li data-target="#myCarousel2" data-slide-to="4"></li>
            <li data-target="#myCarousel2" data-slide-to="5"></li>
          </ol>

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
    </div>
    <div class="col-md-5">
      <div class="title">
	<a href="genrebis.php">
	  A WIDE RANGE <br>OF ACTIVITIES <br>TO SHARE <br>WITH FRIENDS <br>OR FAMILY
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
