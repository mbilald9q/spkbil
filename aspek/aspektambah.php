 <html>
 	<body>
 		<div class="container" style="margin-top:20px">
 			<h2 class="border-bottom">Tambah aspek</h2>
		 	<form class="form-group" method="post" action="index.php?page=aspektambah">
		 	      <label>Masukkan Kode aspek</label>
			   <input type="text" class="form-control col-sm-8" name="kode_aspek" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"> 
			       <label>Masukkan Nama aspek</label>
			   <input type="text" class="form-control col-sm-8" name="nama_aspek" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			  	   <label>Masukkan Bobot aspek</label>
			   <input type="text" class="form-control col-sm-8" name="bobot" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
				<div class="form-group d-none" type=hidden>
				   <label>Bobot_core</label>
					   <div class="form-check">
					  <input class="form-check-input" type="radio" name="bobot_core" id="exampleRadios1" value="60" checked="">
					  <label class="form-check-label" for="exampleRadios1">
					    60
					  </label>
					</div>
					<label>Bobot_Secondary</label>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="bobot_secondary" id="exampleRadios1" value="40" checked="">
					  <label class="form-check-label" for="exampleRadios2">
					    40
			 	 	 </label>
			 		</div>
			 	</div> 	 

			   <button type="submit" class="btn btn-primary" name="submit" value="Tambah" style="margin-top:10px"><i class="fas fa-plus"></i> Simpan</button>
			   <a href="index.php?page=aspek" class="btn btn-danger" style="margin-top:10px"><i class="fas fa-arrow-left"></i> Kembali</a>
		  	</form>
 		</div>
 	</body>
 </html>

 <?php 
 //INPUT DATA
		// Check If form submitted, insert form data into users table.
    	if(isset($_POST['submit'])) {
    	$kode_aspek = $_POST['kode_aspek'];
        $nama_aspek = $_POST['nama_aspek'];
        $bobot = $_POST['bobot'];
        $bobot_core = $_POST['bobot_core'];
        $bobot_secondary = $_POST['bobot_secondary'];

        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_aspek WHERE kode_aspek='$kode_aspek'") or die(mysqli_error($koneksi));

        if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO tbl_aspek(kode_aspek, nama_aspek, bobot, bobot_core, bobot_secondary) VALUES('$kode_aspek', '$nama_aspek', '$bobot' , '$bobot_core', '$bobot_secondary')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=aspek";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
//INPUT DATA SELESAI
?>