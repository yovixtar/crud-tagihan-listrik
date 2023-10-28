<?php  
	//memilih data tarif dari GET
	$q_value="SELECT * FROM tarif where id=".$_GET['idx']." ";
	$s_value=mysqli_query($l,$q_value) OR DIE(mysqli_error($l));
	$data_value=mysqli_fetch_array($s_value);
	
	//jika mendapat POST save
	if (isset($_POST['save'])) {
		
		//mengupdate data tarif yang diedit
		$query = "UPDATE tarif SET kode = '".$_POST['kode']."', daya = ".$_POST['daya']." , tarif_perKWH = '".$_POST['tarif']."' WHERE id=".$_GET['idx']." ";
		$stat = mysqli_query($l , $query) or die(mysqli_error($l)); 

		if ($stat) {
			?>
		<script type="text/javascript">
			alert("Data Berhasil di Edit");
			document.location = 'index.php?page=tarif'
		</script>
<?php
		} else {
?>
		<script type="text/javascript">
			alert("Gagal Mengubah data ....");
			document.location = 'index.php?page=tarif'
		</script>
<?php
		}
	}

?>
<div>
<center><h1>Update Tarif</h1></center>
<form action="" method="POST">
	<input type="text" name="kode" class="input-data" value="<?php echo $data_value['kode'] ?>"readonly><br />
	<label>Kode</label><br /><br />
	
	<input type="number" name="daya" class="input-data" value="<?php echo $data_value['daya'] ?>"><br />
	<label>Daya</label><br /><br />
	
	<input type="number" name="tarif" class="input-data" value="<?php echo $data_value['tarif_perKWH'] ?>"><br />
	<label>Tarif perKWH</label><br /><br />
	
	<input type="submit" name="save" value="Simpan" class="input-save">
</form>
</div>