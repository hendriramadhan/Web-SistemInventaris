<?php
	include"koneksi.php";
	$query = mysql_query("SELECT * FROM barang WHERE keterangan LIKE 'Rusak%' order by barang asc");
		$cek = mysql_num_rows($query);
	include"menu.php";
?><head><title>judul</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>	

<div class="badan">
<div class="content">
<div id="utama">
<center>
	 <table border="1">
  <tr>
	<th>No</th>
	<th>Nama Barang</th>
	<th>Jenis Barang</th>
	<th>Jumlah</th>
	<th>keterangan barang</th>
	<th>Nama Pemasok</th>
	
				<th colspan="2">Pilihan</th>
					
				
	   </tr>
		<?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;
					$query2 = mysql_query("SELECT * FROM pemasok where no_pemasok = '$tampil[no_pemasok]'");
						$kat = mysql_fetch_array($query2);
				?><?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '';
			}
			else{ 
				$warna = '';
			} 
			echo" bgcolor='$warna'>"; ?>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$tampil[barang]"; ?></td>
					<td><?php echo "$tampil[jenis]"; ?></td>
					<td><?php echo "$tampil[jumlah]"; ?></td>
					<td><?php echo "$tampil[keterangan]"; ?></td>
					<td><?php echo "$kat[nama]"; ?></td>
						
					<?php
							if (isset($_SESSION['admin'])) {
							?>
					<td><a href="hapusbarangrusak.php?kode=<?php echo "$tampil[no_barang]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[barang]"; ?>"></a></td>
					<?php } ?>
							<?php
						}
					?>
					</tr>
				
		<tr><th colspan="10" align="left">Jumlah : <?php echo "$cek"; ?> Barang Rusak</th></tr>
	</table>



</center>
</div>
<?php
include"footer.php"
?>