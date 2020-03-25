<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT P.id_presupuesto, D.nombre, PR.nombre, P.descripcion,P.precio 
                        FROM presupuesto P, diente D, prestaciones PR
                        WHERE P.id_prestaciones = PR.id_prestaciones AND 
                        P.id_diente = D.id_diente ";
	$resultado = $conectar->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,6,'PRESTACION',1,0,'C',1);
	$pdf->Cell(50,6,'DESCRIPCION',1,0,'C',1);
	$pdf->Cell(50,6,'PRECIO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(50,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(50,6,$row['descripcion'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['precio']),1,1,'C');
	}

	

	$query1 = "SELECT SUM(precio) AS Ptotal FROM presupuesto";
	$resultado1 = $conectar->query($query1);

	$row = $resultado1->fetch_assoc();

	$pdf->Cell(50,6,'PRESUPUESTO',1,1,'C',1);
	$pdf->Cell(50,6,$row['Ptotal'],1,0,'C');

	$pdf->Output();
?>