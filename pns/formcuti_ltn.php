<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_user']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>

  <?php
      include("koneksi.php");
      $tes=$_SESSION['NIP'];

      $cek=mysqli_query($con, "SELECT masa_kerja from data_pns where NIP='$tes'");
      $mk=mysqli_fetch_array($cek);

      if($mk<5){
        ?> 
            <body class="fixed-nav sticky-footer bg-dark" id="page-top">
          <!-- Navigation-->
          <?php include ('nav_user.php'); ?>
          <!-- end -->
           <div class="content-wrapper">
             <div class="container-fluid">

               <!-- Example DataTables Card-->
               <div class="card mb-3">
                 <div class="card-header">
                   <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Luar Tanggungan Negara</div>
                  <div class="card-body">
                    </div>
 
          <table>
          <td style="width:70px;"></td>
          <h3>&nbsp;&nbsp;&nbsp;Maaf, Masa Kerja Anda Belum Mencapai 5 Tahun</h3><br>
          <h3>&nbsp;&nbsp;&nbsp;<a href="cuti_ltn.php" class="btn btn-primary" style="width:100px;">Kembali</a></h3><br>
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
              <!-- Toggle Pengajuan Cuti -->
    
           <!-- END -->
    
          <!-- Logout Modal-->
        <?php include ('footer_table.php'); ?>
        </div>
      </body>
      </html>

      <?php
      }else{

      


      if (isset($_POST["tambahdataa"])){
     
      $x=$_POST['jenis_cuti'];
      $b=$_POST['tgl_pengajuan'];
      $c=$_POST['NIP_pengaju'];
      $d=$_POST['alasan_cuti'];
      $v=$_POST['gaji_pokok'];
      $e=$_POST['lama_cuti'];
      $f=$_POST['tgl_mulai'];
      $g=$_POST['tgl_selesai'];
      $hi=$_POST['alamat'];
      $h=$_POST['provinsi'];
      $i=$_POST['no_tlp'];

       $tambah=mysqli_query($con, "INSERT INTO cuti_ltn (jenis_cuti,tgl_pengajuan,NIP_pengaju,alasan_cuti,gaji_pokok,lama_cuti,tgl_mulai,tgl_selesai,alamat,provinsi,no_tlp) VALUES ('$x','$b','$c','$d','$v','$e','$f','$g','$hi','$h','$i')");

      if($tambah){ 
              header("location:cuti_ltn.php");
      }else
              echo "gagal";
      }
    ?>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_user.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Luar Tanggungan Negara</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>&nbsp;&nbsp;&nbsp;Buat Pengajuan Cuti Luar Tanggungan Negara</h3><br>
<form action="formcuti_ltn.php"  method="post">
<td>
  <input type="hidden" name="jenis_cuti" value="di Luar Tanggungan Negara" class="form-control" style="width:300px;">
  <!-- <input type="hidden" name="id_pengajuan" class="form-control" style="width:300px;"> -->
   <div class="form-group">
      <label >Tanggal Pengajuan :  </label>
      <input type="date" name="tgl_pengajuan" class="form-control" style="width:300px;">
    </div>        
    <div class="form-group">
      <!-- <label >NIP :  </label> -->
      <input type="hidden" name="NIP_pengaju" value="<?php echo $_SESSION['NIP']; ?>" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Alasan Cuti :</label>
      <input type="text" name="alasan_cuti" class="form-control" style="width:300px;">
    </div> 
    <div class="form-group"> 
      <label >Gaji Pokok:</label> 
      <input type="text"  name="gaji_pokok" class="form-control" style="width:300px;height;">
     </div>
    <div class="form-group"> 
      <label >Lama Cuti:</label> 
      <input type="text"  name="lama_cuti" class="form-control" style="width:300px;height;">
     </div>
    <div class="form-group">
    <label >Tanggal Mulai:</label>
      <input type="date" name="tgl_mulai" value="3" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
     <label >Tanggal Selesai:</label>
      <input type="date" name="tgl_selesai" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
     <label >Alamat selama menjalani cuti:</label>
      <input type="text" name="alamat" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
     <label >Provinsi:</label>
      <select name="provinsi" style="width=300px;" class="form-control" >
        <option value="Jawa Barat" selected="selected"><h1>Jawa Barat</h1></option>
        <option value="Jawa tengah" selected="selected"><h1>Jawa Tengah</h1></option>
    </select>
    </div>
    <div class="form-group">
     <label >Nomor Telepon:</label>
      <input type="text" name="no_tlp" class="form-control" style="width:300px;height;">
    </div>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdataa"class="btn btn-primary"><i class="fa fa-fw fa-plane"></i>&nbsp;Ajukan</button>
    <br><br>
  </td>
  </form>
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
        <!-- Toggle Pengajuan Cuti -->
    
    <!-- END -->
    
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>
<?php
}
?>
</html>
