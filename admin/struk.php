<?php
include "base/koneksi.php";
$stat_struk = mysqli_query($l,"SELECT * FROM struk join pelanggan on struk.id_pelanggan=pelanggan.id join tarif on pelanggan.kodeTarif=tarif.kode WHERE id_struk=".$_GET['idx']." ");
$data_struk=mysqli_fetch_array($stat_struk);

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Struk <?php echo $data_struk['nama'] ?></title>
	<style type="text/css">
		body{padding: 10px;background-color: #ddd}
		a{text-decoration: none;color:#f00;}
		a:hover{color:#3385ff;}
		th{background-color: #ddd}
		.header{width: 100%; background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2);height: 250px; text-align: center;font-family: comic sans ms;font-size: 30px}
		.sidenav{width: 20%;height: 550px; position: absolute;margin-top: 10px;background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2); font-size: 5}
		.content{width: 75%; background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2);height: auto;position: absolute;margin-left: 21.3%;margin-top: 10px;padding: 10px;font-size: 20px}
		.input-data{border-top:none;border-right:none;border-left:none;border-bottom: 3px solid #3385ff;background-color: none;border-radius: 5px; padding:8px;font-size: 16px;width:70%;}
		.input-save{background-color: #3385ff;border-radius: 10px;padding:10px;border:none;font-size: 20px;color:#fff;}
		.input-save:hover{background-color: #f00}
		.div-kotak {width: 80%; background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2);padding: 10px;margin:10px;}
	</style>
</head>
<body>
<a onClick="window.print()">
	<button class="input-save">Print Struk</button>
</a>
<br />
<center>
<div class="div-kotak" style="height:7cm;width: 20cm;background-color: #fff;font-size: 15px;font-family: tahoma">
	<h2>Struk <?php echo tgl_indo($data_struk['tanggal_bayar'])  ?></h2>
	<table style="float: left;border: none;">
		<tr>
			<td style="padding: 5px;width: 20%">Nama</td>
			<td width="3%"></td>
			<td style="padding: 5px">: <?php echo $data_struk['nama'] ?></td>
		</tr>
		<tr>
			<td style="padding: 5px;width: 20%">Kode / Daya</td>
			<td width="3%"></td>
			<td style="padding: 5px">: <?php echo $data_struk['kode']." / ".$data_struk['daya']."A" ?></td>
		</tr>
		<tr>
			<td style="padding: 5px;width: 20%">Tagihan</td>
			<td width="3%"></td>
			<td style="padding: 5px">: Rp <?php echo number_format($data_struk['tagihan'],0) ?></td>
		</tr>
		<tr>
			<td style="padding: 5px;width: 20%">No Pembayaran</td>
			<td width="3%"></td>
			<td style="padding: 5px">: <?php echo $data_struk['id_pembayaran'] ?></td>
		</tr>
		<tr>
			<td style="padding: 5px;width: 20%">Nama Admin</td>
			<td width="3%"></td>
			<td style="padding: 5px">: <?php echo $data_struk['admin'] ?></td>
		</tr>
	</table>
</div>
</center>
</body>
</html>