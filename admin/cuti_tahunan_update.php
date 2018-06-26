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

  <?php
      include("koneksi.php");
      if (isset($_POST["updatedata"])){
      $id=$_GET['id_pengajuan'];
      $x=$_POST['jenis_cuti'];
      // $a=$_POST['id_pengajuan'];
      $b=$_POST['tgl_pengajuan'];
      $c=$_POST['NIP_pengaju'];
      $d=$_POST['alasan_cuti'];
      $e=$_POST['lama_cuti'];
      $f=$_POST['tgl_mulai'];
      $g=$_POST['tgl_selesai'];
      $h0=$_POST['alamat'];
      $h=$_POST['provinsi'];
      $i=$_POST['no_tlp'];
      $j=$_POST['sp_kabid'];
      $k=$_POST['sp_alasan'];

     
      $edited=mysqli_query($con, "UPDATE cuti_tahunan set jenis_cuti='$x',tgl_pengajuan='$b',NIP_pengaju='$c',alasan_cuti='$d',lama_cuti='$e',tgl_mulai='$f',tgl_selesai='$g',alamat='$h0',provinsi='$h',no_tlp='$i',sp_kabid='$j',sp_alasan='$k' where id_pengajuan='$id'");

      if($edited){ 
              header("location:cuti_tahunan.php");
      }else
              echo "gagal";
      }
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
          <i class="fa fa-table"></i>Pengajuan Cuti Tahunan</div>
        <div class="card-body">
          </div>

 <?php
         
          include ("koneksi.php");

          $id = $_GET['id_pengajuan'];

          $sql = mysqli_query($con, "SELECT * FROM cuti_tahunan WHERE id_pengajuan = '$id'");
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>&nbsp;&nbsp;&nbsp;Pengajuan Cuti Sakit Tahunan</h3><br>
<form action="cuti_tahunan_update.php?id_pengajuan=<?php echo $id;?>" name="updatedata" method="post">
<td>
  <input type="hidden" name="jenis_cuti" value="Sakit" class="form-control" style="width:300px;">
  <input type="hidden" name="id_pengajuan" value="<?php echo $data['id_pengajuan'];?>" class="form-control" style="width:300px;"> 
   <div class="form-group">
      <label >Tanggal Pengajuan :  </label>
      <input type="date" value="<?php echo $data['tgl_pengajuan'];?>"name="tgl_pengajuan" class="form-control" style="width:300px;">
    </div>        
    <div class="form-group">
      <label >NIP :  </label>
      <input type="text" value="<?php echo $data['NIP_pengaju'];?>" name="NIP_pengaju" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Alasan Cuti :</label>
      <input type="text" value="<?php echo $data['alasan_cuti'];?>" name="alasan_cuti" class="form-control" style="width:300px;">
    </div> 
    <div class="form-group">
      <label >Lama Cuti:</label>
      <input type="text" value="<?php  echo $data['lama_cuti'];?>" name="lama_cuti" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
    <label >Tanggal Mulai:</label>
      <input type="date" value="<?php echo $data['tgl_mulai'];?>" name="tgl_mulai" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
     <label >Tanggal Selesai:</label>
      <input type="date" value="<?php echo $data['tgl_selesai'];?>" name="tgl_selesai" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
     <label >Alamat selama menjalani cuti:</label>
      <input type="text" value="<?php echo $data['alamat'];?>" name="alamat" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
     <label >Provinsi:</label>
      <select name="provinsi" style="width:300px;" class="form-control" >
        
        <option value="Jawa Barat"  <?php if($data['provinsi'] == 'Jawa Barat'){ echo 'selected'; } ?>><h1>Jawa Barat</h1></option>
        <option value="Jawa Tengah"  <?php if($data['provinsi'] == 'Jawa Tengah'){ echo 'selected'; } ?>><h1>Jawa Tengah</h1></option></select>
    </div>
    <div class="form-group">
     <label >Nomor Telepon:</label>
      <input type="text" value="<?php echo $data['no_tlp'];?>" name="no_tlp" class="form-control" style="width:300px;height;">
    </div>
     <div class="form-group">
      <label>Status Persetujuan : </label>
      <select  name="sp_kabid" style="width:230px;" class="form-control">
        <option>----Pilih Status Persetujuan----</option>
        <option class="alert alert-success" value="disetujui" <?php if($data['sp_kabid'] == 'disetujui'){ echo 'selected'; } ?>>Disetujui</option>
        <option class="alert alert-info" value="ditangguhkan" <?php if($data['sp_kabid'] == 'ditangguhkan'){ echo 'selected'; } ?>>Ditangguhkan</option>
        <option class="alert alert-warning" value="perubahan" <?php if($data['sp_kabid'] == 'perubahan'){ echo 'selected'; } ?>>Perubahan</option>
        <option class="alert alert-danger" value="tidak disetujui" <?php if($data['sp_kabid'] == 'tidak disetujui'){ echo 'selected'; } ?>>Tidak Disetujui</option>
    </select>
    </div>
    <div class="form-group">
      <label>Alasan :</label>
      <input value="<?php echo $data['sp_alasan']; ?>" name="sp_alasan" class="form-control"  type="text" style="width:300px;" >
    </div>

    <?php } ?>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-success"><i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Edit</button>
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
