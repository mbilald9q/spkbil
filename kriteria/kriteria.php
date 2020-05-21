 <html>
  <div class="container" style="margin-top:20px">
  	<h2>Kriteria</h2>
	<a class="btn btn-primary" href="index.php?page=kriteriatambah"><i class="fa fa-plus"></i>Tambah</a>
 

<!-- table -->
	<table class="table table-bordered table-hover table-striped" style="margin-top:20px"> 
	    <tr class="table-primary">
	      <th scope="col">No</th>
	      <th scope="col">Kode Kriteria</th>
	      <th scope="col">Nama Aspek</th>
	      <th scope="col">Nama Kriteria</th>
	      <th scope="col">Nilai Kriteria</th>
	      <th scope="col">Factor Kriteria </th>
	      <th scope="col">Aksi</th>
	    </tr>
	  <tbody>

 		<?php
 				//membuat variabel $no untuk menyimpan nomor urut
				$no = 1;
 				$query = " SELECT * FROM tbl_kriteria 							
 							INNER JOIN tbl_aspek ON tbl_kriteria.kode_aspek = tbl_aspek.kode_aspek
 				";
 				//MENAMPILKAN DATA DI DATABASE
				//query ke database SELECT tabel tbl_kriteria urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){ ?>
						<!--menampilkan data perulangan-->
						<tr>
							<td><?php echo $no++?></td>
							<td><?php echo $data['kode_kriteria']?></td>
							<td><?php echo $data['nama_aspek']?></td>
							<td><?php echo $data['nama_kriteria']?></td>
							<td text><?=$data['nilai_kriteria']?></td>
							<td><?php if($data ['factor_kriteria'] == "1"){
																			echo "Core";
																		}else{
																			echo "Secondary";
																		} ?></td>
							
							<td><a  href="index.php?page=kriteriaedit&kode_kriteria=<?php echo $data['kode_kriteria']; ?>" class="badge badge-warning"><i class=" fas fa-edit text-white"></i></a>

							<a href="index.php?page=kriteria_delete&kode_kriteria=<?php echo $data['kode_kriteria']; ?>" onclick="return confirm(\'Yakin ingin menghapus data ini?\')" class="badge badge-danger"><i class="fas fa-trash-alt text-white"></i></a>
							</td>

							</td>
		<?php
		} ?>
		</tbody>
	</table>
	<!-- tutup tabel-->
  </div>
 </html>