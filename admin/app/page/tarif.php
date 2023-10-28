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
<center><h1>Tarif</h1></center>

<a href="index.php?page=tambahtarif">Tambah Tarif</a>
<table id="myTable" class="">
		<th>Kode</th>
		<th>Daya</th>
		<th>Tarif perKWH</th>
		<th>Aksi</th>
<?php
//memilih data tarif
$query_tarif="SELECT * FROM tarif";
$stat_tarif=mysqli_query($l,$query_tarif) OR die(mysql_error($l));
$no=1;
while ($data_tarif=mysqli_fetch_array($stat_tarif)) {
?>
		<tr>
			<td><?php echo $data_tarif['kode'] ?></td>
			<td><?php echo $data_tarif['daya']."A" ?></td>
			<td><?php echo "Rp ". number_format($data_tarif['tarif_perKWH'],0) ?></td>
			
			<td>
				<a href="index.php?page=edittarif&idx=<?php echo $data_tarif['id']?>" >Update</a> /
				<a href="index.php?page=hapustarif&idx=<?php echo $data_tarif['id']?>" >Hapus</a>
			</td>
		</tr>
<?php };  ?>
</table>