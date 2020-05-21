
<div class="container">
<!-- ASPEK -->
<?php  
  // $sql = mysqli_query($koneksi, "SELECT * FROM tbl_aspek");
  // $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria INNER JOIN tbl_profile ON tbl_kriteria.kode_kriteria = tbl_profile.kode_kriteria");
  // while ($see = mysqli_fetch_object($sql)) {
  //  echo "<h2>$see->nama_aspek</h2><br>";
  // }
  $query = $koneksi->query("SELECT * FROM tbl_aspek");
  while ($see = mysqli_fetch_object($query)) {
?>
  <h1><?php echo $see->nama_aspek ?></h1>
  <table class="table table-bordered table-hover table-striped" >
    <thead>
      <tr class="table-primary"></td>
        <th width="30px" >NO</th>
        <th width="20%" >Nama</th>
        <?php  
          $simpan_kolom = 1;
          $isi_kolom = NULL;
          $query_kolom = $koneksi->query("SELECT * FROM tbl_kriteria WHERE kode_aspek = '$see->kode_aspek' ");
          while ($see_kolom = mysqli_fetch_object($query_kolom)) :
          $isi_kolom[$simpan_kolom] = $see_kolom->kode_kriteria;
        ?>
        <th><?php echo $see_kolom->nama_kriteria ?></th>
        <?php 
          $simpan_kolom++;
          endwhile 
        ?>
      </tr>
    </thead>
    <tbody>
      <?php  
        $no = 1;
        $query_baris = $koneksi->query("SELECT * FROM tbl_alternatif");
        while ($see_baris = mysqli_fetch_object($query_baris)) :
      ?>
        <tr>
          <td width="30px"><?php echo $no ?></td>
          <td width="20%"><?php echo $see_baris->nama_alternatif ?></td>
          <?php  
            for ($i=1; $i < $simpan_kolom; $i++) :
          ?>
          <?php 
            $ambil_isi_kolom = $isi_kolom[$i];
            $query_profile = $koneksi->query("SELECT * FROM tbl_profile WHERE kode_alternatif = '$see_baris->kode_alternatif' AND kode_kriteria ='$ambil_isi_kolom'");
            while($see_profile = mysqli_fetch_object($query_profile)): 
          ?>
            <td><?php echo $see_profile->nilai_profile ?></td>
          <?php endwhile ?>
          <?php endfor ?>
        </tr>
      <?php 
        $no++;
        endwhile 
      ?>
    </tbody>
  </table>
<?php  
  }
?>




