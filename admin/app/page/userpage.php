<center>
	<h1>User Page</h1>
</center>
	<div class="div-kotak">
		<?php
		//memilih data user dari login
		$query_tagihan="SELECT *, pelanggan.id as id_pelanggan, tagihan.status as status_tagihan FROM tagihan join pelanggan on tagihan.pelanggan_id=pelanggan.id join tarif on pelanggan.kodeTarif=tarif.kode WHERE pelanggan.id =".$_POST['idx']." AND pelanggan.nama='".$_POST['nama']."' ";
		$stat_tagihan=mysqli_query($l,$query_tagihan);
		$data_tagihan=mysqli_fetch_array($stat_tagihan);
		
		//jika tidak ada nama & id yang dimaksud
		if (empty($data_tagihan['nama']) && empty($data_tagihan['id_pelanggan'])) {
			?>
		<script type="text/javascript">
			alert('Masukan Nama dan ID user yang benar');
			document.location='index.php?page=login';
		</script>
		<?php
		}else{ //jika ada usernya
			
			if ($data_tagihan['status_tagihan'] == 1) {	//jika status tagihan belum terbayar		
			?>
		<h3>Tagihan <?php echo $data_tagihan['nama'] ?></h3>
			<p>Lama Pemakaian Listrik = <?php echo $data_tagihan['pemakaian']." Hari" ?> , dengan biaya sebesar = Rp <?php echo number_format($data_tagihan['tagihan'],0); ?> </p>
			<p><a href="index.php?page=bayar&idx=<?php echo $data_tagihan['id_tagihan'] ?>">Bayar Tagihan</a></p>
		<?php
		}elseif($data_tagihan['status_tagihan'] == 2){ //jika tagihan sudah dibayar
			?>
			<h3>Menunggu Verifikasi Admin</h3>
			<?php
		}
	
	}
	//memilih data struk si pelanggan
		$stat_struk=mysqli_query($l,"SELECT * FROM struk WHERE id_pelanggan =".$_POST['idx']." ORDER BY id_struk DESC")OR DIE(mysql_error($l));
		$data_struk=mysqli_fetch_array($stat_struk);
		
		//jika tidak memiliki struk
		if (empty($data_struk['id_pelanggan'])) {
			
		}else{ // jika memiliki struk
		?>
		<h3>Daftar Struk</h3>
		<?php
		//memilih data struk
		$stat_struk2=mysqli_query($l,"SELECT * FROM struk WHERE id_pelanggan =".$_POST['idx']." ORDER BY id_struk DESC")OR DIE(mysql_error($l));
		while ($data_struk2=mysqli_fetch_array($stat_struk2)) {
		?>
		<p><a href="struk.php?idx=<?php echo $data_struk2['id_struk'] ?>">Lihat Struk - <?php echo date('m/Y', strtotime($data_struk2['tanggal_bayar'])) ?></a></p>
		<?php }} ?>
	</div>

		