 <html>
  <div class="container" style="margin-top:20px">
  	<h2 class="border-bottom">Aspek</h2>
	<a class="btn btn-primary" href="index.php?page=aspektambah"><i class="fa fa-plus"></i>Tambah</a>
 

<!-- table -->
	<table class="table table-bordered table-hover table-striped" style="margin-top:20px"> 
	    <tr class="table-primary">
	      <th scope="col">No</th>
	      <th scope="col">Kode Aspek</th>
	      <th scope="col">Nama Aspek</th>
	      <th scope="col">Bobot</th>
	      <th>Aksi</th>
	    </tr>
	  <tbody>

 		<?php
 				//MENAMPILKAN DATA DI DATABASE
				//query ke database SELECT tabel tbl_aspek urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM tbl_aspek") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['kode_aspek'].'</td>
							<td>'.$data['nama_aspek'].'</td>
							<td>'.$data['bobot'].'</td>
							<td>
								<a href="index.php?page=aspekedit&kode_aspek='.$data['kode_aspek'].'" class="badge badge-warning"><i class="fas fa-edit text-white"></i></a>
								<a href="index.php?page=aspekdelete&kode_aspek='.$data['kode_aspek'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash-alt text-white"</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				//MENAMPILKAN DATA SELESAI

		
		?>
		</tbody>
	</table>
	<!-- tutup tabel-->
  </div>
 </html>