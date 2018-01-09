<head>
    <title>Travel Agency</title>
    <link rel="stylesheet" type="text/css" href="css/travel_agency.css">
    <style>.rederror input, .rederror textarea, .rederror select {border-color:#c00;}</style>
</head>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<!--<script src="js/form.js"></script>-->

<body>
    <?php require_once("contact_form_valid.php"); ?>
    <?php require_once("travel_agency_valid.php"); ?>
    <div>
        <?php include 'navbar.php'; ?>
    </div>

    <div class="grande_div">
        <br />
        <br />
        <div class="sous_div1">
            <p>Welcome to Escapade Francaise Travel Agent area. If you do not yet have a partnership with us, please complete the registration form below and send it to us. You will be able to see prices and availability for our properties and make online reservations for your customers.</p>
        </div>
        <form method="post" name="aics">
            <div class="espace<?php echo $titlecls;?>">
                <label for="title">
                    Title:<br />
                    <select id="title" name="title" class="">
                        <option value="Mr"<?php echo ($titleval=='Mr')?'selected':'';?>>Mr.</option>
                        <option value="M"<?php echo ($titleval=='M')?'selected':'';?>>Mrs.</option>
                    </select>
                </label>
            </div>

            <div class="espace">
                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $first_namecls;?>">
                        <label for="first_name">
                            First name:<br />
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="bleu" value="<?php echo $first_nameval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $last_namecls;?>">
                        <label for="last_name">
                            Last name:<br />
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="bleu" value="<?php echo $last_nameval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $emailcls;?>">
                        <label for="email">
                            Email:<br />
                            <input type="text" id="email" name="email" placeholder="Email" class="bleu" value="<?php echo $emailval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $phonecls;?>">
                        <label for="phone">
                            Phone number:<br />
                            <input type="text" id="phone" name="phone" placeholder="Phone number" class="bleu" value="<?php echo $phoneval;?>"/>
                        </label>
                    </div>
                </div>
            </div>

            <div class="espace">
                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $functioncls;?>">
                        <label for="function">
                            Function:<br />
                            <input type="text" id="function" name="function" placeholder="Function" class="bleu" value="<?php echo $functionval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $agency_namecls;?>">
                        <label for="agency_name">
                            Name of the agency:<br />
                            <input type="text" id="agency_name" name="agency_name" placeholder="Name of the agency" class="bleu" value="<?php echo $agency_nameval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $companycls;?>">
                        <label for="company">
                            Company:<br />
                            <input type="text" id="company" name="company" placeholder="Company" class="bleu" value="<?php echo $companyval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $specializationcls;?>">
                        <label for="specialization">
                            Agency specialized in...<br />
                            <input type="text" id="specialization" name="specialization" placeholder="Agency specialized in..." class="bleu" value="<?php echo $specializationval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_75<?php echo $addresscls;?>">
                        <label for="address">
                            Address:<br />
                            <input type="text" id="address" name="address" placeholder="Address" class="bleu" value="<?php echo $addressval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_25<?php echo $zip_codecls;?>">
                        <label for="zip_code">
                            Zip Code:<br />
                            <input type="text" id="zip_code" name="zip_code" placeholder="Zip Code" class="bleu" value="<?php echo $zip_codeval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $citycls;?>">
                        <label for="city">
                            City/State:<br />
                            <input type="text" id="city" name="city" placeholder="City" class="bleu" value="<?php echo $cityval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $countrycls;?>">
                        <label for="country">
                            Country:<br />
                            <input type="text" id="country" name="country" placeholder="Country" class="bleu" value="<?php echo $countryval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $faxcls;?>">
                        <label for="fax">
                            Fax:<br />
                            <input type="text" id="fax" name="fax" placeholder="Fax" class="bleu" value="<?php echo $faxval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $iatacls;?>">
                        <label for="iata">
                            IATA Number:<br />
                            <input type="text" id="iata" name="iata" placeholder="IATA Number" class="bleu" value="<?php echo $iataval;?>"/>
                        </label>
                    </div>
                </div>
            </div>

            <div class="sous_div2">
                <p><em>If you do not have any IATA/TIDS/ number, please contact us. We will make every attempt to respond within 48 to 72 hours:</em> <strong>travelagency@escapadefrancaise.com</strong></p>
            </div>

            <div class="espace">
                <div class="moyenne_div">
                    <div class="petite_div_100<?php echo $messagecls;?>">
                        <label for="message">
                            Add a comment:<br />
                            <textarea name="message" id="message" placeholder="Type your message here" class="bleu"><?php echo $messageval;?></textarea>
                        </label>
                    </div>
                </div>
            </div>

            <div class="decale_droite">
                <input type="submit" value="Send"/>
            </div>
        </form>

        <div class="sous_div1">
            <br /><br />
            <p><strong>Legal</strong></p>
            <p>Your privacy is very important to us. Any information you give us is held with the utmost care and security, and will not be used in ways to which you have not consented. We never share or sell any customer data with any third party. In conformity with the French Data Protection Act of 6 January 1978, you have a right to access and correct any information about yourself by sending a message to travelagency@escapadefrancaise.com</p>
            <p>I have read and accept without reserve the <a href="terms_of_use.php">terms of use.</a></p>
            <p>* Required fields</p>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>