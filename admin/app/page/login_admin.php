<?php

//perintah session start jangan lupa !!
session_start();

if (isset($_POST['login'])) {
	$admin='sri asih'; //isi admin terserah
	$password = md5('sriasih'); //isi password terserah

	if ($_POST['admin'] == $admin && md5($_POST['pass']) == $password) {
		$_SESSION['admin'] = $admin;
?>
		<script type="text/javascript">
			document.location = "admin/index.php?page=home"
		</script>
<?php
	}else{
?>

 		<script type="text/javascript">
 			alert('Admin Tidak Terdaftar, Mohon Masuk Sebagai Admin.');
 			document.location = "index.php"
 		</script>
<?php
}
};
?>

<center>
		 <h1>Login Admin :</h1>
		 <form action="" method="POST">
		 	<input type="text" name="admin" placeholder="Nama Admin" style="height: 35px; width: 40%;border-top-right-radius: 10px;border-top-left-radius: 10px; border:1px solid #3385ff"><br />
		 	<input type="password" name="pass" placeholder="Password Admin" style="height: 35px; width: 40%;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px; border:1px solid #3385ff"><br />
		 	<input type="submit" name="login" value="Login" class="input-save" style="margin-top: 5px;">
		 </form>
</center>