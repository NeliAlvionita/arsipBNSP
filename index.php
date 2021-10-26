<?php
include'koneksi.php';
$tgl=date('Y-m-d');
session_start();
if(isset($_SESSION['sesi'])){
?>
<!doctype html>
<html>
<head>
	<title>ARSIP SURAT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
	<div id="container">
		<div id="sidebar">
			<p class="label-navigasi">Menu</p>
			<ul>
				<li><a href="index.php?p=arsip">Arsip</a></li>
				<li><a href="index.php?p=about">About</a></li>
			</ul>
		</div>
		<div id="content-container">
			    <div class="container">
    </div>
		<?php
			$pages_dir='pages';
			if(!empty($_GET['p'])){
				$pages=scandir($pages_dir,0);
				unset($pages[0],$pages[1]);
				$p=$_GET['p'];
				if(in_array($p.'.php',$pages)){
					include($pages_dir.'/'.$p.'.php');
				}else{
					echo'Halaman Tidak Ditemukan';
				}
			}
		?>
</body>
</html>
<?php
}

?>