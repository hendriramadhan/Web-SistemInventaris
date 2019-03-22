<?php
	session_start();
	include"koneksi.php";
?>
<html>
	<link rel="shortcut icon" href="foto/logo unix copy.png" />
	<style type="text/css">
<!--
.style7 {font-size: 24px; font-weight: bold; }
-->
    </style>
	<head><title>Sistem Inventaris UNIKS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css3/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	<div class="wrap">
		<div class="header">
		  <table>
		  <td><a href="index.php"><img src="foto/Logo Unix copy.png" width="93" height="90"></a>
		  <td><p class="style7"> Sistem Inventaris</p>
		    <p class="style7">Univesitas Islam Kuantan Singingi</p></td>
		  </td></table></div>
		
		
		
 
        <?php if (isset($_SESSION['admin'])) {   ?>
 <ul id="menu-bar">
 <li class="active"><a href="index.php">Home</a></li>
   <li><a href="#">Barang</a>	
	<ul>
		<li><a href="databarang.php">Data Barang</a></li>
		<li><a href="barangperbaikan.php">Data Barang Perbaikan</a></li>
   		<li><a href="barangrusak.php">Data Barang Rusak</a></li>
		
	</ul>
 	</li>
 <li><a href="#">Pemasok</a>
  <ul>
  <li><a href="datapemasok.php">Data Pemasok</a></li>
   <li><a href="pemasokaktif.php">Pemasok Aktif</a></li>
   <li><a href="pemasoknonaktif.php">Pemasok Nonaktif</a></li>
   
  </ul>
 </li>
<li><a href="diskusi.php">Diskusi</a></li>
<li><a href="pesanmasuk.php">Pesan</a></li>
<li><a href="logout.php" onClick="return confirm('Anda yakin ingin keluar ?')">Logout</a></li> 
</ul>


     <?php } else if (isset($_SESSION['pemasok'])) {   ?>
 <ul id="menu-bar">
 <li class="active"><a href="index.php">Home</a></li>
   <li><a href="#">Barang</a>	
	 <ul>
		<li><a href="databarang.php">Data Barang</a></li>
		<li data-toggle="modal" data-target=".tambah-barang"><a href="#">Tambah Barang</a></li>
		
	</ul>
 	</li>
 <li><a href="#">Pemasok</a>
  <ul>
  <li><a href="datapemasok.php">Data Pemasok</a></li>
  <li><a href="akun.php">Edit Akun Anda</a></li>
  </ul>
 </li>
 <li><a href="diskusi.php">Diskusi</a></li>
<li><a href="logout.php" onClick="return confirm('Anda yakin ingin keluar ?')">Logout</a></li> 
</ul>

<div class="modal fade tambah-barang" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only"></span></button>
<center>
<?php if (isset($_SESSION['pemasok'])) {
			$kode  = $_SESSION['pemasok'];
			$query2 = mysql_query("SELECT * FROM pemasok where username = '$kode' ");
				$tampil = mysql_fetch_array($query2);
				
?>
			<div id="tambah">
			<form action="tambahbarangpemasok.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Tambah Barang</th></tr>
					<tr><td>Nama Barang</td><td><input type="text" name="barang" required placeholder='Nama Barang'></td></tr>
					<tr><td>Jenis Barang</td><td><input type="text" name="jenis" required placeholder='Jenis Barang'></td></tr>
					<tr><td>Jumlah Barang</td><td><input type="number" name="jumlah" required placeholder='Jumlah Barang'></td></tr>
					<tr><td valign="top">Keterangan Barang</td>
    					<td valign="top"> 
      						<select name="keterangan">
								<option value="Bagus">Bagus</option>
								<option value="Perbaikan">Perbaikan</option>
								<option value="Rusak">Rusak</option>
							</select></td></tr>
				
					<tr><td colspan="2" ><input type="submit" value="Tambah"></td></tr>
					</table>
				<input type="hidden" name="nama"  value="<?php echo "$tampil[no_pemasok]"; ?>">
			</form>
			</div>
			<?php } ?>
</center>
</div>
</div></div>
      </div>


<?php } else{ ?>

<ul id="menu-bar">
  <li class="active"><a href="index.php">Home</a></li>
 
  <li><a href="databarang.php">Data Barang</a></li>		
  

   <li><a href="datapemasok.php">Data Pemasok</a></li>
  
 <li><a href="pesan.php">Hubungi Kami</a></li>
 <li><a href="tentang.php">Tentang Kami</a></li>
<li><a href="#">Login</a>
 <ul>
  <li data-toggle="modal" data-target=".bs-example-modal-sm"><a href="#">Login</a></li>
  <li data-toggle="modal" data-target=".daftar"><a href="#">Daftar</a></li>		
  </ul>
 </li> 
</ul>


<div class="modal fade daftar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only"></span></button>
<center>
<h3>Daftar Pemasok</h3>

	<form action="prosesdaftar.php" method="post" enctype="multipart/form-data">
	<table>
	<tr><td>Nama</td><td><input type="text" name="nama" placeholder="Masukan Nama Anda" required></td></tr>
	<tr><td>Alamat</td><td><input type="text" name="alamat" required placeholder="Masukan Alamat Anda"></td></tr>		
	<tr><td>Username</td><td><input type="text" name="username" required placeholder="Masukan Username Anda"></td></tr>
	<tr><td>Password</td><td><input type="password" name="password" required placeholder="Masukan Password Anda"></td></tr>
	<tr><td>Ulangi Password</td><td><input type="password" name="password2" required placeholder="Ulangi Password"></td></tr>	
	<tr><td colspan="2"><label align='left'><input type="checkbox" name="cek" required>Saya bertanggung jawab atas data yang saya buat ini
		</label><strong><input type="submit" value="Daftar"></strong></td></tr>
	</table>
	<input type="hidden" name="status" value='Aktif'>
	</form>
</center>
</div>
</div></div>
      </div>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only"></span></button>
<center>
<h3>Form Login</h3>
<form action="proses_login.php" method="post">
	<input type="text" name="username" required placeholder="username" class="username"><br>
	<input type="password" name="password" required placeholder="password" class="ps"><br>
	<label><input type="radio" name="login_type" value="pemasok" checked>Pemasok</label>
	<label ><input name="login_type" align="left" type="radio" value="admin" >Admin</label>
	<input type="submit" value="Login">
</form>
</center>
</div>
</div></div>
      </div>
    
  		
<?php }  ?>
	</div>
	

<style>
body { background-color: #fff; color: #000; padding: 0; margin: 0; }
.container { width: 750px; margin: auto; padding-top: 1em; }
.container .ism-slider { margin-left: auto; margin-right: auto; }
</style>

<link rel="stylesheet" href="ism/css/my-slider.css"/>
<script src="ism/js/ism-2.2.min.js"></script>

</head>
<body>
<div class='container'>

<div class="ism-slider" data-play_type="loop" data-transition_type="fade" data-interval="3000" id="my-slider">
  <ol>
    <li>
      <img src="ism/image/slides/uniks1.jpg">
      <div class="ism-caption ism-caption-0">Sistem Inventaris UNIKS</div>
    </li>
    <li>
      <img src="ism/image/slides/uniks2.png">
      <div class="ism-caption ism-caption-0">Sistem Inventaris UNIKS</div>
    </li>
  </ol>
</div>
<p class="ism-badge" id="my-slider-ism-badge"><a class="ism-link" href="http://imageslidermaker.com" rel="nofollow"></a></p>


	</div>
	<script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

