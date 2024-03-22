<?php
$jumlahdata=$db->rowCOUNT("SELECT id FROM barang");
$banyak=3;
$halaman=$ceil($jumlahdata/$banyak);
  $sql="SELECT * FROM barang ORDER BY id ASC LIMIT $mulai,$banyak";
  $row=$db->getALL($sql);
  $no=1+$mulai;
  
?>
<div class="float-left mr-4">
  <a class="btn btn-primary" href="?f=user&m=insert" role="button">tambah data</a>
</div>
<h1>user</h1>
<table class="table table-bordered w-50">
    <thead>
        <tr>
           
            <th>user</th>
            <th>email</th>
            <th>level</th>
            <th>delete</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($row as $r): ?>
            <?php
            if($r['aktif']==1){
                $status="AKTIF";
            } else {
                $status="BANNED";
            }
            ?>
        <tr>
           
            <td><?php echo $r['user']?></td>
            <td><?php echo $r['email']?></td>
            <td><?php echo $r['level']?></td>
            <td><a href="href="?f=user&m=delete&id=<?php echo $r['id']?>">delete</td>
            <td><a href="href="?f=user&m=status&id=<?php echo $r['id']?>"><?php echo $status; ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=user&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
?>
