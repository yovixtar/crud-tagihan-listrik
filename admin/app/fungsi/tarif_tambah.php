<?php  
	if (isset($_POST['save'])) { //jika mendapat POST save
		
		//memasukan tarif yang dibuat
		$query = "INSERT INTO tarif SET kode = '".$_POST['kode']."', daya = ".$_POST['daya']." , tarif_perKWH = '".$_POST['tarif']."' ";
		$stat = mysqli_query($l , $query) or die(mysqli_error($l)); 

		if ($stat) {
			?>
		<script type="text/javascript">
			alert("Data Berhasil di Tambah");
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
<center><h1>Tambah Tarif</h1></center>
<form action="" method="POST">
	<input type="text" name="kode" class="input-data"><br />
	<label>Kode</label><br /><br />
	
	<input type="number" name="daya" class="input-data"><br />
	<label>Daya</label><br /><br />
	
	<input type="number" name="tarif" class="input-data"><br />
	<label>Tarif perKWH</label><br /><br />
	
	<input type="submit" name="save" value="Simpan" class="input-save">
</form>
</div>