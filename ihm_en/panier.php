<?php require 'coffrets_navbar.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Escapade Coffrets panier</title>
        <meta name="description" content="Escapade Française is a large array of guest houses, activities and private guided all over France. Our activities are shoping, skydiving, trekking, sightseeing tour and more all around France ">

        <meta name="keyword" content="paris stay, stay in paris,where to stay in paris,where to stay in paris with family, where to stay in paris as a tourist, where to stay in france as a tourist, best area to stay in paris as a tourists,best area of paris to stay for tourist,best area in paris to stay as tourist, best area in france to stay as a tourist,best place to stay in paris for tourist,best tourist area to stay in paris, best tourist area to stay in france, paris best area to stay tourist, paris tour guide, france tour guide, french riviera tour guide, tour guide paris, tour guide france, paris guided tours,guided tours paris,tour in paris,guided tours in paris,guided tours in France, guided tours of Paris, city tour Paris,city tour of Paris,city tour in paris,guided tours to paris, guided paris tours, tour guides in Paris, paris city tour itinerary, hotel all inclusive,all inclusive vacances, hotel all exclusive,all in exclusive, paris stay, france stay, french riviera stay, stay in paris, stay in france, where to stay paris, where to stay france, where to stay in paris,where to stay in paris with family,where to stay in paris as a tourist,best place to stay in paris for tourist, best place to stay in france for tourist, paris best area to stay tourist, paris tour guide, tour guide France,book amazing guesthouses, book amazing activities, book amazing private guides,Strasbourg stay, where to Stay in Strasbourg, Bordeaux Stay, where to stay in Bordeaux as a tourist, normandy stay, French Brittany stay, best area to stay in French Riviera as a tourist, Corse Stay, French Polynesia stay, bora bora stay, Courchevel stay, Annecy Stay, Winter holidays in France, christmas market strasbourg, Paris, Strasbourg,Lyon,normandy,bretagne,Brittany,Corse,haute-savoie, Annecy, Courchevel, Mont Blanc, marseille, Martinique, Saint barthelemy, St-barth, French Polynesia, Polynesie francaise, bora bora, bordeaux,ile de la reunion, Reunion island, France, paris hotels, hotels in paris, hotels strasbourg, hotels bordeaux, guest houses paris, paris guest houses, france guest houses, guest houses in france, hotel in paris, guest house in paris, bed and breakfast, b&b, escapade francaise, escapade française,   ">

        
       
        <link rel="stylesheet" type="text/css" href="css/coffrets_payment.css">
        <!--<link rel="stylesheet" type="text/css" href="css/zoomy.css">-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/zoomy/2.0.0/zoomy.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- pluging for zoomy box-->
        <link rel="stylesheet" type="text/css" href="js/jquery.min.js">

        <script scr="https://cdn.jsdelivr.net/zoomy/2.0.0/zoomy.min.js"></script>
        <script scr="https://cdn.jsdelivr.net/g/zoomy@2.0.0(zoomy.min.js+zoomy.js)"></script>
         <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        <!-- end jquery-->
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>
    </head>

    <body style="font-family:'Montserrat', sans-serif;">
        <form method="post" action="panier.php">
        <br>

             <!-- <a href="coffrets_panier.php" class="previous">&laquo; Previous</a>-->
              <h2 style="margin-left:8%;">MY CART</h2>
             <!-- <a href="col.php" class="next"> Next&raquo;</a>-->
    <!--start case2-->
    <div class="case2">
        <form method="post" action="panier.php">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                 <tr style="font-weight:bold;">
                                    <td>Product</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Subtotal</td>
                                    <td>Actions</td>
                                 </tr>
                            </thead>
                            <tbody>
                			<?php
							$ids = array_keys($_SESSION['panier']);
							if(empty($ids)){
								$coffret = array();
							}else{
								$coffret = $DB->query('SELECT * FROM coffret WHERE id IN ('.implode(',',$ids).')');
							}
							foreach($coffret as $coffret):
							?>
                                <tr>
                                    <td><p><?= $coffret->nom_coffret; ?></p>
                                        <img src="img/cadeaux/<?= $coffret->id; ?>.jpg" class="img-thumbnail" width="200px" height=" 125px">
                                    </td>
                                    <td>
                                        <p><?= number_format($coffret->prix,2,',',''); ?> €</p>
                                    </td>
                                    <td><input type="number" style="width:67px; height:35px; text-align:center;" name="panier[quantity][<?= $coffret->id; ?>]" value="<?= $_SESSION['panier'][$coffret->id]; ?>" min="0" max="150"></td>
                                    <td><?= number_format($coffret->prix * $_SESSION['panier'][$coffret->id],2,',',''); ?> €</td> 
                                    <td><button id="btn1" type="submit"><a href="panier.php?delPanier=<?= $coffret->id; ?>" class="del" style="color:white;">Remove</a></button>
                                    </td>
                                </tr>	
							<?php endforeach; ?>
                            </tbody>
                        </table>
                        <input type="submit" style="margin-top:3%; margin-left:0.7%;background-color:#183e67; color:white;" value="Update the cart">  
                    </div>
                    <tr>
						<p style="text-align:right; font-weight:bold;">Total : <span id="total"><?= number_format($panier->total(),2,',',' '); ?> € </span></p>
					</tr>
                </div>
            </div>
       </div>
    </form>
   </div>  <!-- end case2 -->
   <br>

