 <html>
  <div class="container" style="margin-top:20px">
  	<h2 class="border-bottom">Alternatif</h2>

	<!-- table -->
	<div class="panel panel-default">	
		<div class="panel-heading">
		    <form class="form-inline">
		        <input type="hidden" name="m" value="alternatif">
		        <div class="form-group">
		            <input class="form-control" type="text" placeholder="Search. . ." name="cari" value="">
		        </div>
		        <div class="form-group">
		            <button class="btn btn-success"><span class="fas fa-refresh"></span> Refresh
		        </button></div>
		        <div class="form-group">
		            <a class="btn btn-primary ml-2" href="index.php?page=alternatiftambah"><span class="fas fa-plus"></span> Tambah</a>
		        </div>
		    </form>
		</div>
	</div>	

		<table class="table table-bordered table-hover table-striped" style="height: 100px"> 
			<thead>
			  <tr class="table-primary">
			  <th scope="col">No</th>
		      <th scope="col">Kode Alternatif</th>
		      <th scope="col">Nama Alternatif</th>
		      <th>Aksi</th>
			</thead>
		  <tbody>

	 		<?php
	 				//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
	 				$query = " SELECT * FROM tbl_alternatif 							
	 				";
	 				//MENAMPILKAN DATA DI DATABASE
					//query ke database SELECT tabel tbl_kriteria urut berdasarkan id yang paling besar
					$sql = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
						//melakukan perulangan while dengan dari dari query $sql
						while($data = mysqli_fetch_assoc($sql)){ ?>
							<!--menampilkan data perulangan-->
							<tr>
								<td><?php echo $no++?></td>
								<td><?php echo $data['kode_alternatif']?></td>
								<td><?php echo $data['nama_alternatif']?></td>

								<td><a  href="index.php?page=alternatifedit&kode_alternatif=<?php echo $data['kode_alternatif']; ?>" class="badge badge-warning"><i class=" fas fa-edit text-white"></i></a>

								<a href="index.php?page=alternatifdelete&kode_alternatif=<?php echo $data['kode_alternatif']; ?>" onclick="return confirm(\'Yakin ingin menghapus data ini?\')" class="badge badge-danger"><i class="fas fa-trash-alt text-white"></i></a>
								</td>
			<?php
			} ?>
			</tbody>
		</table>
		<!-- tutup tabel-->

  </div>
 </html>