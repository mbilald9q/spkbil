 <?php
			//-- query untuk mendapatkan semua data aspek di tabel tbl_aspek
			$sql = 'SELECT * FROM tbl_aspek';
			$result = $koneksi->query($sql);
			//-- menyiapkan variable penampung berupa array
			$aspek=array();
			//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
			foreach ($result as $row) {
			    $aspek[$row['kode_aspek']]=array($row['nama_aspek'],$row['bobot'],$row['bobot_core'],$row['bobot_secondary']);
			}
			//-- query untuk mendapatkan semua data kriteria di tabel tbl_kriteria
			$sql = 'SELECT * FROM tbl_kriteria';
			$result = $koneksi->query($sql);
			//-- menyiapkan variable penampung berupa array
			$nama_kriteria=array();
			//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
			foreach ($result as $row) {
			    $nama_kriteria[$row['kode_kriteria']]=array($row['kode_aspek'],$row['nama_kriteria'],$row['nilai_kriteria'],$row['factor_kriteria']);
			}
			?>

			<?php
			//-- query untuk mendapatkan semua data aspek dan faktor di tabel tbl_aspek/tbl_kriteria
			$sql = 'SELECT * FROM tbl_aspek a JOIN tbl_kriteria b USING(kode_aspek) ORDER BY a.kode_aspek';
			$result = $koneksi->query($sql);
			//-- menyiapkan variable penampung berupa array
			$nama_aspek=$nama_kriteria=array();
			//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
			foreach ($result as $row) {
			    $nama_aspek[$row['kode_aspek']]=array($row['nama_aspek'],$row['bobot'],$row['bobot_core'],$row['bobot_secondary']);
			    $nama_kriteria[$row['kode_kriteria']]=array($row['kode_aspek'],$row['nama_kriteria'],$row['nilai_kriteria'],$row['factor_kriteria']);
			}
			?>











						<?php
			reset($nama_aspek);
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