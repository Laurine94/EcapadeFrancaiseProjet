<?php

include_once('include/pdf.class.php');
$buffer=ob_get_clean();

$pdf = new PDF();
$pdf->AddPage();
//Ajoute une image
$pdf->Image('images/logo.jpg',80,10, 50, 35);
$pdf->Ln(48);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(185,10,'REMBOURSEMENT DE FRAIS ENGAGES',1,1,'C');

$pdf->Ln();
$pdf->Cell(60,10,'Visiteur : ');
$pdf->Cell(60,10,$infoVisiteur['id']);
$pdf->Cell(60,10,$infoVisiteur['prenom']." ".$infoVisiteur['nom']);
$pdf->Ln();

$pdf->Cell(60,10,'Mois : ');
$pdf->Cell(60,10,$leMoisformat);

$pdf->Ln(48);


$entete= array('Frais Forfaitaires', 'Quantité', 'Montant unitaire', 'Total');
$pdf->entete($entete);
$pdf->Ln(10);

//
$pdf->table($entete, $fraisf);

$pdf->Ln(10);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(180,10,'Autres frais',0,1,'C');

$entete2= array('Date', 'Libelle', 'Montant');
$pdf->entete2($entete2);

$pdf->Ln(10);


$pdf->table2($entete2, $fraisHF);


$pdf->Ln(10);


$pdf->SetX(110);
$pdf->Cell(40,10, "TOTAL ".$leMoisformat,1, 0 , 'C' );
$pdf->Cell(40,10, $subtotalff+$subtotalfhf,1, 0 , 'C' );


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
$pdf->Image('images/signature.jpg',110,250, 50, 35);




 
$pdf->Output(); //Salida al navegador

