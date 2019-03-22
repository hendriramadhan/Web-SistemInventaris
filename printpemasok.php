<?php
include ('pdf/class.ezpdf.php');
$pdf = new Cezpdf();

$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Helvetica.afm');

$all= $pdf->openObject();

$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('foto/Logo Unix copy.png',20,800,69);

$pdf->addText(190, 820, 14,'<b>SISTEM INVENTARIS UNIKS</b>');
$pdf->addText(190, 790, 14,'<b>LAPORAN DATA PEMASOK</b>');

$pdf->line(10, 780, 578, 780);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

include "koneksi.php";
$sql = mysql_query("select * from pemasok order by nama asc");
$i=1;
while($r = mysql_fetch_array($sql)){
	$data[$i]=array('<b>No</b>'=>$i,
	                '<b>Nama Pemasok</b>'=>$r[nama],
					'<b>Alamat</b>'=>$r[alamat],
					'<b>Status Pemasok</b>'=>$r[status]);
$i++;
}
$pdf->ezTable($data, '', '', '');

$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
?>