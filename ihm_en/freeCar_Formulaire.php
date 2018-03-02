<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/contact_form.css" />
<br />
<div class="container" style="background: url(img/freeCar.png) no-repeat center fixed;"> 
    <div class="row">
         <div class="col-md-6 col-md-offset-3" >
               <form method="post" name="aics" id="contact-formulaire" action="freeCar_formulaire_valid.php" >
                    <span style="text-align: center; color:#183e67;"><h1>Hello, in order to facilitate the driver's work, please fill in and give us some additional information.</h1></a></span>
                    <br>
                    <br>
                    <br>
                    <div class="traitrouge">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <input class="form-control" id="id_name" maxlength="100" name="id_name" placeholder="Name" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_email" name="id_email" placeholder="Email" type="Email"  />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_number" name="id_number" placeholder="Phone number" type="text"  />
                    </div>
                     <div class="form-group">
                        <input class="form-control" id="id_airport_of_arrival" name="id_airport_of_arrival" placeholder="Airport of arrival" type="text"  />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_terminal" name="id_terminal" placeholder="Terminal" type="text"  />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_estimated_time_of_departure_from_the_airport" maxlength="100" name="id_estimated_time_of_departure_from_the_airport" placeholder="Estimated time of departure from the airport"  type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_flight_number_and_airline_company" maxlength="100" name="id_flight_number_and_airline_company" placeholder="Flight number and airline company"  type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_number_passengers" maxlength="100" name="id_number_passengers" placeholder="Number of passengers"  type="number" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id_name_guesthouse " maxlength="100" name="id_name_guesthouse " placeholder="Name of the guest house during the stay "  type="text" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" cols="40" id="id_message" name="id_message" placeholder="Message (special note)" rows="10"></textarea>
                    </div>
                     <input type="submit" class="btn btn_bleu" value="Submit" class="btn btn-primary btn-lg pull-right" style="background-color:#284777"data-toggle="modal" data-target="#myModal"/>
                     
                     <!-- Bouton execution modal 
                     <a href="freeCar_formulaire_valid.php"><button class="btn btn-primary btn-lg pull-right" style="background-color:#284777"data-toggle="modal" data-target="#myModal">
                            Submit
                         </button></a>
                     <!-- <input type="submit" class="btn btn_bleu" value="Submit">
                  <button type="button" class="btn btn_bleu">Submit</button>-->
                     
                       
             </form>
        </div>
    </div>   
</div>
<br />