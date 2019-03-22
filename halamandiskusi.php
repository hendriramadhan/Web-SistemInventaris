<?php
include"koneksi.php";
if (isset($_SESSION['pemasok'])) {
	$kode  = $_SESSION['pemasok'];
    
	$query1 = mysql_query("SELECT * FROM pemasok where username = '$kode' ");
				$tampil = mysql_fetch_array($query1);
}

$select = mysql_query("SELECT * FROM  `diskusi` ORDER BY  `diskusi`.`time` DESC ");
?>


<!DOCTYPE html>

<html>
    <head>
      
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="./bootstrap-3.3.7-dist/styles.css" rel="stylesheet" type="text/css">
    </head>
    <header></header>

    <body > 
		
             <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">




        <p>&nbsp;</p>
        <div class="scrollbar" id="barstyle" style="background-color: #3787BE" >
            <br>
            <div class="force-overflow">
			<div class="media media-bottom " >
			<form action="tambahdiskusi.php" method="post" enctype="multipart/form-data">
                <textarea class="panel" rows="2" cols="50" name="pesan" style="resize: none" placeholder="Masukan komentar..." required></textarea>
                    <button style="background-color:#3787BE " type="submit" name="submit" class="btn  btn-lg btn-info pull-right"><i class="glyphicon glyphicon-send"></i></button>
					<input type="hidden" name="nama"  value="<?php echo "$tampil[no_pemasok]"; ?>">
			  </form>
			</div>
                <?php
                while ($row = mysql_fetch_assoc($select)) {
				$query2 = mysql_query("SELECT * FROM pemasok where no_pemasok = '$row[no_pemasok]'");
						$kat = mysql_fetch_array($query2);
                    
                    echo '<div class="media media-bottom " ><b>&nbsp' .$kat['nama'].'</b>&nbsp<br><p>
                          '.$row['pesan'].'<br><div class="help-block pull-right" style="font-size: 13px">
                              '.$row['time'].'</div>
                    
                </div>';
                }
                ?>
            </div>
        </div>

    </body>