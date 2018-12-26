<?php 

include "../library/koneksi.php";
include "fungsi.php";
include_once("tglindo.php");
?>
<?php 


$tgl=date('Y-m-d');
$tglorder=$_POST['tanggal'];
$sql=mysqli_query($koneksi,"SELECT * from kas
where tgl like '$_POST[tanggal]%' and jenis='Keluar' order by kode asc") or die
(mysqli_error());
?>
    

<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<body onLoad="javascript:print()">   
                            <table width="100%">
							<tr>
							<td><div align="center">
							  <h4 align="center" class="style1">Laporan Kas Keluar Kotak Pena </h4></td>
							</tr>
							</table>
                        </div>
						<form name="sda" role="form" method="post">
                        <div class="panel-body">
						 <div class="col-lg-12">
                        	<div class="row">
						
										   <div class="dataTable_wrapper">
                                <table width="100%" border="1" class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th bgcolor="#CCCCCC">No</th>
											<th bgcolor="#CCCCCC">Tanggal</th>
                                            <th bgcolor="#CCCCCC">Keterangan</th>
											
											<th bgcolor="#CCCCCC">Jumlah</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no1=1;
										$total=0;
										
										while($data=mysqli_fetch_array($sql)){
										?>	
			   
										<tr>
											<td ><?php echo $no1; ?></td>
											<td><?php echo TanggalIndo($data['tgl']);?></td>
											 <td><?php echo $data['keterangan']; ?></td>
											 <td><?php echo  "Rp.".number_format($data['keluar']).",-" ?></td>
											
										</tr>
										<?php
											$no1++;
											$total=$total+$data['keluar'];
										}
										?>
										<Tr>

										<th colspan="3">Total Keseluruhaan</th>
										
										<Td>Rp.<?php echo number_format($total) ; ?>,-</td>
										
										</tr>
                                    </tbody>
                                </table>
                            </div>
							</div>
						  </div>
						
							 
						
</form>
							
                            <!-- /.row (nested) -->