<div class="case4">
     <div class="container">
       <div class="row">
         <div class="col-md-6">
           <img src="img/paysecure.jpg" alt="coffret" width="175px;" height="155px;" style="margin-top: 30px;">
         </div>

         <div class="col-md-6">
           
           <button type="button" class="button" data-toggle="modal" data-target="#mmyModal" style="background-color: #183e67; color: white; width: 200px; height: 50px; align-items: right; margin-left:65%; font-size:14pt;">Checkout</button>
                <!-- Modal -->
                  <div class="modal fade" id="mmyModal" role="dialog">
                      <div class="modal-dialog">
                       <!-- Modal content-->
                          <div class="modal-content" style="top:-32px;">
                                <div class="modal-body">
                                      <p style="text-align: center; color: #B0A171 font-size:30px;">PAYMENT VALIDATION</p>
                                      <br>
                                      <hr>

                                      <fieldset>
                                      <form action="bankcard.php" method="POST">
                                      <p>Last name : <input type="text" name="name" size="15px;" style="margin-left:20px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;First name : <input type="text" name="prenom" size="15px;" style="margin-left: 20px;">
                                      <hr>  
                                      </p>
                                      <p>Address : <input type="text" name="addresse" size="64px;" style="margin-left:20px;">
                                      <br><br>
                                      Postal code : <input type="text" name="codepostal" size="7px;" style="margin-left:20px;">&emsp;&emsp;&emsp;&emsp;&emsp;City : <input type="text" name="ville" size="31px;" style="margin-left: 20px;">
                                      </p>
                                      <hr>
                                      </p>
                                      <p>E-mail : <input type="text" name="email" size="65px;" style="margin-left: 20px;">
                                      <hr>
                                      </p>
                                      <p>Mode of payment :&emsp;&emsp;
                                          <label class="radio-inline">
                                                 <input type="radio" name="optradio"><img src="img/payment/cb.jpg" width="34px;" height="27px;"> Bank card
                                          </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                          <label class="radio-inline">
                                                 <input type="radio" name="optradio"><img src="img/payment/mastercard.png" width="50px;" height="38px;"> MasterCard 
                                          </label><br><br>
                                          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                          <label class="radio-inline">
                                                <input type="radio" name="optradio"><img src="img/payment/paypal.png" width="90px;" height="25px;"> PayPal 
                                          </label>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                          <label class="radio_inline">
                                                <input type="radio" name="optradio"><img src="img/payment/visa.png" width="58px;" height="25px;"> Visa 
                                          </label>
                                      </p>
                                      <br>
                                      <p>Card number : <input type="text" name="numerocard" size="50px;" style="margin-left: 20px;"><br><br>
                                      Cryptogram : <input type="text" name="syr" size="7px;" style="margin-left: 20px;">&emsp;&emsp;&emsp;&emsp;&emsp;Expiration date : <input type="Date" name="date" size="40px;" style="margin-left: 20px;">
                                      </p>
                                      </fieldset>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="button" data-dismiss="modal" style="background-color:#183e67; color:white;">Confirm</button>
                                      <button type="button" class="button" data-dismiss="modal" style="background-color:#183e67; color:white;">Cancel</button>
                                </div>
                          </div>
                      </div>
                  </div>
         </div>
       </div>
     </div>
   </div>


<?php require 'footer.php'; ?>

</body>
</html>