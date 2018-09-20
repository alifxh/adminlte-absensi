<?php 
require_once('config/koneksi.php');
$nis = $_POST['nis'];
$check = mysqli_query($conn, "SELECT * FROM tbl_user WHERE nis = {$nis}");
$num1 = mysqli_num_rows($check);
if ($num1 == 1) {
	$again = mysqli_query($conn, "SELECT * FROM tbl_absensi WHERE nis = {$nis} AND tgl = curdate()");
	$num2 = mysqli_num_rows($again);
	if ($num2 == 0) {
		$query = mysqli_query($conn, "INSERT INTO tbl_absensi (`nis`, `tgl`) VALUES ({$nis}, now())");
		if ($query) {
			header('Location: index.php?status=sukses');
		} else {
			header('Location: index.php?status=gagal');
		}
	} else {
		header('Location: index.php?status=sudah');
	}
} else {
	header('Location: index.php?status=unidentified');
}
 ?>
