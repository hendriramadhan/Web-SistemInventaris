<?php
include"koneksi.php";
	include"menu.php";
	$kode2  = $_SESSION['admin'];
	$kode  = $_SESSION['pemasok'];
    
	$query1 = mysql_query("SELECT * FROM pemasok where username = '$kode' ");
				$tampil = mysql_fetch_array($query1);
	$query3 = mysql_query("SELECT * FROM admin where username = '$kode2' ");
				$tampil2 = mysql_fetch_array($query3);



$select = mysql_query("SELECT * FROM  `diskusi` ORDER BY  `diskusi`.`time` DESC ");
?>


<!DOCTYPE html>

<html>
    <head>
      
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <header></header>

    <body > 
		

<div class="badan">
<div class="content">
<div id="utama">
             <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <link href="./css2/styles.css" rel="stylesheet" type="text/css">



        <center>
          <p align="center"><strong>Forum Diskusi</strong></p>
		   <p align="center">&nbsp;</p>
		   <hr width="1000"/>
		   <p>&nbsp;</p>
        </center>
        <div class="scrollbar" id="barstyle" style="background-color: #3787BE" >
            <br>
            <div class="force-overflow">
			<div class="media media-bottom " >
			<form action="tambahdiskusi.php" method="post" enctype="multipart/form-data">
                
							<textarea  class="panel" rows="3" cols="50" name="pesan" style="resize: none" placeholder="Masukan komentar..." required></textarea>
                    <button type="submit" class="testbutton">Kirim</button>
					<?php if (isset($_SESSION['admin'])) {
					echo"<input type='hidden' name='nama'  value='$tampil2[no_admin]'>"; }
					?>
					<?php if (isset($_SESSION['pemasok'])) {
					echo"<input type='hidden' name='nama'  value='$tampil[no_pemasok]'>"; }
					?>
			  </form>
			</div>
                <?php
                while ($row = mysql_fetch_assoc($select)) {
				$query2 = mysql_query("SELECT * FROM pemasok WHERE no_pemasok = '$row[no_pemasok]'");
						$kat = mysql_fetch_array($query2); 
				$query4 = mysql_query("SELECT * FROM admin WHERE no_admin = '$row[no_pemasok]'");
						$kat2 = mysql_fetch_array($query4);		  
                    echo '<br><div class="media media-bottom " >'; 
					?>
					
					<?php
					   echo'<b>&nbsp'.$kat['nama'].''.$kat2['nama'].'</b>&nbsp<br><p><br>
	                    			'.$row['pesan'].'<br><div class="help-block pull-right" style="font-size: 13px"><br>
                            <center>'.$row['time'].'</center></div></div><br>';
							 ?>
							
				
               <?php } ?>
            </div>
			
        </div>

</div>
</div>
</div>
    </body>
<?php
include"footer.php"
?>