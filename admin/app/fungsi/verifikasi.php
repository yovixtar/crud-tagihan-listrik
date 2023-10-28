<?php
//memilih data pembayaran dari GET
$stat_pilih = mysqli_query($l, "SELECT * FROM pembayaran join tagihan on pembayaran.id_tagihan=tagihan.id_tagihan join pelanggan on tagihan.pelanggan_id=pelanggan.id join tarif on pelanggan.kodeTarif=tarif.kode WHERE id_pembayaran=".$_GET['idx']." ");
$data_pilih = mysqli_fetch_array($stat_pilih);

$total =$data_pilih['jumlah_tagihan'] + $data_pilih['biaya_admin']; //ngitung total pembayaran

$date=date('Y-m-d'); //jukut tanggal saiki

$tarif_pemakaian = $data_pilih['tarif_perKWH'] * 24; //ngitung tarif 1 hari

if ($stat_pilih) {
	//memasukan data struk atau bukti pembayaran ke database
	$stat_1 = mysqli_query($l,"INSERT INTO struk SET id_pelanggan=".$data_pilih['pelanggan_id'].", kodeTarif='".$data_pilih['kodeTarif']."', tagihan =".$total.", id_pembayaran =".$data_pilih['id_pembayaran']." , tanggal_bayar='".$date."' ");
	
	if ($stat_1) { //jika berhasil memasukan struk
		//memasukan tagihan baru untuk bulan baru
		$stat_2 = mysqli_query($l,"INSERT INTO tagihan SET waktu_awal='".$date."' , waktu_akhir='".$date."', tagihan=".$tarif_pemakaian.", pelanggan_id=".$data_pilih['pelanggan_id']." ") OR DIE(mysqli_error($l));
		
		//jika berhasil membuat tagihan baru
		if ($stat_2) {
			//menghapus tagihan yang dibayar
			$del=mysqli_query($l,"DELETE FROM tagihan WHERE id_tagihan=".$data_pilih['id_tagihan']." ");
			
			if ($del) {
				//update Pembayaran menjadi Verified
				mysqli_query($l,"UPDATE pembayaran SET status_pembayaran=2 WHERE id_pembayaran=".$_GET['idx']." ");
				?>
				<script type="text/javascript">
					alert('Berhasil Terbayar!');
					document.location='index.php?page=pembayaran';
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
					alert('Gagal !');
					document.location='index.php?page=pembayaran';
				</script>
				<?php
			}
		}
	}
}
?>