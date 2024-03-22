<div style="margin :auto; width:900px;">
<h3><a href="http://localhost/PHPSMKREVIT/PHPSMKREVIT/toko/kategori/insert.php">tambah data</a></h3>
<?php
require_once "../function.php";

if(isset($_GET['update'])){
    $id=$_GET['update'];
   require_once "update.php";
}
if (isset($_GET['hapus'])) {
    $id=$_GET['hapus'];
   require_once "delete.php";
}
$sql="SELECT id FROM barang ";
$result=mysqli_query($koneksi,$sql);
$jumlahdata=mysqli_num_rows($result);

$banyak=3;
$halaman=ceil($jumlahdata/$banyak);
for ($i=1; $i <=$halaman ; $i++) { 
   echo '<a href="?p='.$i.'">'.$i.'</a>';
   echo '&nbsp &nbsp &nbsp';
}
echo '<br> <br>';
if(isset($_GET['p'])){
    $p=$_GET['p'];
    $mulai=($p*$banyak)-$banyak;
}else{
    $mulai=3;
}
$sql="SELECT *  FROM barang LIMIT $mulai,$banyak";
$result=mysqli_query($koneksi,$sql);
// var_dump($result);
$jumlah = mysqli_num_rows($result);
// echo '<br>';
// echo $jumlah;
echo '
<table border="3px">
<tr>
   <th>no</th>
   <th>kategori</th>
   <th>hapus</th>
   <th>ubah</th>
</tr>
';
$no=$mulai;
if($jumlah>0){
    while($row=mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['barang'].'</td>';
        echo '<td><a href="?hapus='.$row['id'].'">'.'hapus'.'</a></td>';
        echo '<td><a href="?ubah='.$row['id'].'">'.'ubah'.'</a></td>';
        echo '</tr>';
    }
}
echo '</table>';
?>

  
</div>
