<?php   
include('koneksi.php');
?>

<html>
<div id="container">
   <div id="header">
        <title>SPK Profil Matching</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet/less" type="text/css" href="assets/css/bootswatch.less" />
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/jquery-3.5.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
   </div>
<body>
  

   <div id="body">
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">Profile Matching</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=alternatif"><i class="fas fa-user"></i> Alternatif</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=aspek"><i class="fas fa-edit"></i> Aspek</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=kriteria"><i class="fas fa-th"></i> Kriteria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=profile"><i class="fas fa-address-card"></i> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=hasil"><i class="fas fa-address-card"></i> Hasil</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="badan">
       
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];
       
          switch ($page) {
            case 'alternatif':
              include "alternatif/alternatif.php";
              break;
            case 'alternatiftambah':
              include "alternatif/alternatiftambah.php";
              break;
            case 'alternatifedit':
              include "alternatif/alternatifedit.php";
              break;
            case 'alternatifdelete':
              include "alternatif/alternatifdelete.php";
              break;
            case 'aspek';
              include "aspek/aspek.php";
              break;
            case 'aspektambah':
              include "aspek/aspektambah.php";
              break;
            case 'aspekedit':
              include "aspek/aspekedit.php";
              break;
            case 'aspekdelete':
              include "aspek/aspekdelete.php";
              break;
              case 'kriteria';
              include "kriteria/kriteria.php";
              break;
            case 'kriteriatambah':
              include "kriteria/kriteriatambah.php";
              break;
            case 'kriteriaedit':
              include "kriteria/kriteriaedit.php";
              break;
            case 'kriteriadelete':
              include "kriteria/kriteriadelete.php";
              break;    
            case 'profile':
              include "profile/profile.php";
              break;
            case 'inputnilaiprofile':
              include "profile/inputnilaiprofile.php";
              break;
            case 'hasil':
              include "hasil/hasil.php";
              break;                                             
            default:
              echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
              break;
          }
        }else{
          include "halaman/home.php";
        }
       
         ?>
    </div>

   <div id="footer">
       <footer class="page-footer bg-primary">
          <!-- Copyright -->
          <div class="footer text-center py-3 text-white"><p>Copyright © 2020 M Bilal</p></div>
          <!-- Copyright -->
      </footer>
   </div>
</div>
<div id="clear" style="display:block;height:160px;clear:both;"> </div>
</body>
</html>

<?php 




 ?>