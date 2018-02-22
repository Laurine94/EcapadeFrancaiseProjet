<?php 
include 'connexion.php';
?>


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

    <body>
        <form method="post" action="coffrets_payment.php">
        <?php include 'coffrets_navbar1.php'; ?>
        <br>

             <!-- <a href="coffrets_panier.php" class="previous">&laquo; Previous</a>-->
              <h2 style="margin-left:8%;">MY CART</h2>
             <!-- <a href="col.php" class="next"> Next&raquo;</a>-->
    <!--start case2-->
    <div class="case2">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                 <tr>
                                    <td>Article</td>
                                    <td>Reference</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                 </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="img/cadeaux/Mockup1.jpg" width="100px;" height="100px;" alt="coffret paris" class="img-responsive">
                                    </td>
                                    <td>

                                        <p>COFFRET PARIS</p>
                                        <p>Inventory number : 0001</p>
                                        <p>Color : red and green</p>
                                        <p>Price : 200.00€</p>
                                        <button id="btn1" type="submit">Remove</button>
                                    </td>
                                    <td><input type="number" class="qte" min="0"/></td>
                                    <td>200.00€</td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
   </div>  <!-- end case2 -->
   <br>
   <hr>

   <!-- case-->
  

   <!-- cas -->
   
   <!-- case3-->
   <div class="case3">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <p style="font-weight:bold;">Message to the seller :</p>
                      <fieldset>
                          <form method="POST" action="coffrets_contact.php">               
                              <label>
                                  <textarea  name="message" placeholder="If you have any instructions or special requests, add them here." style="border:3px solid #183e67; width: 500px; height: 100px; padding: 15px;"></textarea>
                              </label>
                              <br>
                                  <button class="btn btn-default" style="color:white; background-color: #183e67;">Send</button>
                                  <button class="btn btn-default" style ="color:white; background-color: #183e67;">Finish</button>
                          </form>  
                      </fieldset>
              </div>

              <div class="col-md-6">
                  <p style="text-align: right; font-size: 15px; line-height: 25px; font-weight:bold;">Subtotal:
                   200.00€</p>
                  <br>
                  <p style="text-align: right;">Discounts, delivery charges and taxes will be calculated upon payment.</p>
                  
              </div>
          </div>
      </div>
   </div>
   <!-- end case3-->
   <br>
   <!-- case 4-->
   <div class="case4">
     <div class="container">
       <div class="row">
         <div class="col-md-6">
           <img src="img/cadeaux/imgpay.jpg" alt="coffret" width="200px;" height="70px;" style="margin-top: 30px;">
         </div>

         <div class="col-md-6">
           
           <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#mmyModal" style="background-color: #183e67; color: white; width: 200px; height: 50px; align-items: right; margin-left:65%;">Pay</button>
                <!-- Modal -->
                  <div class="modal fade" id="mmyModal" role="dialog">
                      <div class="modal-dialog">
                       <!-- Modal content-->
                          <div class="modal-content">
                                <div class="modal-body">
                                      <p style="text-align: center; color: #B0A171 font-size:30px;">PAYMENT VALIDATION</p>
                                      <br>
                                      <hr>

                                      <fieldset>
                                      <form action="bankcard.php" method="POST">
                                      <p>Last name:   <input type="text" name="name" size="60px;" style="margin-left: 20px;">
                                      <hr>  
                                      </p>
                                      <p>First name: <input type="text" name="prenom" size="57px;" style="margin-left: 20px;">
                                      </p>
                                      <hr>
                                      <p>Address: <input type="text" name="addresse" size="57px;" style="margin-left: 20px;">
                                      <hr>
                                      </p>
                                      <p>E-mail: <input type="text" name="email" size="59px;" style="margin-left: 20px;">
                                      <hr>
                                      </p>
                                      <p>Type of card: 
                                          <label class="radio-inline">
                                                 <input type="radio" name="optradio">CB<img src="img/cadeaux/cb.jpg" width="25px;" height="25px;">
                                          </label>
                                          <label class="radio-inline">
                                                 <input type="radio" name="optradio">MasterCard <img src="img/cadeaux/master.jpg" width="25px;" height="25px;">
                                          </label>
                                          <label class="radio-inline">
                                                <input type="radio" name="optradio">PayPal <img src="img/cadeaux/pay.jpg" width="25px;" height="25px;">
                                          </label>
                                          <label class="radio_inline">
                                                <input type="radio" name="optradio">Visa <img src="img/cadeaux/visa.jpg" width="25px;" height="25px;">
                                          </label>
                                      </p>

                                      <p>Card number: <input type="text" name="numerocard" size="50px;" style="margin-left: 20px;" >
                                      <hr>
                                      </p>
                                      <p>Cryptogram: <input type="text" name="syr" size="51px;" style="margin-left: 20px;">
                                      <hr>
                                      </p>
                                      <p>Expiration date: <input type="Date" name="date" size="40px;" style="margin-left: 20px;">
                                      <hr>
                                      </p>
                                      </fieldset>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Confirm</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                          </div>
                      </div>
                  </div>
         </div>
       </div>
     </div>
   </div>

<?php include 'footer.php'; ?>
</body>
</html>

  
  

