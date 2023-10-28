<?php
session_start();
include "base/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPK-Sri Asih</title>
	
	<style type="text/css">
		body{padding: 8px;background-color: #3385ff}
		a{text-decoration: none;color:#f00;}
		a:hover{color:#3385ff;}
		table {border-collapse: collapse;width:100%;}
		table, th, td {border: 1px solid #ddd; padding:10px}
		th{background-color: #ddd}
		.header{width: 100%; background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2);height: 250px; text-align: center;font-family: comic sans ms;font-size: 30px}
		.sidenav{float:right;width: 20%;height: auto;margin-top: 10px;background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2); font-size: 5;}
		.content{float:left;width: 75%; background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2);height: auto;margin-top: 10px;padding: 10px;font-size: 20px}
		.input-data{border-top:none;border-right:none;border-left:none;border-bottom: 3px solid #3385ff;background-color: none;border-radius: 5px; padding:8px;font-size: 16px;width:70%;}
		.input-save{background-color: #3385ff;border-radius: 10px;padding:10px;border:none;font-size: 20px;color:#fff;}
		.input-save:hover{background-color: #f00}
		.div-kotak {width: 80%; background-color: #fff;box-shadow:0px 6px 20px 0px rgba(0,0,0,0.2);padding: 10px;margin:10px;}
	</style>
</head>
<body>
<?php
?>
<!--Header-->
<?php
include "app/include/header.php";
?>
<!--End Header-->

<!--SideNAV-->
<?php
include "app/include/sidenav.php";
?>
<!--End SideNAV-->

<!--Content-->
<div class="content">

<div>
	<?php
	$sw=isset($_GET['page']) ? $_GET['page'] : null;
	switch ($sw) {
		//home
		case 'home':
			include "welcome.php";
			break;
		//Logout
		case 'logout':
			include "app/fungsi/logout.php";
			break;

		//Tarif
		case 'tarif':
			include "app/page/tarif.php";
			break;
			//Tambah
			case 'tambahtarif':
				include "app/fungsi/tarif_tambah.php";
				break;
			//Edit
			case 'edittarif':
				include "app/fungsi/tarif_edit.php";
				break;
			//Hapus
			case 'hapustarif':
				include "app/fungsi/tarif_hapus.php";
				break;
				
		//pelanggan
		case 'pelanggan':
			include "app/page/pelanggan.php";
			break;
			//Tambah
			case 'tambahpelanggan':
				include "app/fungsi/pelanggan_tambah.php";
				break;
			//Edit
			case 'editpelanggan':
				include "app/fungsi/pelanggan_edit.php";
				break;
			//Hapus
			case 'hapuspelanggan':
				include "app/fungsi/pelanggan_hapus.php";
				break;
				
		//Tagihan
		case 'tagihan':
			include "app/page/tagihan.php";
			break;
			
		//User Page
		case 'login':
			include "app/page/login.php";
			break;
		case 'userpage':
			include "app/page/userpage.php";
			break;
		case 'bayar':
			include "app/fungsi/bayar.php";
			break;
			
		//Pembayaran
		case 'pembayaran':
			include "app/page/pembayaran.php";
			break;
		case 'verifikasi':
			include "app/fungsi/verifikasi.php";
			break;
		
	default:
	include "welcome.php";
	break;
	}
	?>
</div>
</div>
<!--Content-->

<script type="text/javascript">
function filter() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("input-filter");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<?php

?>
</body>
</html>