
 <html>
 	<body>
 		<div class="container" style="margin-top:20px">
 			<h2 class="border-bottom">Tambah Alternatif</h2>
		 	<form class="form-group" method="post" action="index.php?page=alternatiftambah">
		 	      <label>Masukkan Kode Alternatif</label>
			   <input type="text" class="form-control col-sm-8" name="kode_alternatif" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"> 
			       <label>Masukkan Nama Alternatif</label>
			   <input type="text" class="form-control col-sm-8" name="nama_alternatif" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">

			   <button type="submit" class="btn btn-primary" name="submit" value="Tambah" style="margin-top:10px"><i class="fas fa-plus"></i> Simpan</button>
			   <a href="index.php?page=alternatif" class="btn btn-danger" style="margin-top:10px"><i class="fas fa-arrow-left"></i> Kembali</a>
		  	</form>
 		</div>
 	</body>
 </html>

 <?php 
 //INPUT DATA
		// Check If form submitted, insert form data into users table.
    	if(isset($_POST['submit'])) {
    	$kode_alternatif = $_POST['kode_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];

        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE kode_alternatif='$kode_alternatif'") or die(mysqli_error($koneksi));

        if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO tbl_alternatif(kode_alternatif, nama_alternatif) VALUES('$kode_alternatif', '$nama_alternatif')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=alternatif";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Kode Alternatif sudah terdaftar.</div>';
			}
		}
//INPUT DATA SELESAI
?>