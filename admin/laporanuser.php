<?php
include 'koneksi.php';
include 'fpdf/fpdf.php';
$pdf = new FPDF("L","cm","A4");
$pdf->SetMargins(2.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"DATA USER",0,10,'C');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,28.5,3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(2,0.8,'NO',1,0,'C');
$pdf->Cell(5,0.8,'nim',1,0,'C');
$pdf->Cell(7,0.8,'nama',1,0,'C');
$pdf->Cell(5,0.8,'email',1,0,'C');
$pdf->Cell(5,0.8,'no_tlp',1,1,'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query = mysqli_query($koneksi,"select * from peminjam");
while($lihat= mysqli_fetch_array($query)){
    $pdf->Cell(2,0.8,$no,1,0,'C');
    $pdf->Cell(5,0.8,$lihat['nim'],1,0,'C');
    $pdf->Cell(7,0.8,$lihat['nama'],1,0,'C');
    $pdf->Cell(5,0.8,$lihat['email'],1,0,'C');
	$pdf->Cell(5,0.8,$lihat['no_tlp'],1,1,'C');
    $no++;
}
$pdf->Output("user.php","I");
?>