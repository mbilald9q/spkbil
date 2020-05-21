 <html>
 	<body>
 		<div class="container" style="margin-top:20px">
 			<h2 class="border-bottom">Tambah Kriteria</h2>
		 	<form class="form-group" method="post" action="index.php?page=kriteriatambah">
		 			<label>Pilih Nama Aspek</label>
			   <select name="kode_aspek" class="form-control col-sm-8">
				  <option value="">Pilih Aspek</option>
					<?php 
					$sql_aspek = mysqli_query($koneksi, "SELECT * FROM tbl_aspek") or die (mysqli_error($koneksi));
					while ($data_aspek = mysqli_fetch_object($sql_aspek)) {
						echo "<option value='".$data_aspek->kode_aspek."'>".$data_aspek->kode_aspek." - ".$data_aspek->nama_aspek."</option>";
					}
					 ?>

			  </select>
		 	      <label>Masukkan Kode Kriteria</label>
			   <input type="text" class="form-control col-sm-8" name="kode_kriteria" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"> 
			       <label>Masukkan Nama Kriteria</label>
			   <input type="text" class="form-control col-sm-8" name="nama_kriteria" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			  	   <label>Masukkan Nilai Kriteria</label>
			   <input type="text" class="form-control col-sm-8" name="nilai_kriteria" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
			   <div class="form-group">
			   <label>Factor</label>
				   <div class="form-check">
				  <input class="form-check-input" type="radio" name="factor_kriteria" id="exampleRadios1" value="1" checked>
				  <label class="form-check-label" for="exampleRadios1">
				    Core
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="factor_kriteria" id="exampleRadios2" value="2">
				  <label class="form-check-label" for="exampleRadios2">
				    Secondary
			  </label>
			</div>

			   <button type="submit" class="btn btn-primary" name="submit" value="Tambah" style="margin-top:10px"><i class="fas fa-plus"></i> Simpan</button>
			   <a href="index.php?page=kriteria" class="btn btn-danger" style="margin-top:10px"><i class="fas fa-arrow-left"></i> Kembali</a>
		  	</form>
 		</div>
 	</body>
 </html>

 <?php 
 //INPUT DATA
		// Check If form submitted, insert form data into users table.
    	if(isset($_POST['submit'])) {
    	$kode_aspek = $_POST['kode_aspek'];
    	$kode_kriteria = $_POST['kode_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $nilai_kriteria = $_POST['nilai_kriteria'];
        $factor_kriteria = $_POST['factor_kriteria'];


        $query = mysqli_query($koneksi, "INSERT INTO tbl_kriteria(kode_kriteria,kode_aspek,nama_kriteria,nilai_kriteria,factor_kriteria) 
                VALUES('$kode_kriteria','$kode_aspek','$nama_kriteria','$nilai_kriteria','$factor_kriteria')")
                        or die('Ada kesalahan pada query insert : '.mysqli_error($koneksi));
				
				if($query){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=kriteria";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
//INPUT DATA SELESAI
?>