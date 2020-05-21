<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hasil</title>
</head>
<body>

	<div class="container">
		<div id="body"></div>
		<h1 class="border-bottom">Contoh SPK GAP MP</h1>
		<table class="table table-bordered table-hover table-striped">
        	<tr class="table-primary">
            	<th>No</th>
                <th>Aspek</th>
                <th>Kriteria</th>
                <th>Nilai Target</th>
                <th>Type</th>
            </tr>
            <?php
				$no=1;
				//---------------------Menyimpan tabel KRITERIA dalam array dan menampilkan---------------------
            	$sql= mysqli_query($koneksi, "SELECT tbl_kriteria.*,nama_aspek,IF(factor_kriteria='1','Core Factor','Secondary Factor') AS factor_kriteria FROM tbl_kriteria 
            		LEFT JOIN tbl_aspek ON tbl_kriteria.kode_aspek = tbl_aspek.kode_aspek 
            		ORDER BY kode_aspek,kode_kriteria") or die (mysqli_error($koneksi));
				$nilai_kriteria=array();
				$factor_kriteria=array();
				while($row=mysqli_fetch_assoc($sql))
				{		
					$nilai_kriteria[$row['kode_kriteria']]=$row['nilai_kriteria'];
					$factor_kriteria[$row['kode_kriteria']]=$row['factor_kriteria'];
			?>
        	<tr>
        	  <td><?php echo $no++;?></td>
        	  <td><?php echo $row['nama_aspek'];?></td>
        	  <td><?php echo $row['nama_kriteria'];?></td>
        	  <td><?php echo $row['nilai_kriteria'];?></td>
        	  <td><?php echo $row['factor_kriteria'];?></td>
      	  </tr>
          <?php
				}
		  ?>
        </table>


        <?php
        //---------------------Menyimpan tabel bobot dalam array---------------------
			$bobot=array();
			$sql=mysqli_query ($koneksi, "SELECT * FROM tbl_bobot");
			while($row=mysqli_fetch_assoc($sql))
				{
					$bobot[$row['selisih']]=$row['bobot'];
				}
		//---------------------Menyimpan tabel sample dalam array---------------------
			$sql=mysqli_query ($koneksi, "SELECT * FROM tbl_profile");
			while($row=mysqli_fetch_assoc($sql))
				{
					$nilai_profile[$row['kode_alternatif']][$row['kode_kriteria']]=$row['nilai_profile'];
				}
		//---------------------Menyimpan tabel karyawan dalam array---------------------		
        	$nama_alternatif=array();
			$nilai_akhir=array();
			$sql=mysqli_query ($koneksi, "SELECT * FROM tbl_alternatif ORDER BY kode_alternatif");
			while($row=mysqli_fetch_assoc($sql))
				{
					$nama_alternatif[$row['kode_alternatif']]=$row['nama_alternatif'];
					$nilai_akhir[$row['kode_alternatif']]=0;
				}
			//---------------------Menyimpan tabel aspek dalam array---------------------		
			$nama_aspek=array(); 
			$kode_aspek=array(); 
			$jumlah_kolom=array();
			$ba_all=array();
			$ba_cf=array();
			$ba_sf=array();

			$sql=mysqli_query($koneksi, "SELECT *,(SELECT COUNT(kode_kriteria) FROM tbl_kriteria WHERE kode_aspek=kode_aspek) AS jum_kolom 
				 FROM tbl_aspek");
			while($row=mysqli_fetch_assoc($sql))
				{
					$kode_aspek=$row['kode_aspek'];
					$nama_aspek[$row['kode_aspek']]=$row['nama_aspek'];
					$jumlah_kolom[$row['kode_aspek']]=$row['jum_kolom'];
					$ba_all[$row['kode_aspek']]=$row['bobot'];
					$ba_cf[$row['kode_aspek']]=$row['bobot_core'];
					$ba_sf[$row['kode_aspek']]=$row['bobot_secondary'];
					//------------cari index berdasarkan nomor 
					$sql2=mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE kode_aspek='$kode_aspek' ORDER BY kode_kriteria");
					$kolom=1;
					while($row2=mysqli_fetch_assoc($sql2))
						{
							$r_index[$kode_aspek][$kolom]=$row2['kode_kriteria'];
							$kolom++;
						}
				}
			?>

			<?php
			while (list($key, $value) = each($nama_aspek)) 
				{		
					echo "<h2>".$nama_aspek[$key]."</h2>";
					
		?>
        		
        		<table class="table">
                	<tr>
                    	<th>No</th>
                        <th>Nama</th>
                        <?php for($kol=1;$kol<=$jumlah_kolom[$key];$kol++) {?>
                        <th><?php echo $kode_aspek[$key];?><sub><?php echo $kol;?></sub></th>

                        <?php } ?>
                    </tr>
                    <?php
						reset($nama_alternatif);
						$nomor=1;	
                    	while (list($k, $v) = each($nama_alternatif)) 
							{
								
					?>
                    <tr>
                    	<td><?php echo $nomor++;?></td>
                        <td><?php echo $nama_alternatif[$k];?></td>
                        <?php for($kol=1;$kol<=$jumlah_kolom[$key];$kol++) {
									$pos=$r_index[$key][$kol];
							?>
                        <td><?php echo $nilai_profile[$k][$pos]; ?></td>
                        <?php } ?>
                    </tr>
                    <?php
							}
					?>
                </table>
        <?php			
				}
		?>

		</div>
	</div>
</body>
</html>