<?php
//menghapus tarif yang dipilih
if (isset($_POST['no'])) {
	?>
	<script type="text/javascript">document.location='index.php?page=tarif'</script>
	<?php
}elseif(isset($_POST['yes'])){
	$del=mysqli_query($l,"DELETE FROM tarif WHERE id=".$_GET['idx']." ");

	if ($del) {
		?>
		<script type="text/javascript">
			alert('Data Berhasil dihapus !');
			document.location='index.php?page=tarif'
		</script>
		<?php
	}
}
?>

<form action="" method="POST">
<p>Apakah Anda yakin untuk menghapus data ?</p>
<input type="submit" name="no" class="input-save" value="No">
<input type="submit" name="yes" class="input-save" value="Yes">
</form>