<!DOCTYPE html>
<html>
    <head>
        <title> Mes factures</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <div class="container-fluid" id="background">
            <div class="row" id="titre-factures">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1> My invoices</h1>
                    <p>Download and consult here all your invoices.</p>
                </div>
            </div>
            <div class="row" id="carousel-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="carousel fade-carousel slide" style="border:2px solid black" data-ride="carousel" data-interval="3000" id="bs-carousel">
					<!--puces-->
					<ol class="carousel-indicators ">
						<li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                                                <?php for($i = 1; $i <= 3; $i++){?>
						<li data-target="#bs-carousel" data-slide-to="<?php echo $i ?>" ></li>
                                                <?php } ?>
					</ol>
					
					<!--Carroussel-->
					<div class="carousel-inner">
                                                <div class="item active img-slide" id="" style="background-image: url(../img/espace_membre/mes_reservations_passees.jpg);">
                                                    <div class="carousel-caption" >
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;"></h3>
                                                        <h1>You have no invoices</h1>
                                                    </div>
						</div>
                                           
                                     
					</div>
                    </div>
                </div>
            </div>

        </div>
    </body></html>