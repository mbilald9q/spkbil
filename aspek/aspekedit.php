 <html>
 	<body>


		<?php 
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['kode_aspek'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$kode_aspek = $_GET['kode_aspek'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tbl_aspek WHERE kode_aspek='$kode_aspek'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		 
		
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$kode_aspek = $_POST['kode_aspek'];
			$nama_aspek = $_POST['nama_aspek'];
			$bobot = $_POST['bobot'];
			
			$sql = mysqli_query($koneksi, "UPDATE tbl_aspek SET kode_aspek='$kode_aspek', nama_aspek='$nama_aspek', bobot='$bobot' WHERE kode_aspek='$kode_aspek'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=aspek&kode_aspek='.$kode_aspek.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		 <div class="container" style="margin-top:20px">
 			<h2 class="border-bottom">Edit aspek</h2>
		 	<form action="index.php?page=aspekedit&kode_aspek=<?php echo $kode_aspek; ?>" class="form-group" method="post">
		 		<label>Kode aspek</label>
			   <input type="text" class="form-control col-sm-8" value="<?php echo $data['kode_aspek']; ?>" name="kode_aspek" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			    <label>Nama aspek</label>
			   <input type="text" class="form-control col-sm-8" value="<?php echo $data['nama_aspek']; ?>" name="nama_aspek" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			    <label>Presentase</label>
			   <input type="text" class="form-control col-sm-8" value="<?php echo $data['bobot']; ?>" name="bobot" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			   <input type="submit" class="btn btn-primary" name="submit" value="Simpan" style="margin-top:10px">
			   <a href="index.php?page=aspek" class="btn btn-danger" style="margin-top:10px"><i class="far fa-arrow-left"></i> Kembali</a>
		  	</form>
 		</div>

 	</body>
 </html>