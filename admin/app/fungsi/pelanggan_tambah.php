<?php  
	//jika mengklik simpan/save
	if (isset($_POST['save'])) {
		//memasukan data pelanggan baru
		$query = "INSERT INTO pelanggan SET nama = '".$_POST['nama']."', alamat = '".$_POST['alamat']."' , kodeTarif = '".$_POST['kode']."' ";
		$stat = mysqli_query($l , $query) or die(mysqli_error($l)); 

		//memilih tarif dari kode yg dipilih
		$s1=mysqli_query($l,"SELECT * FROM tarif WHERE kode = '".$_POST['kode']."'") OR DIE(mysqli_error($l));
		$d1=mysqli_fetch_array($s1);
		
		//jika berhasil memasukan pelanggan
		if ($stat) {
		$date=date('Y-m-d'); //jukut tanggal saiki
		
		//memilih pelanggan tadi
		  $s2 = mysqli_query($l,"SELECT * FROM pelanggan WHERE nama = '".$_POST['nama']."'");
		  $d2 = mysqli_fetch_array($s2);
		  
		//membuat tagihan dari pelanggan tadi
		mysqli_query($l,"INSERT INTO tagihan SET waktu_awal='".$date."' , waktu_akhir='".$date."', pelanggan_id=".$d2['id']." ") OR DIE(mysqli_error($l));
		
			?>
		<script type="text/javascript">
			alert("Data Berhasil di Tambah");
			document.location = 'index.php?page=pelanggan'
		</script>
<?php
		} else {
?>
		<script type="text/javascript">
			alert("Gagal Mengubah data ....");
			document.location = 'index.php?page=pelanggan'
		</script>
<?php
		}
	}

?>
<div>
<center><h1>Tambah Pelanggan</h1></center>
<form action="" method="POST">
	<input type="text" name="nama" class="input-data"><br />
	<label>Nama</label><br /><br />
	
	<textarea cols="50" rows="5" name="alamat" class="input-data"></textarea><br />
	<label>Alamat</label><br /><br />
	
	<select name="kode" title="Pilih Kode" class="input-data">
                    <?php
                    //menampilkan tarif
                    $qnya="SELECT * from tarif";
                    $sku = mysqli_query($l , $qnya);
        
                        while ($dat = mysqli_fetch_array($sku)) {
                    ?>
                        <option value="<?php echo $dat['kode'] ?>">
                        <?php echo $dat['daya']."A / Rp ". number_format($dat['tarif_perKWH'],0); ?>
                        </option>
                    <?php 
                    }
                    ?>
    </select><br />
	<label>daya / Tarif</label><br /><br />
	
	<input type="submit" name="save" value="Simpan" class="input-save">
</form>
</div>