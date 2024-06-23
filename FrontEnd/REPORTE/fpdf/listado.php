<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('logo.PNG', 173, 10, 25);
        // Arial bold 20
        $this->SetTextColor(255, 0, 0);
        $this->SetFont('Arial', 'B', 22);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 23, 'Reporte de Estudiantes', 0, 0, 'C');
        // Salto de línea
        $this->Ln(31);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        // Marca de agua (simulación de transparencia)
        $this->SetFillColor(240, 240, 240); // Fondo blanco para simular transparencia
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 0, '', 0, 1, 'C', true, 'logo.PNG'); // Celda transparente con imagen de marca de agua
        // Número de página
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Función para agregar la tabla de estudiantes
    function AddStudentsTable($title, $header, $data)
    {
        // Título
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(173, 216, 230); // Fondo celeste para el título
        $this->SetTextColor(0); // Texto negro para el título
        $this->Cell(0, 10, $title, 1, 1, 'C', true);
        $this->Ln(5);

        // Cabecera
        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(173, 255, 173); // Fondo verde claro para la cabecera
        $this->SetTextColor(0); // Texto blanco para la cabecera
        $this->SetDrawColor(0); // Borde negro para la cabecera
        $this->Cell(10, 10, '#', 1, 0, 'C', true); // Columna para contador
        foreach ($header as $col) {
            $this->Cell($col['width'], 10, $col['label'], 1, 0, 'C', true);
        }
        $this->Ln();

        // Datos
        $this->SetFont('Arial', '', 11);
        $this->SetFillColor(255); // Fondo blanco para los datos
        $this->SetTextColor(0); // Texto negro para los datos
        $this->SetDrawColor(0); // Borde negro para los datos
        $counter = 1;
        foreach ($data as $row) {
            $this->Cell(10, 10, $counter, 1, 0, 'C'); // Contador
            foreach ($header as $col) {
                $this->Cell($col['width'], 10, utf8_decode($row[$col['field']]), 1, 0, 'C');
            }
            $this->Ln();
            $counter++;
        }
        $this->Ln(5); // Espacio entre tablas
    }
}

require 'cn.php'; // Archivo de conexión a la base de datos

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

// Función para obtener datos de la base de datos
function getData($mysqli, $query)
{
    $result = $mysqli->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

// Tabla: Estudiantes Nuevos
$title = "Lista de Estudiantes";
$header = [
    ['label' => 'NOMBRE', 'width' => 40, 'field' => 'nombre'],
    ['label' => 'APELLIDO', 'width' => 40, 'field' => 'apellido'],
    ['label' => 'CARRERA', 'width' => 68, 'field' => 'carrera'],
    ['label' => 'CICLO', 'width' => 30, 'field' => 'ciclo'],
];
$query = "SELECT nombre, apellido, carrera, ciclo FROM estudiante";
$data = getData($mysqli, $query);
$pdf->AddStudentsTable($title, $header, $data);

$pdf->Output();
?>
