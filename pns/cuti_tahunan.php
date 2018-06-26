<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_pns']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_user.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">
<?php
    include ('koneksi.php');
    $ambil=mysqli_query($con,"SELECT jatah_tahunan from data_pns where NIP = '$tes' ");
    $angka = mysqli_fetch_array($ambil);
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Riwayat Pengajuan Cuti Sakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php  if($angka['jatah_tahunan'] <= 0){ ?>
              <div class="text-left alert alert-danger">
              &nbsp;&nbsp;&nbsp;Sisa cuti tahunan anda sudah habis, anda tidak dapat mengajukan cuti kembali.
              </div>
              <?php } else{  ?>
              <div class="text-left alert alert-success">
              &nbsp;&nbsp;&nbsp;Sisa cuti tahunan anda terisisa <strong><?php echo $angka['jatah_tahunan']; ?></strong>&nbsp;hari lagi.
              </div>
              <a href="formcuti_tahunan.php"><button  name= "tambahdata"  class="btn btn-primary float-sm-left" type="submit"  value="ADD"><i class="fa fa-fw fa-plane"></i>&nbsp;Buat Surat</button></a>
              <br><br>
            <?php } ?>
              <br>
<?php
    include ('koneksi.php');

    $tes=$_SESSION['NIP'];
    $query=mysqli_query($con,"SELECT data_pns.NIP,cuti_tahunan.id_pengajuan,data_pns.nama,cuti_tahunan.NIP_pengaju,cuti_tahunan.tgl_pengajuan,cuti_tahunan.alasan_cuti,cuti_tahunan.lama_cuti,cuti_tahunan.tgl_mulai,cuti_tahunan.tgl_selesai,cuti_tahunan.provinsi,cuti_tahunan.no_tlp,cuti_tahunan.sp_kabid FROM cuti_tahunan inner join data_pns on cuti_tahunan.NIP_pengaju=data_pns.NIP where NIP_pengaju='$tes' ");
 ?> 
      
     
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Lama Cuti</th> 
                  <th>Status Persetujuan KABID </th>
                  <th>Lihat Detail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i=0;
               while($data = mysqli_fetch_array($query)){
              // http://achmatim.net/2010/01/18/perintah-mysql-untuk-menampilkan-data-dari-beberapa-tabel/
              $i=$i+1;
              ?>
                <tr>
                  <td><?php echo $i;?> </td>
                  <td><?php echo $data['tgl_pengajuan'];?></td>
                  <td><?php echo $data['lama_cuti']; ?>&nbsp;hari kerja</td> 
                   <td><?php if(is_null($data['sp_kabid'])){
                        ?>
                        <div class="alert alert-danger"><i class="fa fa-clock-o"></i>&nbsp;Belum Dikonfirmasi</div>                        

                      <?php }else{
                          ?>
                        <div class="alert alert-primary"><i class="fa fa-check"></i>&nbsp;<?php echo $data['sp_kabid'];?></div>                        
                      <?php }?>
                  </td>
                  <td><p>&nbsp;<a href="cuti_tahunan_view.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;<!-- <a href="akun_delete_pns.php?id_pns=<?php echo $data['id_pns']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a> --></p></td> 
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Dinas Komunikasi dan Informatika Provinsi Jawa Barat</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>
