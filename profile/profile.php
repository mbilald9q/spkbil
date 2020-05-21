 <html>
  <div class="container" style="margin-top:20px">
  	<h2 class="border-bottom">Alternatif</h2>

		<div class="dropdown show">
		  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		     Pilih Aspek
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		  	<?php  
		  		$query = $koneksi->query("SELECT * FROM tbl_aspek");
		  		while ($see = mysqli_fetch_object($query)) {
		  	?>
		    <a class="dropdown-item" href="index.php?page=inputnilaiprofile&kode_aspek=<?php echo $see->kode_aspek ?>"><?php echo $see->kode_aspek." - ".$see->nama_aspek ?></a>
			<?php } ?>
		  </div>
		</div>

  </div>
  </html>
