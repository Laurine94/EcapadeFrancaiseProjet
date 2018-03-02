<?php

$ourmail = 'cousinlaurine94260@gmail.com';

if(!isset($_POST['id_name'])){
    $id_name = $_POST['id_name'];
}
else{
    $id_name='';
}
if(!isset($_POST['id_number'])){
    $id_number = $_POST['id_number'];
}
else{
    $id_number='';
}
if(!isset($_POST['id_airport_of_arrival'])){
    $id_airport_of_arrival = $_POST['id_airport_of_arrival'];
}
else{
    $id_airport_of_arrival='';
}
if(!isset($_POST['id_email'])){
    $id_email = $_POST['id_email'];
}
else{
    $id_email='';
}

if(!isset($_POST['id_terminal'])){
    $id_terminal = $_POST['id_terminal'];
}
else{
    $id_terminal='';
}
if(!isset($_POST['id_estimated_time_of_departure_from_the_airport'])){
    $id_estimated_time_of_departure_from_the_airport = $_POST['id_estimated_time_of_departure_from_the_airport'];
}
else{
    $id_estimated_time_of_departure_from_the_airport='';
}
if(!isset($_POST['id_flight_number_and_airline_company'])){
    $id_flight_number_and_airline_company = $_POST['id_flight_number_and_airline_company'];
}
else{
    $id_flight_number_and_airline_company='';
}
if(!isset($_POST['id_number_passengers'])){
    $id_number_passengers = $_POST['id_number_passengers'];
}
else{
    $id_number_passengers='';
}
/*if(!isset($_POST['id_name_guesthouse'])){
    $id_name_guesthouse = $_POST['id_name_guesthouse'];
}
else{
    $id_name_guesthouse='';
}*/
if(!isset($_POST['id_message'])){
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
        ' <br/>
                    airport of arrival:' . $id_airport_of_arrival .
        '<br/>
                    terminal:' . $id_terminal .
        '<br/>
                    estimated time of departure from the airport :' . $id_estimated_time_of_departure_from_the_airport .
        '<br/>
                    flight number and airline company:' . $id_flight_number_and_airline_company .
        ' <br/>
                    number of passengers:' . $id_number_passengers .
        '<br/>
                    name of the guest house during the stay :
        <br/>
                    Message:' . $id_message .
        '<br/>---------------<br/>
                        Ceci est un mail automatique, Merci de ne pas y répondre.
                    </div>
                </body>
            </html>
            ';
mail('gestionreservationsef@gmail.com', "Free car by Escapade Francaise", $message, $header);

header("Location:http://localhost/escapadefrancaise/ihm_en/customer_infos.php")
?>