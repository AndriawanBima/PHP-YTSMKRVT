<?php
$jumlahdata=$db->rowCOUNT("SELECT id FROM pelanggan");
$banyak=3;
$halaman=$ceil($jumlahdata/$banyak);
  $sql="SELECT * FROM pelanggan ORDER BY id ASC LIMIT $mulai,$banyak";
  $row=$db->getALL($sql);
  $no=1+$mulai;
  
?>

<h1>pelanggan</h1>
<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
           
            <th>pelanggan</th>
            <th>alamat</th>
            <th>telepon</th>
            <th>delete</th>
            <th>update</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($row as $r): ?>
        <tr>
            <?php 
            if($r['aktif'])==1{
                $status='aktif';
            } else{
                $status='tidak aktif';           
             }
            ?>
            <td><?php echo $r['pelanggan']?></td>
            <td><?php echo $r['alamat']?></td>
            <td><?php echo $r['telepon']?></td>
            <td><a href="href="?f=pelanggan&m=delete&id=<?php echo $r['id']?>">delete</td>
            <td><a href="href="?f=pelanggan&m=update&id=<?php echo $r['id']?>"><?php echo $status ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=pelanggan&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
?>
