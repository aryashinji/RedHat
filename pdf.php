<?php
ob_start();

#ambil data di tabel dan masukkan ke array
include "konek.php";
session_start();
$bln = $_SESSION['bulan'];
$thn = $_SESSION['tahun'];
$query = oci_parse($conn,"select T.ID_Transaksi, T.ID_Tempat, T.Tanggal, M.Nama_Menu, M.Harga FROM transaksi T, pemesanan P, menu M 
								WHERE T.ID_Transaksi = P.ID_Transaksi
								and P.Nama_Menu = M.Nama_Menu and TO_NUMBER(TO_CHAR(TO_DATE(T.Tanggal,'DD-MM-YY'),'YYYY')) = '$thn' 
								and TO_NUMBER(TO_CHAR(TO_DATE(T.Tanggal,'DD-MM-YY'),'MM')) =  '$bln' 
								and T.Status_Transaksi = '1'");
oci_execute($query);
$data = array();
while ($row = oci_fetch_assoc($query)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabel
$judul = "DATA LAPORAN KEUANGAN BULANAN";
$header = array(
array("label"=>"ID Transaksi", "length"=>30, "align"=>"C"),
array("label"=>"ID Tempat", "length"=>30, "align"=>"C"),
array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
array("label"=>"Nama Menu", "length"=>50, "align"=>"C"),
array("label"=>"Harga", "length"=>25, "align"=>"C")
);
 
#sertakan library FPDF dan bentuk objek
require_once ("fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(0,128,128);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
$pdf->Cell($kolom['length'], 9, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 9, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}
ob_end_clean(); 
#output file PDF
$pdf->Output(); 
?>