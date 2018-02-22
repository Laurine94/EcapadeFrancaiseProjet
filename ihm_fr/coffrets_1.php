

<html>
    <head>
        <meta charset="UTF-8">
        
         <title>Escapade Coffrets panier</title>
        <!--<link href="css/index.css" rel="stylesheet">-->
         <link rel="stylesheet" type="text/css" href="css/coffrets_paniernav.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!--<link rel="stylesheet" type="text/css" href="css/zoomy.css">-->
         <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/zoomy/2.0.0/zoomy.css">
  
       
        <!-- jQuery -->
        <script scr="https://cdn.jsdelivr.net/zoomy/2.0.0/zoomy.min.js"></script>
<script scr="https://cdn.jsdelivr.net/g/zoomy@2.0.0(zoomy.min.js+zoomy.js)"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!--<script scr="js/zoomy.js"></script>-->
        <!--<script src="js/zoomy.min.js"></script>-->
        
      
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>
        <!-- for popup box css-->

        <style type="text/css">
               .black_overlay {
              display: none;
              position: absolute;
              top: 1%;
              left: 0%;
              width: 100%;
              height: 100%;
              background-color: black;
              z-index: 1001;
              -moz-opacity: 0.8;
              opacity: .80;
              filter: alpha(opacity=80);
            }

            .white_content {
             display: none;
             position: absolute;
             top: 1%;
             left: 40%;
             right: 55%;
             width: 70%;
             height: 98%;
             padding: 26px;
             border: 5px solid #B0A171;
             background-color: white;
             z-index: 1002;
             overflow: auto;
            }


      </style>
    </head>

    <body>
      <?php include 'coffrets_navbarshop.php'; ?>
    <!-- case 1 -->      
   <div class="case1">
     
   </div>
   <!--end case 01 for white space-->
   <div class="case2">
     <div class="container">
       <div class="row">
         <div class="col-md-6">
           <div class="box1">
              <img src="img/cadeaux/Mockup1.jpg" class="img-thumbnail">
              
              <br>
              <br>
              <p>I'm a product description. This is a great place to "sell" your product and grab buyers' attention. Describe your product clearly and concisely. Use unique keywords. Write your own description instead of using manufacturers' copy.</p>
           </div>
         </div><!-- for box image case2 box1 end-->

         <div class="col-md-6">
           <div class="box2">
             <h1>COFFRET PARIS</h1>
             <br>
             <br>
             <br>
             <p>UGS : 0001</p>
             <br>
             <p>200.00€</p>
             <br>
             <p>Couleur : rouge et vert</p>
             <br>
             <p>Quantité</p>
              <input type="number" class="qte" min="0"/>
             <br>
            <br>
            <br>
            <div id="button1">
              <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
                <p style="margin-top:-2%;">AJOUTER AU PANIER</p></a>

            </div>

            <!-- start popup box here-->

            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="titre">
                <span class="close">&times;</span>
                  <h2 style="font-size:16pt; text-align:center;">PANIER</h2>
              </div>
              <img src="img/cadeaux/small.jpg " class="img-thumbnail" width="300px;" height="400px;" style="align-items: center; margin-left:13%" class="zoom">
              <div class="modal-body">
                    <br>
                    <p style="font-weight:bold;">COFFRET PARIS</p>
                    <br>
                    <P>Quantité :</P>
                    <br>
                    <p>Prix : </p>
                    <br>
                    <p>Sous-total : </p>
                    <br>   
                  <br>
                  <br>
                  <br>
                  <button id="btn" onclick=""><a href="panier.php">
                    <p style="font-size: 18px; text-align:center;">Voir mon panier</p></a></button>
                  <br>
                  <br>  
                  <br>
              </div>
            </div>

            </div>

            <script>
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("button1");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
              modal.style.display = "block";
            }
            span.onclick = function() {
              modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
            
            <hr>
            <div id="hide">
               <h5>Informations sur le produit</h5>
               
            <hr>
            <p>I'm a product detail. I'm a great place to add more information about your product such as sizing, material, care and cleaning instructions. This is also a great space to write what makes this product special and how your customers can benefit from this item. Buyers like to know what they’re getting before they purchase, so give them as much information as possible so they can buy with confidence and certainty.</p>
            <hr>
            </div>
           
            <h5>Retour et politique de remboursement</h5>
            <hr>
            <p>I’m a Return and Refund policy. I’m a great place to let your customers know what to do in case they are dissatisfied with their purchase. Having a straightforward refund or exchange policy is a great way to build trust and reassure your customers that they can buy with confidence.</p>
            <hr>
           </div>
         </div><!-- case2 box2 end-->
       </div>
     </div>
   </div><!-- case2 end-->
  <br>
  <br>
  <br>
  <br>
      
<!--footer-->


<!--<div class="case3">-->

<script>

// It is my popup items
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}




</script>
</div>
<div class="case3">
  <?php include 'footer.php'; ?>
</div>


</body>
</html>

 