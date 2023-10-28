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
<center><h1>Pelanggan</h1></center>

<a href="index.php?page=tambahpelanggan">Tambah Pelanggan</a>
<table id="myTable" class="">
		<th>Nama</th>
		<th>Id User</th>
		<th>Alamat</th>
		<th>Kode Tarif</th>
		<th>Aksi</th>
<?php
//untuk menampilkan data pelanggan
$query_pelanggan="SELECT * FROM pelanggan";
$stat_pelanggan=mysqli_query($l,$query_pelanggan) OR die(mysql_error($l));
$no=1;
while ($data_pelanggan=mysqli_fetch_array($stat_pelanggan)) {
?>
		<tr>
			<td><?php echo $data_pelanggan['nama'] ?></td>
			<td><?php echo $data_pelanggan['id'] ?></td>
			<td><?php echo $data_pelanggan['alamat'] ?></td>
			<td><?php echo $data_pelanggan['kodeTarif'] ?></td>
			
			<td>
				<a href="index.php?page=editpelanggan&idx=<?php echo $data_pelanggan['id']?>" >Update</a> /
				<a href="index.php?page=hapuspelanggan&idx=<?php echo $data_pelanggan['id']?>" >Hapus</a>
			</td>
		</tr>
<?php $no++; };  ?>
</table>