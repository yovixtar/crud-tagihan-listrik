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
<input id="input-filter" onkeyup="filter()" placeholder="Cari .." class="input-data">
	<hr><br />
<center><h1>Pembayaran</h1></center>

<table id="myTable" class="">
		<th>Pelanggan</th>
		<th>Tanggal</th>
		<th>Total (+ Admin)</th>
		<th>Aksi</th>
<?php
//untuk menampilkan data pembayaran - gabungan
$query_pembayaran="SELECT * FROM pembayaran join pelanggan on pembayaran.id_pelanggan=pelanggan.id ORDER BY id_pembayaran DESC";
$stat_pembayaran=mysqli_query($l,$query_pembayaran) OR die(mysqli_error($l));

while ($data_pembayaran=mysqli_fetch_array($stat_pembayaran)) {
	
	$total=$data_pembayaran['jumlah_tagihan'] + $data_pembayaran['biaya_admin']; //menghitung tagihan total
?>
		<tr>
			<td><?php echo $data_pembayaran['nama'] ?></td>
			<td><?php echo date('d-m-Y', strtotime($data_pembayaran['tanggal_bayar']))  ?></td>
			<td><?php echo "Rp ". number_format($total,0) ?></td>
			
		<?php 
		//memilih data struk
		$stat_struk=mysqli_query($l,"SELECT * FROM struk where id_pembayaran=".$data_pembayaran['id_pembayaran']." ")OR DIE(mysql_error($l));
		while ($data_struk=mysqli_fetch_array($stat_struk)) {
		?>
		<td><a href="struk.php?idx=<?php echo $data_struk['id_struk'] ?>">Lihat Struk - <?php echo date('m/Y', strtotime($data_struk['tanggal_bayar'])) ?></a>
		</td>
		<?php }}
		?>
		</tr>
</table>