<html> 
<br>
<h2>PERHITUNGAN GAP</h2>
<!-- ASPEK -->
<?php  
  // $sql = mysqli_query($koneksi, "SELECT * FROM tbl_aspek");
  // $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria INNER JOIN tbl_profile ON tbl_kriteria.kode_kriteria = tbl_profile.kode_kriteria");
  // while ($see = mysqli_fetch_object($sql)) {
  //  echo "<h2>$see->nama_aspek</h2><br>";
  // }
  $query = $koneksi->query("SELECT * FROM tbl_aspek");
  while ($see = mysqli_fetch_object($query)) {
?>
  <h4><?php echo $see->nama_aspek ?></h4>
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr class="table-primary">
        <th>NO</th>
        <th>Nama</th>
        <?php  
          $simpan_kolom = 1;
          $isi_kolom = NULL;
          $query_kolom = $koneksi->query("SELECT * FROM tbl_kriteria WHERE kode_aspek = '$see->kode_aspek' ");
          while ($see_kolom = mysqli_fetch_object($query_kolom)) :  
          $isi_kolom[$simpan_kolom] = $see_kolom->kode_kriteria;
        ?>
        <th><?php echo $see_kolom->nama_kriteria ?></th>
        <?php 
          $simpan_kolom++;
          endwhile 
        ?>
      </tr>
    </thead>
    <tbody>
      <?php  
        $no = 1;
        $query_baris = $koneksi->query("SELECT * FROM tbl_alternatif");
        while ($see_baris = mysqli_fetch_object($query_baris)) :
      ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $see_baris->nama_alternatif ?></td>
          <?php  
            for ($i=1; $i < $simpan_kolom; $i++) :
          ?>
          <?php 
            $ambil_isi_kolom = $isi_kolom[$i];
            $query_profile = $koneksi->query("SELECT  * FROM tbl_profile
              INNER JOIN tbl_kriteria ON tbl_profile.kode_kriteria=tbl_kriteria.kode_kriteria
               WHERE kode_alternatif = '$see_baris->kode_alternatif' AND tbl_profile.kode_kriteria ='$ambil_isi_kolom'
              ");
            while($see_profile = mysqli_fetch_object($query_profile)):
            $array_nilai_kriteria = $see_profile->nilai_kriteria;
            $array_nilai_profile = $see_profile->nilai_profile; 
            $hasil_nilai = $array_nilai_profile - $array_nilai_kriteria;
          ?>
            <td>(<?php echo $array_nilai_profile; ?> - <?php echo $array_nilai_kriteria; ?>)=  <strong><?php echo $hasil_nilai ?></strong></td>
          <?php endwhile ?>
          <?php endfor ?>
        </tr>
      <?php 
        $no++;
        endwhile 
      ?>
    </tbody>
  </table>
<?php  
  }
?>




<br>
<h2>PEMBOBOTAN</h2>
<!-- ASPEK -->
<?php  
  // $sql = mysqli_query($koneksi, "SELECT * FROM tbl_aspek");
  // $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria INNER JOIN tbl_profile ON tbl_kriteria.kode_kriteria = tbl_profile.kode_kriteria");
  // while ($see = mysqli_fetch_object($sql)) {
  //  echo "<h2>$see->nama_aspek</h2><br>";
  // }
  $query = $koneksi->query("SELECT * FROM tbl_aspek");
  while ($see = mysqli_fetch_object($query)) {
?>
  <h4><?php echo $see->nama_aspek ?>(<?php echo $see->bobot ?>%)</h4>
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr  class="table-primary">
        <th>NO</th>
        <th>Nama</th>
        <?php  
          $simpan_kolom = 0;
          $isi_kolom = NULL;
          $query_kolom = $koneksi->query("SELECT * FROM tbl_kriteria WHERE kode_aspek = '$see->kode_aspek' ");
          while ($see_kolom = mysqli_fetch_object($query_kolom)) :  
          $isi_kolom[$simpan_kolom] = $see_kolom->kode_kriteria;
        ?>
        <th><?php echo $see_kolom->nama_kriteria."-".$see_kolom->factor_kriteria ?></th>
        <?php 
          $simpan_kolom++;
          endwhile 
        ?>
        <th>CF</th>
        <th>SF</th>
        <th>NILAI TOTAL</th>
      </tr>
    </thead>
    <tbody>
      <?php  
        $no = 1;
        $i=0;
        $query_baris = $koneksi->query("SELECT * FROM tbl_alternatif");
        while ($see_baris = mysqli_fetch_object($query_baris)) :
      ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $see_baris->nama_alternatif ?></td>
          <?php  
            for ($i=0; $i < $simpan_kolom; $i++) :
          ?>
          <?php 
            $ambil_isi_kolom = $isi_kolom[$i];
            $gap = NULL;
            $nilai_all = "";
            $no_nilai = 0;
            //itu bukan deklarasi array tapi deklarasi variabel agar bisa diakses diluar loop
            $query_profile = $koneksi->query("SELECT  * FROM tbl_profile
              INNER JOIN tbl_kriteria ON tbl_profile.kode_kriteria=tbl_kriteria.kode_kriteria
               WHERE kode_alternatif = '$see_baris->kode_alternatif' AND tbl_profile.kode_kriteria ='$ambil_isi_kolom'
              ");
            while($see_profile = mysqli_fetch_object($query_profile)):
            $nilai_bobot= $see_profile->nilai_profile - $see_profile->nilai_kriteria;

            $nilai_gap = 0;
            if (substr($ambil_isi_kolom, -1) == 1) {
              if ($nilai_bobot == 0) {
                $nilai_gap = 5;
              } else if ($nilai_bobot == 1) {
                $nilai_gap = 4.5;
              } else if ($nilai_bobot == -1) {
                $nilai_gap = 4;
              } else if ($nilai_bobot == 2) {
                $nilai_gap = 3.5;
              } else if ($nilai_bobot == -2) {
                $nilai_gap = 3;
              } else if ($nilai_bobot == 3) {
                $nilai_gap = 2.5;
              } else if ($nilai_bobot == -3) {
                $nilai_gap = 2;
              } else if ($nilai_bobot == 4) {
                $nilai_gap = 1.5;
              } else if ($nilai_bobot == -4) {
                $nilai_gap = 1;
              }
              // $nilai_core['']
            }else{
              if ($nilai_bobot == 0) {
                $nilai_gap = 5;
              } else if ($nilai_bobot == 1) {
                $nilai_gap = 4.5;
              } else if ($nilai_bobot == -1) {
                $nilai_gap = 4;
              } else if ($nilai_bobot == 2) {
                $nilai_gap = 3.5;
              } else if ($nilai_bobot == -2) {
                $nilai_gap = 3;
              } else if ($nilai_bobot == 3) {
                $nilai_gap = 2.5;
              } else if ($nilai_bobot == -3) {
                $nilai_gap = 2;
              } else if ($nilai_bobot == 4) {
                $nilai_gap = 1.5;
              } else if ($nilai_bobot == -4) {
                $nilai_gap = 1;
              }
              $no_nilai++;
            }


            echo $nilai_bobot;

          ?>
            <td><?php echo $nilai_gap ?></td>

          <?php endwhile ?>
          <?php endfor ?>
          <td><?php echo "hasil"; ?></td>
          <td><?php echo "hasil"; ?></td>
          <td><?php echo "hasil"; ?></td>
        </tr>
      <?php 
        $no++;
        endwhile 
      ?>
    </tbody>
  </table>
<?php  
  }
?>




</html>
</div>