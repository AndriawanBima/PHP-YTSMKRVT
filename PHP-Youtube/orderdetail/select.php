<h3>detail pembelian</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">tanggal awal</label>
            <input type="date" name="tawal" required  class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">tanggal akhir</label>
            <input type="date" name="takhir" required  class="form-control">
        </div>
        <div>
            <input type="submit" name="simpan" value="cari" class="btn btn-primary">
        </div>
</form>
</div>
<?php
  
$jumlahdata=$db->rowCOUNT("SELECT idorderdetail FROM vorderdetail ");
$banyak=2;
$halaman=$ceil($jumlahdata/$banyak);
  $sql="SELECT * FROM vorderdetail ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
  if(isset($_POST['simpan'])){
    $tawal=$_POST['tawal'];
    $takhir=$_POST['takhir'];
    $sql="SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$takhir'";
    echo $sql;
   }
  $row=$db->getALL($sql);
  $no=1+$mulai;
  $total=0;
?>
<div class="float-left mr-4">
  <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">tambah data</a>
</div>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>pelanggan</th>
            <th>tanggal</th>
            <th>menu</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>total</th>
           
            <th>alamat</th>
           
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)){ ?>
        <?php foreach($row as $r): ?>
         
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['pelanggan']?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><?php echo $r['jumlah']?></td>
            <td><?php echo $r['jumlah'] * $r['harga']?></td>
            <td><?php echo $r['alamat']?></td>
          
          <?php
             $total=$total+( $r['jumlah'] * $r['harga']);
          ?>
        </tr>
        <tr>
          <td colspan="6"><h3>grand total</h3></td>
         <td><h4><?php echo $total ?></h4></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>
<?php
for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=order&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
?>
