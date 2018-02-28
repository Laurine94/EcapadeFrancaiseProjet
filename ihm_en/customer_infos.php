<?php
    $prix = $_GET["prix"];
?>
<head>
    <title>Informations du client</title>
    <link rel="stylesheet" type="text/css" href="css/customer_infos.css">
<!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
</head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/form.js"></script>        

<body>
    
    <div>
        <?php include 'navbar.php'; ?>
    </div>
    
    <div class="grande_div">
        <br />
        <br />
        <div class="sous_div1">
            <h1>Customers informations</h1>
        </div>

        <form action="charge.php" method="POST">
<!--            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">-->
                    <div class="espace">
                        <label for="title">
                            Title:<br />
                            <select id="title" name="sexe_client" class=""required>
                                <option value="Mr">Mr.</option>
                                <option value="M">Mrs.</option>
                                <option value="M">Miss.</option>
                            </select>
                        </label>
                    </div>

                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="first_name">
                                    First name:<br />
                                    <input type="text" id="first_name" name="prenom_client" placeholder="First name" class="bleu"required/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="last_name">
                                    Last name:<br />
                                    <input type="text" id="last_name" name="nom_client" placeholder="Last name" class="bleu"required/>
                                </label>
                            </div>
                        </div>

                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="email">
				  Mail:<br />
                                    <input type="text" id="email" name="mail_client" placeholder="Mail" class="bleu"required/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="phone">
                                    Phone number:<br />
                                    <input type="text" id="phone" name="tel_client" placeholder="Phone number" class="bleu"required/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_75">
                                <label for="address">
                                    Address:<br />
                                    <input type="text" id="address" name="adresse_client" placeholder="Address" class="bleu"required/>
                                </label>
                            </div>
                            <div class="petite_div_25">
                                <label for="zip_code">
                                     Post code:<br />
                                    <input type="text" id="zip_code" name="code_postal_client" placeholder="Post code" class="bleu"required/>
                                </label>
                            </div>
                        </div>

                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="city">
                                    City:<br />
                                    <input type="text" id="city" name="ville_client" placeholder="City" class="bleu"required/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="country">
                                    Country:<br />
                                    <input type="text" id="country" name="pays_client" placeholder="Country" class="bleu"required/>
                                </label>
                            </div>
                        </div>
                    </div>
<!--                </div>
            </div>-->

                    <!--<div class="decale_droite">
                        <a><input type="submit" class="submit_btn" value="Payment"/></a>
                    </div>-->
<!--                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-xs-offset-10 col-sm-offset-10 col-md-offset-10">-->
                            <h4>Montant à payer : <?php echo $prix ?> €</h4>
                            <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_2Kx8f7hKtHWtF7iq1lqnlAIa" 
                                data-image="img/logos/ESP.jpg" 
                                data-name="ESCAPADE FRANÇAISE"
                                data-description="Payment"
                                data-amount= rand(0000,99999)>
                            </script>
<!--                        </div>
                    </div>-->
                </form>
        <div class="petite_div_75">
            <img src="img/payment/visa.png" >
            <img src="img/payment/mastercard.png" >
            <img src="img/payment/maestro.png" >
            <img src="img/payment/amex.png" >
            <img src="img/payment/discover.png" >
            <img src="img/payment/diners.png" >
            <img src="img/payment/jcb.png" >
        </div>
        </div>
    
        <br />
        <br />
        <br />
    
        <?php include 'footer.php'; ?>
</body>
