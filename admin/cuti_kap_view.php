<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_admin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_admin.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Sakit Karena Alasan Penting</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <br><br>
<?php
    include ('koneksi.php');
    $id=$_GET['id_pengajuan'];
  
    $query2=mysqli_query($con,"SELECT cuti_kap.id_pengajuan,cuti_kap.NIP_pengaju,data_pns.nama,cuti_kap.tgl_pengajuan,cuti_kap.lama_cuti,cuti_kap.tgl_mulai,cuti_kap.tgl_selesai,cuti_kap.sp_kabid,cuti_kap.sp_alasan from cuti_kap inner join data_pns on cuti_kap.NIP_pengaju=data_pns.NIP  where cuti_kap.id_pengajuan='$id'");

?>

             
                 
<?php while($data = mysqli_fetch_array($query2)){ ?>
<td style="width:70px;"></td>
<h3>Pengajuan CKAP Pegawai</h3>
<form>
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id_pengajuan']; ?>" type="hidden" name="id_ppk" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP: <?php echo $data['NIP_pengaju']; ?></label>
    </div>
    <div class="form-group">
      <label >Nama: <?php echo $data['nama']; ?></label>
    </div> 
    <div class="form-group">
      <label >Tanggal Pengajuan: <?php echo $data['tgl_pengajuan']; ?></label>
    </div> 
     <div class="form-group">
      <label >Lama Cuti: <?php echo $data['lama_cuti']; ?>&nbsp;hari kerja</label>
    </div> 
     <div class="form-group">
      <label >Tanggal Mulai: <?php echo $data['tgl_mulai']; ?></label>
    </div> 
     <div class="form-group">
      <label >Tanggal Selesai: <?php echo $data['tgl_selesai']; ?></label>
    </div> 
    <div class="form-group">
      <label>Status Persetujuan :</label> 
      <?php if(is_null($data['sp_kabid'])){
                        ?>
                        <div style="width:200px;" class="alert alert-danger">Belum Dikonfirmasi</div>                        

                      <?php }else{
                          ?>
                        <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_kabid']; ?></div>                        
                      <?php }?>
        <!-- <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_kabid']; ?></div>  -->
    </div>
    <?php if(is_null($data['sp_alasan'])){ ?>
    <?php }else{ ?>
       <div class="form-group">
         <label>Alasan :</label>
         <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_alasan']; ?></div>
       </div>
    <?php }?>

<!-- copy -->
        <?php  if($data['sp_kabid']=='disetujui'){   ?>
                      <br>
                      <div class="alert alert-success" style="width:200px;" ><a href="print_keputusan.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" ><i class="fa fa-fw fa-print"></i>&nbsp;<b>Cetak Surat Keputusan</b></a></div>
                    <?php } else { ?>
                   
                    <?php }?>
        <?php
        }
        ?>
<!--  -->

  <br>
</td>

  </form>
  </table>             
    </div>
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
