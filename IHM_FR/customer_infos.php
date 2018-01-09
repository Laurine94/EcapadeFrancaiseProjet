<head>
    <title>Informations du client</title>
    <link rel="stylesheet" type="text/css" href="css/customer_infos.css">
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
            <h1>Informations du client</h1>
        </div>

        <form action="" method="">
                    <div class="espace">
                        <label for="title">
                            Titre:<br />
                            <select id="title" name="sexe_client" class="">
                                <option value="Mr">M.</option>
                                <option value="M">Mme.</option>
                                <option value="M">Mlle.</option>
                            </select>
                        </label>
                    </div>

                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="first_name">
                                    Prénom:<br />
                                    <input type="text" id="first_name" name="prenom_client" placeholder="Prénom" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="last_name">
                                    Nom:<br />
                                    <input type="text" id="last_name" name="nom_client" placeholder="Nom" class="bleu"/>
                                </label>
                            </div>
                        </div>

                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="email">
                                    Adresse mail:<br />
                                    <input type="text" id="email" name="mail_client" placeholder="Adresse mail" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="phone">
                                    Téléphone:<br />
                                    <input type="text" id="phone" name="tel_client" placeholder="Numéro de téléphone" class="bleu"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_75">
                                <label for="address">
                                    Addresse:<br />
                                    <input type="text" id="address" name="adresse_client" placeholder="Addresse" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_25">
                                <label for="zip_code">
                                     Code Postal:<br />
                                    <input type="text" id="zip_code" name="code_postal_client" placeholder="Code Postal" class="bleu"/>
                                </label>
                            </div>
                        </div>

                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="city">
                                    Ville:<br />
                                    <input type="text" id="city" name="ville_client" placeholder="Ville" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="country">
                                    Pays:<br />
                                    <input type="text" id="country" name="pays_client" placeholder="Pays" class="bleu"/>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="decale_droite">
                        <a><input type="submit" class="submit_btn" value="Paiement"/></a>
                    </div>
                </form>
        </div>
    
        <br />
        <br />
        <br />
    
        <?php include 'footer.php'; ?>
</body>