<?php
	if(isset($_POST['id_name'])){
    $id_name = $_POST['id_name'];
}
else{
    $id_name='';
}
if(isset($_POST['id_number'])){
    $id_number = $_POST['id_number'];
}
else{
    $id_number='';
}

if(isset($_POST['id_email'])){
    $id_email = $_POST['id_email'];
}
else{
    $id_email='';
}

if(isset($_POST['id_subject'])){
    $id_subject = $_POST['id_subject'];
}
else{
    $id_subject='';
}

if(isset($_POST['id_message'])){
    $id_message = $_POST['id_message'];
}
else{
    $id_message='';
}
//envoie d'un mail de confirmation
$header = "MIME-Version: 1.0\r\n";
$header .= 'From:"EscapadeFrancaise.com"<support@escapadefrancaise.com>' . "\n";
$header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
$header .= 'Content-Transfer-Encoding: 8bit';

$message = '
            <html>
                <body>
                    <div align="justify">
                    Name: ' . $id_name .
        ' <br/>
                    email:' . $id_email .
        '<br/>
                    Phone number:' . $id_number .
        '<br/>
                    Subject:'.$id_subject.
        '<br>
                    Message:' . $id_message .
        '<br/>---------------<br/>
                        Ceci est un mail automatique, Merci de ne pas y répondre.
                    </div>
                </body>
            </html>
            ';
mail('gestionreservationsef@gmail.com', "We would love to hear from you!$id_name", $message, $header);

header("Location:http://localhost/escapadefrancaise/ihm_en/index.php")
?>
?>