<?php ob_start();


?>
<html>
<head>
  <title>Cetak PDF</title>   
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px;}
   table td {word-wrap:break-word;width: 20%;}
   </style>
</head>
<body>

<!-- <p><img style="margin-left:15px;width:100px;height:auto;" src=""><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AL MUHTAR CLINICAL LABORATORY</b></p> -->
<h5 style="text-align:center;">Alamat : Jl. Tamansari No.55, Bandung, Jawa Barat (xxxx).<br>Telp/Fax : (022) 594xxxx. Email : kikirizkhita@gmail.com</h5>
Penanggung Jawab : Administrator
<hr width="100%" color="black" align="center">
<br>
<?php

include_once ('koneksi.php');
 
$id_pengajuan = $_GET['id_pengajuan'];

$query =mysqli_query( $con,"SELECT NIP_pengaju,jenis_cuti,alasan_cuti,lama_cuti,tgl_mulai,tgl_selesai,alamat,provinsi,no_tlp,sp_dinas,sp_alasan1,sp_bkd,sp_alasan2 FROM cuti_lahir  WHERE  id_pengajuan='$id_pengajuan'  ");
$data= mysqli_fetch_array($query);

$NIP=$data['NIP_pengaju'];

$query2=mysqli_query($con, "SELECT data_pns.nama,data_pns.jabatan_eselon,anggota_bidang.kode_bidang,data_pns.masa_kerja FROM data_pns inner join anggota_bidang on anggota_bidang.NIP=data_pns.NIP  WHERE  data_pns.NIP='$NIP'  ");
$data2= mysqli_fetch_array($query2);

$bagian=$data2['kode_bidang'];

$ambil=mysqli_query($con,"SELECT nama from bidang where kode_bidang='$bagian'");
$data3=mysqli_fetch_array($ambil);

$ppk=mysqli_query($con,"SELECT NIP from data_kadin where posisi='kepala'");
$data4=mysqli_fetch_array($ppk);

$nip_ppk=$data4['NIP'];

$nama_ppk=mysqli_query($con,"SELECT nama from data_pns where NIP='$nip_ppk'");
$data5=mysqli_fetch_array($nama_ppk);


//DATA PEGAWAI
echo "<div style='margin-left:20px;'><h4><b>I. DATA PEGAWAI</b></h4></div>";

echo "<table style='width:80%;margin-left:40px;'>";
echo "<tr>";
echo "<td>Nama</td><td>:&nbsp;" .$data2['nama']."</td>";
echo "<td></td>";
echo "<td>NIP</td><td>:&nbsp;" .$data['NIP_pengaju']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Jabatan</td><td>:&nbsp;" .$data2['jabatan_eselon']."</td>";
echo "<td>";echo "</td>";
echo "<td>Masa Kerja</td><td>:&nbsp;" .$data2['masa_kerja']."&nbsp;tahun</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Unit Kerja</td><td>:&nbsp;" .$data3['nama']."</td>";
echo "<td></td>";
echo "<td>";echo "</td>";echo "<td>";echo "</td>";
echo "</tr>";
echo "</table>";

//JENIS CUTI
echo "<div style='margin-left:20px;'><h4><b>II. JENIS CUTI</b></h4></div>";
echo "<table style='width:100%;margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td>" .$data['jenis_cuti']."</td>";
echo "</tr>";
echo "</table>";

//ALASAN CUTI
echo "<div style='margin-left:20px;'><h4><b>III. ALASAN CUTI</b></h4></div>";
echo "<table style='width:100%;margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:500px;>" .$data['alasan_cuti']."</td>";
echo "</tr>";
echo "</table>";

//LAMA CUTI
echo "<div style='margin-left:20px;'><h4><b>IV. LAMA CUTI</b></h4></div>";
echo "<table style='margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:400px;'>Selama <b>".$data['lama_cuti']."</b>&nbsp;hari. Mulai tanggal <b>".$data['tgl_mulai']."</b> (s/d) <b>&nbsp;".$data['tgl_selesai'].".</b></td>";
echo "</tr>";
echo "</table>";

//ALAMAT SELAMA MENJALANKAN CUTI
echo "<div style='margin-left:20px;'><h4><b>V. ALAMAT SELAMA MENJALANKAN CUTI</b></h4></div>";
echo "<table style='width:700%;margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:500px;>" .$data['alamat']."&nbsp;-&nbsp;Provinsi&nbsp;" .$data['provinsi']."<br></td>";
echo "</tr><tr>";
echo "<td style='width:500px;><br><b>TELP</b>&nbsp;:&nbsp;" .$data['no_tlp']."</td>";
echo "</tr>";
echo "</table>";

//HORMAT SAYA
echo "<div style='margin-left:500px;'><h4><b>Hormat saya,</b></h4><br></div>";
echo "<table style='width:300%;margin-left:500px;'>";
echo "<tr>";
echo "<td style='width:500px;><br>(" .$data2['nama'].")</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><br><b>NIP</b>&nbsp;:&nbsp;" .$data['NIP_pengaju']."</td>";
echo "</tr>";
echo "</table>";

//PERTIMBANGAN ATASAN LANGSUNG
echo "<div style='margin-left:20px;'><h4><b>VI. PERTIMBANGAN ATASAN LANGSUNG</b></h4></div>";
echo "<table style='width:700%;margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:500px;><b>Status Pengajuan Cuti :&nbsp;</b>" .$data['sp_dinas']."</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><br><b>Alasan :&nbsp;</b>" .$data['sp_alasan1']."</td>";
echo "</tr>";
echo "</table>";

//TTD PPK 1
echo "<div style='margin-left:500px;'><h4><b>TTD ATASAN</b></h4><br></div>";
echo "<table style='width:300%;margin-left:500px;'>";
echo "<tr>";
echo "<td style='width:500px;><br>(" .$data5['nama'].")</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><b>NIP</b>&nbsp;:&nbsp;" .$data4['NIP']."</td>";
echo "</tr>";
echo "</table>";

//KEPUTUSAN PEJABAT
echo "<div style='margin-left:20px;'><h4><b>VII. KEPUTUSAN PEJABAT YANG MEMBERIKAN CUTI </b></h4></div>";
echo "<table style='width:700%;margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:500px;><b>Status Pengajuan Cuti :&nbsp;</b>" .$data['sp_bkd']."</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><br><b>Alasan :&nbsp;</b>" .$data['sp_alasan2']."</td>";
echo "</tr>";
echo "</table>";

//TTD PPK 2
echo "<div style='margin-left:500px;'><h4><b>TTD PPK</b></h4><br></div>";
echo "<table style='width:300%;margin-left:500px;'>";
echo "<tr>";
echo "<td style='width:500px;><br>(Nama : .................................)</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><b>NIP</b>NIP : .................................</td>";
echo "</tr>";
echo "</table>";

?>

<?php

$html = ob_get_contents();
ob_end_clean();

require_once('../html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');

$pdf->WriteHTML($html);
$pdf->Output('Pengajuan Cuti.pdf', 'D');
?>