<?php

require('fpdf/fpdf.php');

class PDF extends FPDF {

    function entete($entete) {
        
        $this->SetFillColor(25, 89, 0);
        $this->SetDrawColor(96,147,186);
        $this->SetXY(10, 100);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10);
        foreach ($entete as $fil) {
            $this->Cell(45, 10, utf8_decode($fil), 1, 0, 'C');
        }
    }

    function data($data) {
        
        $this->SetXY(10, 110);
        $this->SetFont('Arial', '', 10);

        foreach ($data as $fil) {
            $this->Cell(45, 10, utf8_decode($fil['nom_chambre']), 1, 0, 'C');
            $this->Cell(45, 10, utf8_decode($fil['date_debut']), 1, 0, 'C');
            $this->Cell(45, 10, utf8_decode($fil['date_fin']), 1, 0, 'C');
            $this->Cell(45, 10, utf8_decode($fil['prix_res'] . ' euros'), 1, 0, 'C');
            $this->Ln();
        }
    }
    

    function entete2($entete) {
        $this->SetXY(10, 170);
        $this->SetFont('Arial', 'B', 10);
        foreach ($entete as $fil) {
            $this->Cell(60, 10, utf8_decode($fil), 1, 0, 'C');
        }
    }

    function data2($data) {
        $this->SetXY(10, 180);
        $this->SetFont('Arial', '', 10);

        if ($data) {
            foreach ($data as $fil) {

                $this->Cell(60, 10, utf8_decode($fil['date']), 1, 0, 'C');
                $this->Cell(60, 10, utf8_decode($fil['libelle']), 1, 0, 'C');
                $this->Cell(60, 10, utf8_decode($fil['montant']), 1, 0, 'C');
                $this->Ln();
            }
        } else {
            $this->Cell(60, 10, "0", 1, 0, 'C');
            $this->Cell(60, 10, "0", 1, 0, 'C');
            $this->Cell(60, 10, "0", 1, 0, 'C');
            $this->Ln();
            $this->Ln();
        }
    }

    function table($entete, $data) {
        $this->entete($entete);
        $this->data($data);
    }

    function table2($entete, $data) {
        $this->entete2($entete);
        $this->data2($data);
    }

}

// FIN Class PDF