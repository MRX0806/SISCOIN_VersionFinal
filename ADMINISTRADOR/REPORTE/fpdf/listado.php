<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('logo.PNG', 173, 10, 25);
        // Arial bold 15
        $this->SetTextColor(255, 0, 0); 
        $this->SetFont('Arial', 'B', 22);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 30, 'LISTADO', 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Función para agregar una lista con título y contador
    function AddList($title, $data)
    {
        // Título
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(255, 0, 0); // Establecer color del texto a rojo
        $this->Cell(0, 10, $title, 0, 1, 'C');
        $this->Ln(5);

        // Datos en formato de oración con contador
        $this->SetFont('Arial', '', 11);
        $this->SetTextColor(0); // Establecer color del texto a negro
        $counter = 1;
        foreach ($data as $row) {
            $line = $counter . ". " . utf8_decode($row['nombre']) . 
                    " " . utf8_decode($row['apellido']) . 
                    " cursando la carrera de " . utf8_decode($row['carrera']) . 
                    ", ciclo " . utf8_decode($row['ciclo']);
            
            // Imprimir línea
            $this->MultiCell(0, 10, $line);
            $this->Ln(3); // Espacio entre líneas
            $counter++;
        }
        $this->Ln(10); // Espacio entre listas
    }
}

require 'cn.php';

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

// Función para obtener datos de la base de datos
function getData($mysqli, $query) {
    $result = $mysqli->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

// Lista: Estudiantes Nuevos
$title = "Lista de Alumnos";
$query = "SELECT nombre, apellido, carrera, ciclo FROM estudiante";
$data = getData($mysqli, $query);
$pdf->AddList($title, $data);

$pdf->Output();
?>
