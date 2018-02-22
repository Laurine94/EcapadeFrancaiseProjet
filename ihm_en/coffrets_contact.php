
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
           <p>For special requests and orders</p>
           <br> 
           <form>
            <p style="text-align:left; font-size:10pt;">Name :</p>
               <div class="form-group">
                     <input type="name" class="form-control" id="name" name="name" placeholder="Write your first name and your last name" style="border:2px solid #7C7A00;">
               </div>
            <p style="text-align:left; font-size:10pt;">Email :</p>
              <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Write your email address" style="border:2px solid #7C7A00;">
              </div>
            <p style="text-align:left; font-size:10pt;">Subject : </p>
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="What is the purpose of your request?" style="border:2px solid #7C7A00;">
              </div>
            <p style="text-align:left; font-size:10pt;">Message : </p>
              <div class="form-group">
                <textarea type="text" class="form-control" id="message" name="message" row="10" cols="50" placeholder="Write the message" style="border:2px solid #7C7A00; height:120px;"></textarea>
              </div>
              <button type="submit" class="btn btn-default" style="border:2px solid #7C7A00; color: white; background-color: #7C7A00;">Submit</button>
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