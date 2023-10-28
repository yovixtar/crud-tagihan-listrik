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

<meta http-equiv="refresh" content="10" /> <!--Merefresh otomatis selama 10 detik-->

<input id="input-filter" onkeyup="filter()" placeholder="Cari .." class="input-data">
	<hr><br />
<center><h1>Tagihan</h1></center>
<table id="myTable" class="">
		<th>Pelanggan</th>
		<th>Pemakaian</th>
		<th>Tagihan</th>
<?php
//meanmpilkan data tagihan
$query_tagihan="SELECT * FROM tagihan join pelanggan on tagihan.pelanggan_id=pelanggan.id join tarif on pelanggan.kodeTarif=tarif.kode";
$stat_tagihan=mysqli_query($l,$query_tagihan) OR die(mysql_error($l));

$date=date('Y-m-d'); //jukut tanggal saiki
while ($data_tagihan=mysqli_fetch_array($stat_tagihan)) {

$date1=$data_tagihan['waktu_awal']; //mengambil tanggal
$date2=date('Y-m-d'); //mengambil tanggal
$datetime1 = new DateTime($date1); //membuat date time
$datetime2 = new DateTime($date2); //membuat date time
$difference = $datetime1->diff($datetime2); //menghitung selisih hari

$tarif_1hari = $data_tagihan['tarif_perKWH'] * 24; //menghitung tarif 1 hari
$tarif_pemakaian = $tarif_1hari * $difference->days; //menghitung tarif pemakaian
 
//mengupdate tagihan dari data diatas
$stat1= mysqli_query($l,"UPDATE tagihan SET waktu_akhir='".$date."', pemakaian=".$difference->days.", tagihan = ".$tarif_pemakaian." WHERE id_tagihan = ".$data_tagihan['id_tagihan']."  ") OR DIE(mysql_error($l));

	//jika berhasil mengupdate
	if ($stat1) {
				?>
				<tr>
					<td><?php echo $data_tagihan['nama'] ?></td>
					<td><?php echo $data_tagihan['pemakaian']." Hari" ?></td>
					<td><?php echo "Rp ". number_format($data_tagihan['tagihan'],0) ?></td>
				</tr>
	<?php
	}

  };  
 ?>
</table>