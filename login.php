<?php
include"menu.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<div class="badan">
		  <div class="content">
<div id="utama">
<center>
<div class="log">


<h3>Form Login</h3>
<form action="proses_login.php" method="post">
	<input type="text" name="username" required placeholder="username" class="username"><br>
	<input type="password" name="password" required placeholder="password" class="ps"><br>
	<label><input type="radio" name="login_type" value="pemasok" checked>Pemasok</label>
	<label ><input name="login_type" align="left" type="radio" value="admin" >Admin</label>
	<input type="submit" value="Login">
</form>
</div>
</center>
</div>
</div>
</div>
<?php
include"footer.php";
?>