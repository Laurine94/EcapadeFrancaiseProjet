<head>
    <title>Rejoignez notre plateforme!</title>
    <link rel="stylesheet" type="text/css" href="css/guesthouses_form.css">
</head>

<style>
    .label-file {
        padding: 15px 30px 15px;
        cursor: pointer;
        color: white;
        background-color: #183e67;
        font-weight: bold;
    }
    
    .label-file:hover {
        text-decoration: underline;
    }

    .input-file {
        display: none;
    }
</style>

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
            <h1>Rejoignez notre plateforme :</h1>
        </div>

        <form action="" method="">
                    <div class="espace">
                        <label for="title">
                            Titre:<br />
                            <select id="title" name="sexe_client" class="">
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mm.</option>
                            </select>
                        </label>
                    </div>

                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="first_name">
                                    Nom:<br />
                                    <input type="text" id="first_name" name="prenom_client" placeholder="First Name" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="last_name">
                                    Prenom:<br />
                                    <input type="text" id="last_name" name="nom_client" placeholder="Last Name" class="bleu"/>
                                </label>
                            </div>
                        </div>

                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="email">
                                    Email:<br />
                                    <input type="text" id="email" name="mail_client" placeholder="Email" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="phone">
                                    Telephone:<br />
                                    <input type="text" id="phone" name="tel_client" placeholder="Phone number" class="bleu"/>
                                </label>
                            </div>
                        </div>
                    </div>
            
                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="gh_name">
                                    Nom de la maison d'hotes:<br />
                                    <input type="text" id="gh_name" name="gh_name" placeholder="Guesthouse Name" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="gh_url">
                                    Siteweb:<br />
                                    <input type="text" id="gh_url" name="gh_url" placeholder="URL" class="bleu"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="espace">
                        <div class="moyenne_div">
                            <div class="petite_div_75">
                                <label for="address">
                                    Addresse:<br />
                                    <input type="text" id="address" name="adresse_client" placeholder="Address" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_25">
                                <label for="zip_code">
                                    code postal :<br />
                                    <input type="text" id="zip_code" name="code_postal_client" placeholder="Zip Code" class="bleu"/>
                                </label>
                            </div>
                        </div>

                        <div class="moyenne_div">
                            <div class="petite_div_50">
                                <label for="city">
                                    Ville:<br />
                                    <input type="text" id="city" name="ville_client" placeholder="City" class="bleu"/>
                                </label>
                            </div>
                            <div class="petite_div_50">
                                <label for="country">
                                    Pays:<br />
                                    <input type="text" id="country" name="pays_client" placeholder="Country" class="bleu"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="upload_div">
                        <label for="file" class="label-file"><img src="img/logos/upload-button.png"> telechargez le contrat signé </label>
                        <input id="file" class="input-file" type="file">
                        <br />
                        <br />
                        <br />
                        <label for="file" class="label-file"><img src="img/logos/upload-button.png"> telechargez la charte signée</label>
                        <input id="file" class="input-file" type="file">
                    </div>
            
                    <br />

                    <div class="decale_droite">
                        <a><input type="submit" class="submit_btn" value="Submit"/></a>
                    </div>
                </form>
        </div>
    
        <br />
        <br />
        <br />
    
        <?php include 'footer.php'; ?>
</body>