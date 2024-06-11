<?php
include '../../conexion.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Reporte de Temas',0,1,'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function FancyTable($header, $data)
    {
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        foreach($header as $col) {
            $this->Cell(50,7,$col,1);
        }
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(50,6,$col,1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

try {
    $sql = "SELECT tema_id, nombre, descripcion FROM temas";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $data = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array($row['tema_id'], $row['nombre'], $row['descripcion']);
        }

        $header = array('ID Tema', 'Nombre', 'Descripción');

        $pdf->FancyTable($header, $data);
    } else {
        $pdf->Cell(0,10,'No hay temas en la base de datos',1,1,'C');
    }
} catch (PDOException $e) {
    $pdf->Cell(0,10,'Error al obtener los datos: '.$e->getMessage(),1,1,'C');
}

$pdf->Output();
?>
