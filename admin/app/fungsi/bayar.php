<?php
//memilih data tagihan
$stat_pilih = mysqli_query($l,"SELECT * FROM tagihan WHERE id_tagihan=".$_GET['idx']."") OR DIE(mysql_error($l));
$data_pilih =mysqli_fetch_array($stat_pilih);

$date = date('Y-m-d'); //njukut tanggal saiki

//mengubah status tagihan menjadi >> Verifikasi Admin (2)
$stat_up1 = mysqli_query($l,"UPDATE tagihan SET status = 3 WHERE id_tagihan=".$_GET['idx']." ") OR DIE(mysql_error($l));
if ($stat_up1) {
	//memasukan data ke pembayaran
	$stat_pembayaran = mysqli_query($l,"INSERT INTO pembayaran SET tanggal_bayar='".$date."', id_tagihan =".$_GET['idx'].", jumlah_tagihan=".$data_pilih['tagihan'].", id_pelanggan =".$data_pilih['pelanggan_id']." ");
	if ($stat_pembayaran) {
		$stat_pilih_pembayaran = mysqli_query($l, "SELECT * FROM pembayaran where id_pelanggan =".$data_pilih['pelanggan_id']." ORDER BY id_pembayaran DESC LIMIT 1 ");
		$data_pilih_pembayaran=mysqli_fetch_array($stat_pilih_pembayaran)
		
		?>
	<script type="text/javascript">
	document.location='index.php?page=verifikasi&idx=<?php echo $data_pilih_pembayaran['id_pembayaran'] ?>'</script>
	<?php
	}
}else{
	?>
	<script type="text/javascript">alert('Gagal !');document.location='index.php?page=login'</script>
	<?php
}
?>