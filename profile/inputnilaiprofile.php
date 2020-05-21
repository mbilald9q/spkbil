 <html>
  <div class="container" style="margin-top:20px">
    <h2>Kriteria</h2>
  
<!-- table -->
  <table class="table table-bordered table-hover table-striped" style="margin-top:20px"> 
      <tr class="table-primary">
        <th scope="col">ALTERNATIF/KRITERIA</th>

        <?php 
        if(isset($_GET['kode_aspek'])){
        $kode_aspek = $_GET['kode_aspek'];
        $query = mysqli_query($koneksi,"SELECT * FROM tbl_kriteria where kode_aspek='$kode_aspek'");
        }
          $kolom = 0;
          $baris = 0;
          $data_kolom = NULL;
          while ($see = mysqli_fetch_object($query)) {
            $data_kolom[$kolom] = $see->kode_kriteria;
            $kolom++
         ?>

        <th scope="col"><?php echo $see->kode_kriteria." - ".$see->nama_kriteria  ?></th>
        <?php } ?>  
      </tr>

        <?php $query = $koneksi->query("SELECT * FROM tbl_alternatif");
            while ($see = mysqli_fetch_object($query)) {
        ?>
        <form action="" method="POST">
          <tr>
            <td>
              <?php echo $see->kode_alternatif." - ".$see->nama_alternatif ?> 
            </td>
              <?php  
                for ($i=0; $i < $kolom; $i++) : 
              ?>
              <td>
                <select class="form-control" name="nilai<?php echo $see->kode_alternatif; ?><?php echo $i; ?>">
                  <option value="1">1 - Kurang</option>
                  <option value="2">2 - Cukup</option>
                  <option value="3" selected="">3 - Baik</option>
                  <option value="4">4 - Sangat Baik</option>
                  <option value="5">5 - Sangat Baik</option>
                </select>
              </td>
              <?php 
                endfor;
              ?>
              <input type="hidden" name="kode_alternatif<?php echo $baris ?>" value="<?php echo $see->kode_alternatif ?>">
              <?php
                $baris++;
              } 
              ?>
              
          </tr>
           <button class="btn btn-primary bottom" type="submit" name="kirim"><i class="fa fa-save"></i> Simpan</button>
        </form>
    <!-- Tutup Table -->
   </div>
 </table>

   
 </html>
 