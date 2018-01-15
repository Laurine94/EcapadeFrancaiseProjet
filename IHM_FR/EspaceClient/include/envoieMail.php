<?php
$header="MIME-Version: 1.0\r\n";
$header.='From:"EscapadeFrancaise.com"<support@escapadefrancaise.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
    <html>
        <body>
            <div align="center">
                Nous vous remercions pour votre inscription sur notre site Escapade Française.<br/>
                Veuillez confirmer votre inscription en cliquant sur le lien ci-dessous.<br/>
                <a href="localhost/escapadefrancaise/ihm_fr/EspaceClient/indexClient.php> retour vers le site </a>"
               <br/>---------------<br/>
                Ceci est un mail automatique, Merci de ne pas y répondre.
            </div>
        </body>
    </html>
        ';
mail("cousinlaurine94260@gmail.com", "Confirmation du compte", $message,$header);
?>