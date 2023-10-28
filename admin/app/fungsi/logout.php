<?php
unset($_SESSION['admin']);
session_destroy();
?>
<script type="text/javascript">
	document.location ='../index.php';
	alert("Jumpa lagi ! :)")
</script>
<?php
exit;
?>