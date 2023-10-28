<?php
	//Cek Login
	if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
		?>
		<script type="text/javascript">
			alert('Anda Harus Login dahulu, sebelum Masuk :)');
			document.location ='../index.php';
		</script>
	<?php
	};
?>
<center><h1>Welcome</h1></center>