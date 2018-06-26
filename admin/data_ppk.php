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
          <i class="fa fa-table"></i> Daftar Kepala Bidang</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <a href="tambah_ppk.php"><button  name= "tambahdata" style="margin-left:20px;" class="btn btn-primary float-sm-left" type="submit"  value="ADD"><i class="fa fa-fw fa-user-circle"></i>&nbsp;<b>+</b></button></a>
              <br><br>
<?php
  include ('koneksi.php');
   $query=mysqli_query($con,"SELECT data_ppk.id,data_ppk.NIP,data_pns.nama,data_ppk.kode_bidang FROM data_ppk inner join data_pns on data_pns.NIP=data_ppk.NIP ");

// SELECT * FROM table1
// INNER JOIN table2
// ON table2.email = table1.email
// INNER JOIN table3
// ON table3.email = table2.email
?>

              <thead>
                <tr>
                  <th style="width:3px;">No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Bidang yang Dipimpin</th>
                  <th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $i=0;
              while($data = mysqli_fetch_array($query)){
              $i=$i+1;
              ?>
                <tr>
                  <td style="width:3px;"><?php echo $i;?></td>
                  <td><?php echo $data['NIP']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['kode_bidang']; ?></td>
                  <td><p>&nbsp;<a href="update_ppk.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-pencil-square-o"></i></a>&nbsp;&nbsp;<a href="delete_ppk.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a></p></td> 
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
    <?php include('footer_table.php');?>
  </div>
</body>

</html>
