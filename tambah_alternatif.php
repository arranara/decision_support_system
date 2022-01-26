<?php
  session_start();
  $username  = $_SESSION['username'];

	include('configdb.php');
	function jml_kriteria(){
		include 'configdb.php';
		$kriteria = $mysqli->query("select * from kriteria");
		return $kriteria->num_rows;
	}function get_bobot(){
		include 'configdb.php';
		$bobot = $mysqli->query("select * from kriteria");
		if(!$bobot){
			echo $mysqli->connect_errno." - ".$mysqli->connect_error;
			exit();
		}
		$i=0;
		while ($row = $bobot->fetch_assoc()) {
			@$kep[$i] = $row["bobot"];
			$i++;
		}
		return $kep;
	}

	function get_costbenefit(){
		include 'configdb.php';
		$costbenefit = $mysqli->query("select * from kriteria");
		if(!$costbenefit){
			echo $mysqli->connect_errno." - ".$mysqli->connect_error;
			exit();
		}
		$i=0;
		while ($row = $costbenefit->fetch_assoc()) {
			@$cb[$i] = $row["cost_benefit"];
			$i++;
		}
		return $cb;
	}

	function cmp($a, $b){
		if ($a == $b) {
			return 0;
		}
		return ($a < $b) ? -1 : 1;
	}
	

	$kep = get_bobot();
	$cb = get_costbenefit();
	$k = jml_kriteria();
	$tbkep = 0;
	$total = 0;

	$alternatif = $_POST['alternatif'];
	$alt = [
		$_POST['k1'],$_POST['k2'],$_POST['k3'],$_POST['k4'],$_POST['k5'],$_POST['k6']
	];
	$k1 = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];
	$k5 = $_POST['k5'];
	$k6 = $_POST['k6'];

	$tkep = 0;
	for($i=0;$i<$k;$i++){
		$tkep = $tkep + $kep[$i];
	}
	for($i=0;$i<$k;$i++){
		$bkep[$i] = ($kep[$i]/$tkep);
		$tbkep = $tbkep + $bkep[$i];
	}
	for($i=0;$i<$k;$i++){
		if($cb[$i]=="cost"){
			$pangkat[$i] = (-1) * $bkep[$i];
		}
		else{
			$pangkat[$i] = $bkep[$i];
		}
	}
	
	for($i=0;$i<1;$i++){
		
		for($j=0;$j<$k;$j++){
			$s[$i][$j] = pow(($alt[$j]),$pangkat[$j]);
		}
		$ss[$i] = $s[$i][0]*$s[$i][1]*$s[$i][2]*$s[$i][3]*$s[$i][4]*$s[$i][5];
		if ($ss[$i] == 1) {
			$status = 'sangat layak';
		}
		elseif (round($ss[$i],6) >= 	0.574349) {
			$status = 'layak';
		} elseif (round($ss[$i],6) >= 0.415244) {
			$status = 'kurang layak';
		} elseif (round($ss[$i],6) >= 0.329877) {
			$status = 'tidak layak';
		}
	}


	$id_alt = rand(1, 1000000) ;

	$result = $mysqli->query("INSERT INTO `alternatif` (`id_alternatif`,`diperiksa`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `status`)
								VALUES ($id_alt,'".$username."', '".$alternatif."', '".$k1."', '".$k2."', '".$k3."', '".$k4."', '".$k5."', '".$k6."', '".$status."');");
	if(!$result){
		// echo "Gagal";
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>
