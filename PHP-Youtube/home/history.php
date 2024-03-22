<?php
$email=$_SESSION['email'];
$jumlahdata=$db->rowCOUNT("SELECT idorder FROM vorder WHERE email='$email' ");
$banyak=2;
$halaman=$ceil($jumlahdata/$banyak);
  $sql="SELECT * FROM vorder WHERE email='$email' ORDER BY tglorder DESC LIMIT $mulai,$banyak";
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
            <th>total</th>
            <th>detail</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)){ ?>
        <?php foreach($row as $r): ?>
        <tr>
           
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['total']?></td>
            <td><a href="?f=home&detail&id=<?php echo $r['idorder'] ?>">detail</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>
<?php
for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=home&m=history&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
?>
