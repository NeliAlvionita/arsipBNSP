<div id="label-page"><h1>ARSIP SURAT</h1></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=arsip-input" class="tombol">Arsipkan Surat</a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>Nomor</th>
			<th>Kategori</th>
			<th>Judul</th>
			<th>Waktu</th>
			<th id="label-opsi">Aksi</th>
		</tr>
		<?php
		$batas = 10;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$no = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$no = $posisi+1;
		}	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbarsip LEFT JOIN tbkategori on tbkategori.idkategori = tbarsip.idkategori  WHERE nomor LIKE '%$pencarian%'
						OR namakategori LIKE '%$pencarian%'
						OR judul LIKE '%$pencarian%'
						OR waktu LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbarsip LEFT JOIN tbkategori on tbkategori.idkategori = tbarsip.idkategori LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbarsip LEFT JOIN tbkategori on tbkategori.idkategori = tbarsip.idkategori ";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbarsip LEFT JOIN tbkategori on tbkategori.idkategori = tbarsip.idkategori  LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbarsip LEFT JOIN tbkategori on tbkategori.idkategori = tbarsip.idkategori ";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
		$q_tampil_arsip = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_arsip)>0)
		{
			while($r_tampil_arsip=mysqli_fetch_array($q_tampil_arsip)){
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r_tampil_arsip['nomor']; ?></td>
			<td><?php echo $r_tampil_arsip['namakategori']; ?></td>
			<td><?php echo $r_tampil_arsip['judul']; ?></td>
			<td><?php echo $r_tampil_arsip['waktu']; ?></td>
			<td>
				<div class="tombol-opsi-container"><a href="proses/arsip-hapus.php?id=<?php echo $r_tampil_arsip['id']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Arsip Ini?')" class="tombol">Hapus</a></div>
				<div class="tombol-opsi-container"><a href="http://localhost/projek/rekap/<?php echo $file?>" class="tombol">Unduh</a></div>
				
			</td>			
		</tr>		
		<?php $no++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>			
		</div>		
		<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=arsip&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
		</div>
	<?php
	}
	?>
</div>