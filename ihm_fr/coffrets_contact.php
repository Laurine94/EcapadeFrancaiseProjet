
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--css link-->
        <link rel="stylesheet" type="text/css" href="css/coffrets_collection.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

         <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>      
     
    </head>
    <!-- end heade part-->
<body style="font-family:'Montserrat', sans-serif;">
	<?php include 'coffrets_navbar.php'; ?>
     <div class="col-md-3"></div>
     <div class="col-md-6">
       <div class="case5" id="contact" name="contact">
         <div class="parti2">
           <h1>Contact</h1>
           <p>Pour les questions et demandes spéciales</p>
           <br> 
           <form>
            <p style="text-align:left; font-size:10pt;">Nom :</p>
               <div class="form-group">
                     <input type="name" class="form-control" id="name" name="name" placeholder="Saisissez votre nom et prénom" style="border:2px solid #7C7A00;">
               </div>
            <p style="text-align:left; font-size:10pt;">Adresse mail :</p>
              <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ecrivez votre adresse mail" style="border:2px solid #7C7A00;">
              </div>
            <p style="text-align:left; font-size:10pt;">Objet : </p>
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Quel est l'objet de votre demande?" style="border:2px solid #7C7A00;">
              </div>
            <p style="text-align:left; font-size:10pt;">Message : </p>
              <div class="form-group">
                <textarea type="text" class="form-control" id="message" name="message" rows="10" cols="50" placeholder="Ecrivez un message" style="border:2px solid #7C7A00; height:120px;"></textarea>
              </div>
              <button type="submit" class="btn btn-default" style="border:2px solid #7C7A00; color: white; background-color: #7C7A00;">Envoyer</button>
          </form>       
         </div>
       </div>
     </div>

<br style="clear:both" />
<div class="case6">
     <?php include 'footer.php'; ?>
</div>

</body>
</html>
