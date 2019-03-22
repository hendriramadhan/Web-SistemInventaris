<?php
	include"koneksi.php";
	$query = mysql_query("SELECT * FROM pemasok WHERE status LIKE 'aktif%' order by nama asc");
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
    <tr> </tr>
    <tr>
      <th>No</th>
      <th>Nama Pemasok</th>
      <th>Alamat</th>
      <th>Status Pemasok</th>
	  <?php
		if (isset($_SESSION['admin'])) {
			?>
      <th colspan="2">Aksi</th>
     
	  <?php } ?>
    </tr>
    <?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;?>
    <?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '#ffffff';
			}
			else{ 
				$warna = '#ffffff';
			} 
			echo" bgcolor='$warna'>"; ?>
  <td><?php echo "$no"; ?></td>
    <td><?php echo "$tampil[nama]"; ?></td>
    <td><?php echo "$tampil[alamat]"; ?></td>
    <td><?php echo "$tampil[status]"; ?></td>
	
	<?php
		if (isset($_SESSION['admin'])) {
			?>
    <td><a href="hapuspemasokaktif.php?no=<?php echo "$tampil[no_pemasok]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[nama]"; ?>" /></a></td>
  </tr>
  <?php
			}
		?>
  <?php
			}
		?>
  <tr>
    <th colspan="<?php if (isset($_SESSION['admin'])) {
			echo "4";
		}else{ echo "2";} ?>" align="left">Jumlah : <?php echo "$cek"; ?> Pemasok Aktif</th>
  </tr>
  </table>
  <p>
    <!-- TAMBAH --></p>
 </div>
		</center>
</div>

<?php
include"footer.php"
?>