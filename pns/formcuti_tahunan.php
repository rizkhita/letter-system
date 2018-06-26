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



  <?php
      include("koneksi.php");
      if (isset($_POST["tambahdata"])){
      $x=$_POST['jenis_cuti'];
      $b=$_POST['tgl_pengajuan'];
      $c=$_POST['NIP_pengaju'];
      $d=$_POST['alasan_cuti'];
      $e=$_POST['lama_cuti'];
      $f=$_POST['tgl_mulai'];
      $g=$_POST['tgl_selesai'];
      $hi=$_POST['alamat'];
      $h=$_POST['provinsi'];
      $i=$_POST['no_tlp'];

      $tambah=mysqli_query($con, "INSERT INTO cuti_tahunan (jenis_cuti,tgl_pengajuan,NIP_pengaju,alasan_cuti,lama_cuti,tgl_mulai,tgl_selesai,alamat,provinsi,no_tlp) VALUES ('$x','$b','$c','$d','$e','$f','$g','$hi','$h','$i')");

      if($tambah){ 
              header("location:cuti_tahunan.php");
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
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Tahunan</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>&nbsp;&nbsp;&nbsp;Buat Pengajuan Cuti Tahunan</h3><br>
<form action="formcuti_tahunan.php"  method="post">
<td>
  <input type="hidden" name="jenis_cuti" value="Tahunan" class="form-control" style="width:300px;">
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
      <label >Lama Cuti:</label>
      <input type="text" name="lama_cuti" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
    <label >Tanggal Mulai:</label>
      <input type="date" name="tgl_mulai" class="form-control" style="width:300px;height;">
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
      <select name="provinsi" class="form-control" style="width:300px;height;">
        <option value="Jawa Barat" selected="selected"><h1>Jawa Barat</h1></option>
        <option value="Jawa tengah" selected="selected"><h1>Jawa Tengah</h1></option>
    </select>
    </div>
    <div class="form-group">
     <label >Nomor Telepon:</label>
      <input type="text" name="no_tlp" class="form-control" style="width:300px;height;">
    </div>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary"><i class="fa fa-fw fa-plane"></i>&nbsp;Ajukan</button>
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
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>
