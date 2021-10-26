<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Arsip Surat >> Unggah</b></h3></div>
    <p style="color: black">Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        Catatan: <br> - Gunakan file berformat PDF
    </p>
<div id="content" style="margin-top: 50px; color: black">
	<form action="proses/arsip-input-proses.php" method="post" >
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">Nomor Surat</td>
			<td class="isian-formulir"><input type="text" name="nomor" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Kategori</td>
			<td class="isian-formulir">
			<select name="idkategori" class="isian-formulir isian-formulir-border">
				<?php
				include'../koneksi.php';
				$sql_kategori = mysqli_query($db, "SELECT * FROM tbkategori");
				while($data_kategori = mysqli_fetch_array($sql_kategori)){
				?>
				<option value="<?=$data_kategori['idkategori'];?>">
				<?php echo $data_kategori['namakategori'];?></option>
				<?php
				}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">Judul</td>
			<td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
            <td class="label-formulir">File Surat (PDF)</td>
            <td class="isian-formulir" style="height: 50px"><input type="file" name="file" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir" style="height: 80px"><button type="button" class="tombol"><a href="index.php?p=arsip" style="color:black">Kembali</a></td>
            <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
         </tr>
	</table>
	</form>
</div>