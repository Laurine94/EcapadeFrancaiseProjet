<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/contact_form.css" />
<br />
<div class="container"> 
    <div class="row">
         <div class="col-md-6 col-md-offset-3">
             <form method="post" name="aics" id="contact-formulaire" action="contact_form_valid.php">
                    <span style="text-align: center; color:#183e67;"><a href="travel_agency.php"><h1>We would love to hear from you!</h1></a></span>
                    <br>
                    <br>
                    <br>
                    <div class="traitrouge">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <input class="form-control" id="id_name" maxlength="100" name="id_name" placeholder="Name" type="text" " />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_email" name="id_email" placeholder="Email" type="Email"  />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_number" name="id_number" placeholder="Phone number" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_subject" maxlength="100" name="id_subject" placeholder="Subject"  type="text" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" cols="40" id="id_message" name="id_message" placeholder="Message" rows="10"></textarea>
                    </div>
                    <input type="submit" class="btn btn_bleu" value="Submit">
             </form>
        </div>
    </div>   
</div>
<br />