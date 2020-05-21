 <html>
 	<body>


		<?php 
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['kode_alternatif'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$kode_alternatif = $_GET['kode_alternatif'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE kode_alternatif='$kode_alternatif'") or die(mysqli_error($koneksi));
			
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
			$kode_alternatif = $_POST['kode_alternatif'];
			$nama_alternatif = $_POST['nama_alternatif'];
			
			$sql = mysqli_query($koneksi, "UPDATE tbl_alternatif SET kode_alternatif='$kode_alternatif', nama_alternatif='$nama_alternatif' WHERE kode_alternatif='$kode_alternatif'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=alternatif";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		 <div class="container" style="margin-top:20px">
 			<h2 class="border-bottom">Edit Alternatif</h2>
		 	<form action="index.php?page=alternatifedit&kode_alternatif=<?php echo $kode_alternatif; ?>" class="form-group" method="post">
		 		<label>Kode Alternatif</label>
			   <input type="text" class="form-control col-sm-8" value="<?php echo $data['kode_alternatif']; ?>" name="kode_alternatif" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			   <label>Nama Alternatif</label>
			   <input type="text" class="form-control col-sm-8" value="<?php echo $data['nama_alternatif']; ?>" name="nama_alternatif" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			   <button type="submit" class="btn btn-primary" name="submit" value="Tambah" style="margin-top:10px"><i class="fas fa-save"></i> Simpan</button>
			   <a href="index.php?page=alternatif" class="btn btn-danger" style="margin-top:10px"><i class="fas fa-arrow-left"></i> Kembali</a>
		  	</form>
 		</div>

 	</body>
 </html>