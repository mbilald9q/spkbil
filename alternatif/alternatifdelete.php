<?php 
//jika benar mendapatkan GET id dari URL
if(isset($_GET['kode_alternatif'])){
	// menangkap data id yang di kirim dari url
	$kode_alternatif = $_GET['kode_alternatif'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE kode_alternatif='$kode_alternatif'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM tbl_alternatif WHERE kode_alternatif='$kode_alternatif'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=alternatif";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=alternatif";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=alternatif";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=alternatif";</script>';
}

?>