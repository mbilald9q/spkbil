<h1>deklarasi dan pemanggilan array</h1>
<h1>EX:</h1>
<?php  
	$hai ="kao";
	$hai = "tak";
	echo $hai."<br>";
	$variabel_simpan = "";
	for ($nilaiawal=0; $nilaiawal < 5; $nilaiawal++) { 
		$variabel_simpan[$nilaiawal] = "hello gays";
	}
	echo $variabel_simpan['3'];
	echo "<br>";
?>
<?php  
	$hai1 = "kao";
	$hai2 = "kao";
	$hai3 = "kao";
	$hai4 = "kao";

	echo $hai1;
	echo $hai2;
	echo $hai3;
	echo $hai4;
	// jadiin array
	echo "<br>";
	$hai1 = ["kao","kao","kao","kao"];

	$i=0;
	while ($i < count($hai1)) {
		echo $hai1[$i];
		$i++;
	}
	 //gitu?coba run Error :3 harus pake while kah pokoknya sampai kyak diatas katanya udah bisa manggil
	echo "<br>";

	$i=1;
	$hai2="";
	while ($i <=5) {
		$hai2[$i]="tes";
		$i++;
	}
	 // echo $hai2[$i];

	$j=1;
	while ($j <= count ($hai2)) {
		echo $hai2[$j]."<br>";
		echo "ini angka j :".$j."<br>";
		$j++;
	}

	echo "<br>";

	$k=1;
	while ($k <= 10) {
		$hi[$k] = $k;
		$k++;
	}
	//echo $hi[10];
	
	$l=1;
	while ($l <= count($hi)) {
		echo $hi[$l]."<br>";
		$l++;
	}

echo "<br>";
	$l=1;
	$jumlah=0;
	while ($l <= count($hi)) {
		$jumlah = $hi[$l];
		$l++;
	}
	echo "ini hasilnya = ".$jumlah;

	echo "<br>";
	$l=1;
	$jumlah=0;
	while ($l <= count($hi)) {
		if ($l % 2 == 1) {
			$jumlah += $hi[$l];
		}
		
		$l++;
	}
	echo "ini hasilnya GANJIL = ".$jumlah;

		echo "<br>";
	$l=1;
	$jumlah=0;
	while ($l <= count($hi)) {
		if ($l % 2 == 0) {
			$jumlah += $hi[$l];
		}
		
		$l++;
	}
	echo "ini hasilnya GENAP = ".$jumlah;

echo "<br>";

	$inianka = 100;
	$inianka += 999;
	echo $inianka;


?>
<h1>Multidimensi</h1>

<?php 


$sekolah = array(
  array(
    "Kelas1" => "Murid1","Murid2","Murid3",
  ),
  array(
    "Kelas2" => "Murid1","Murid2","Murid3",
  ),
  array(
    "Kelas3" => "Murid1","Murid2","Murid3",
  )
);
echo $sekolah;

 ?>

