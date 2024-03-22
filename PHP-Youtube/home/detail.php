<?php
if(isset($_GET['idorder'])){
    $id=$_GET['idorder'];
}
$jumlahdata=$db->rowCOUNT("SELECT idorderdetail FROM vorderdetail WHERE email='$email' ");
$banyak=2;
$halaman=$ceil($jumlahdata/$banyak);
if(isset($_GET['p'])){
    $p=$_GET['p'];
    $mulai=($p * $banyak) - $banyak;
}else {
    $mulai=0;
}
  $sql="SELECT * FROM vorderdetail WHERE idorder=$id ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
  $row=$db->getALL($sql);
  $no=1+$mulai;
  
?>
<div class="float-left mr-4">
  <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">tambah data</a>
</div>
<h1>history</h1>
<table class="table table-bordered w-50">
    <thead>
        <tr>
           
            <th>tanggal</th>
            <th>menu</th>
            <th>harga</th>
            <th>harga</th>
            <th>jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)){ ?>
        <?php foreach($row as $r): ?>
        <tr>
           
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><?php echo $r['jumlah']?></td>
           
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>
<?php
for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=home&m=detail&id='.$r['idorder'].'&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
?>
