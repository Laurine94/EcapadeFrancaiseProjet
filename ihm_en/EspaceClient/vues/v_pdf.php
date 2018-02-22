<?php

include_once('include/pdf.class.php');
$buffer = ob_get_clean();

//adresse de l'entreprise
$adresse = "76 Bis Rue de Rennes ";
$cp = "75006 Paris FRANCE";
$mail = "info@escapadefrancaise.com";
$tel = "Tel: +33 7 69 50 95 88";

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

//affichage de l'adresse d'escapade francaise
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Text(10, 55, $adresse);
$pdf->Text(10, 60, $cp);
$pdf->SetFont('Arial', '', 12);
$pdf->Text(10, 65, $mail);
$pdf->Text(10, 70, $tel);

//affichage des informations du client
$pdf->Text(150, 60, utf8_decode($reservationf['prenom_client']) . ' ' . utf8_decode($reservationf['nom_client']));
$pdf->Text(150, 65, utf8_decode($reservationf['adresse_client']));
$pdf->Text(150, 70, $reservationf['zip_client'] . ' ' . utf8_decode($reservationf['ville_client']));
$pdf->Ln(10);

//Ajoute une image
$pdf->Ln(10);
$pdf->Image('../img/logos/logo_basic.JPEG', 10, 10, 50, 35);
$pdf->Ln(48);

$pdf->SetFillColor(232, 0, 232);
//$pdf->SetDrawColor(229, 134, 105);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, utf8_decode('Facture n°' . $reservationf['num_res'] . ' du ' . $reservationf['date_res']), 1, 1, 'C');

$pdf->Ln(10);
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Text(10, 95, utf8_decode("Maison d hôte : " . $reservationf['nom_mh']));

$pdf->SetFont('Arial', 'B', 10);
$pdf->Text(10, 105, utf8_decode("Voyageurs : "));
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
foreach ($lesVoyageurs as $unVoyageur) {
    $nomVoyageur = $unVoyageur['nom_voyageur'];
    $prenomVoyageur = $unVoyageur['prenom_voyageur'];
    $pdf->MultiCell(60, 5, utf8_decode($nomVoyageur . " " . $prenomVoyageur));
}
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Text(120, 105, utf8_decode("Réservation du ".$reservationf['date_debut']) . ' au ' . utf8_decode($reservationf['date_fin']));
$pdf->Ln(10);

$pdf->Ln(50);



$entete = array('Reservation', 'Nombre de voyageurs', 'Nombre de nuit', 'Total');
$pdf->entete($entete);
$pdf->Ln(30);

$pdf->table($entete, $donneeRes);

$pdf->Ln(10);

$pdf->SetX(110);
$pdf->Cell(40, 10, utf8_decode("TOTAL HT "), 1, 0, 'C');
$pdf->Cell(40, 10, $reservationf['prix_res'], 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX(110);
$pdf->Cell(40, 10, utf8_decode("Taxe séjour "), 1, 0, 'C');
$pdf->Cell(40, 10, 0, 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX(110);
$pdf->Cell(40, 10, "Montant de TVA ", 1, 0, 'C');
$pdf->Cell(40, 10, $reservationf['prix_res'] * 0.20, 1, 0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(110);
$pdf->Cell(40, 10, "TOTAL TTC", 1, 0, 'C');
$pdf->Cell(40, 10, $reservationf['prix_res'] + $reservationf['prix_res'] * 0.20 . " euros", 1, 0, 'C');

/*
  //$pdf->Cell(40,10, print_r(array_map("array_sum", $fraisf)),1, 0 ,'C' );
  //$pdf->Cell(40,10, print_r($subtotalff),1, 0 ,'C' );

  $pdf->Ln(10);
  $pdf->Ln(10);

  $pdf->SetX(110);
  $pdf->Cell(60,10, "Fait à Paris le  ".$dateActuelle,'C' );
  $pdf->Ln(10);

  $pdf->SetX(110);
  $pdf->Cell(60,10, "Vu l'agent comptable  ",'C' );

  $pdf->SetX(110);
  $pdf->Image('images/signature.jpg',110,250, 50, 35); */





$pdf->Output(); //Salida al navegador

