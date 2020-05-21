 <html>
 	<body>


		<?php 
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['kode_kriteria'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$kode_kriteria = $_GET['kode_kriteria'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE kode_kriteria='$kode_kriteria'") or die(mysqli_error($koneksi));
			
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
              $kode_kriteria                 = mysqli_real_escape_string($koneksi, trim($_POST['kode_kriteria']));
              $kode_aspek                    = mysqli_real_escape_string($koneksi, trim($_POST['kode_aspek']));
              $nama_kriteria                 = mysqli_real_escape_string($koneksi, trim($_POST['nama_kriteria']));
              $nilai_kriteria                = mysqli_real_escape_string($koneksi, trim($_POST['nilai_kriteria']));
              $factor_kriteria               = mysqli_real_escape_string($koneksi, trim($_POST['factor_kriteria']));

			$query = mysqli_query($koneksi, "UPDATE tbl_kriteria SET  
                                                   kode_kriteria       = '$kode_kriteria',
                                                   kode_aspek          = '$kode_aspek',
                                                   nama_kriteria       = '$nama_kriteria',
                                                   nilai_kriteria      = '$nilai_kriteria',
                                                   factor_kriteria     = '$factor_kriteria'
                                                  
                                                  WHERE  kode_kriteria = '$kode_kriteria'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));
			
			if($query){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=kriteria&kode_kriteria='.$kode_kriteria.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		 <div class="container" style="margin-top:20px">
 			<h2 class="border-bottom">Edit kriteria</h2>
		 	<form action="index.php?page=kriteriaedit&kode_kriteria=<?php echo $kode_kriteria; ?>" class="form-group" method="post">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode kriteria</label>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="kode_kriteria" value="<?php echo $data['kode_kriteria']; ?>"required />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Aspek</label>

				<div class="col-sm-4">
					<select id="kode_aspek" name="kode_aspek" class="form-control col-sm-8">
							<?php 
							$sql_aspek = mysqli_query($koneksi, "SELECT * FROM tbl_aspek") or die (mysqli_error($koneksi));
							while ($data_aspek = mysqli_fetch_object($sql_aspek)) {
								echo "<option value='".$data_aspek->kode_aspek."'>".$data_aspek->kode_aspek." - ".$data_aspek->nama_aspek."</option>";
							}
							 ?>
		 			</select>
				</div>
			</div>			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama kriteria</label>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="nama_kriteria" value="<?php echo $data['nama_kriteria']; ?>"required />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai kriteria</label>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="nilai_kriteria" value="<?php echo $data['nilai_kriteria']; ?>"required />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Factor kriteria</label>
					<div class="col-sm-4">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="factor_kriteria" value="1" <?php if($data['factor_kriteria']=='1') echo 'checked'?>><label>core</label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="factor_kriteria" value="2" <?php if($data['factor_kriteria']=='2') echo 'checked'?>><label>secondary</label>
					</div>
			</div>

		<div class="row justify-content-start col-md-10">
			<button type="submit" class="btn btn-primary" name="submit" value="Simpan"><i class="fas fa-save"></i> Simpan</button>
		   <a href="index.php?page=kriteria" class="btn btn-danger" ><i class="fas fa-arrow-left"></i> Kembali</a>
		</div>
		  	</form>
 		</div>

 	</body>
 </html>