<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM login";
$pageQry = mysqli_query($koneksi,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal" style="background-color: #133337"><i class='icon icon-white icon-plus' ></i> Tambah User</a><p>
<?php
	if($_POST["user"]){
			include_once("../library/koneksi.php");
			mysqli_query($koneksi,"INSERT into login set username='".$_POST["usr"]."', password='".$_POST["pas"]."', nama='".$_POST["nma"]."', alamat='".$_POST["alt"]."', foto='".$_POST["fto"]."'");
			
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["user"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

user(); //memanggil function user
?>
<div class="panel panel-default">
	<div class="panel-heading" style="background-color: #133337">
		<span style="color: white"> Daftar User </span>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Foto</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$usSql = "SELECT * FROM login ORDER BY kd_user DESC LIMIT $hal, $row";
				$usQry = mysqli_query($koneksi,$usSql)  or die ("Query Obat salah : ".mysqli_error());
				$nomor  = 0; 
				$nomor++;
				while ($us = mysqli_fetch_array($usQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $us['username'];?></td>
						<td><?php echo $us['nama'];?></td>
						<td><?php echo $us['alamat'];?></td>
						<td><?php echo $us['foto'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=user_del&aksi=hapus&nmr=<?php echo $us['kd_user']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a>

						  <a href="?menu=user_edit&aksi=edit&nmr=<?php echo $us['kd_user']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="6" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=user&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>