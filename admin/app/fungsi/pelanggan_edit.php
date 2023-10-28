<?php  
    //memilih pelanggan dari GET
    $q_value="SELECT * FROM pelanggan where id=".$_GET['idx']." ";
    $s_value=mysqli_query($l,$q_value) OR DIE(mysqli_error($l));
    $data_value=mysqli_fetch_array($s_value);
    
    if (isset($_POST['save'])) { //jika sudah di klik save
        //mengupdate data yg diedit
        $query = "UPDATE pelanggan SET nama = '".$_POST['nama']."', alamat = '".$_POST['alamat']."' , kodeTarif = '".$_POST['kode']."' WHERE id=".$_GET['idx']." ";
        $stat = mysqli_query($l , $query) or die(mysqli_error($l)); 

        if ($stat) {
            ?>
        <script type="text/javascript">
            alert("Data Berhasil di Edit");
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
<center><h1>Update Pelanggan</h1></center>
<form action="" method="POST">
	<input type="text" name="nama" class="input-data" value="<?php echo $data_value['nama'] ?>"><br />
	<label>Nama</label><br /><br />
	
	<textarea cols="50" rows="5" name="alamat" class="input-data"><?php echo $data_value['alamat'] ?></textarea><br />
	<label>Alamat</label><br /><br />
	
	<select name="kode" title="Pilih Kode" class="input-data">
                    <?php
                    //memilih data tarif
                    $qnya="SELECT * from tarif";
                    $sku = mysqli_query($l , $qnya);
        
                        while ($dat = mysqli_fetch_array($sku)) {
                        //menampilkan tarif
                    ?>
                        <option value="<?php echo $dat['kode'] ?>" <?php if($data_value['kodeTarif'] == $dat['kode']){echo "SELECTED"; } ?>>
                        <?php echo $dat['daya']."A / Rp ". number_format($dat['tarif_perKWH'],0); ?>
                        </option>
                    <?php 
                    }
                    ?>
    </select><br />
	<label>Daya / Tarif</label><br /><br />
	
	<input type="submit" name="save" value="Simpan" class="input-save">
</form>
</div><br />