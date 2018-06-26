<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_ppk']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php
include ('nav_ppk.php');
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- kotak profil -->
      <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
           <ol class="breadcrumb">

     <?php
     include ('koneksi.php');
     $tes= $_SESSION['NIP'];
   
     $query=mysqli_query($con,"SELECT * from data_pns where NIP ='$tes' ");
     $data=mysqli_fetch_array($query);
     ?>
     NAMA : <?php echo $data['nama'];?>
     NAMA : <?php echo $data['nama'];?>
     NAMA : <?php echo $data['nama'];?>
     BELUM
     <br>
          </ol>
        </div>
        </div>
     </div>
    <!-- end -->
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

