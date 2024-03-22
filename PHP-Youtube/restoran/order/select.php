<div class="float-left mr-4">
  <a class="btn btn-primary" href="?f=menu&m=insert" role="button">tambah data</a>
</div>
<h1>menu</h1>
<?php
   if(isset($_POST['opsi'])){
    $opsi=$_POST['opsi'];
    $where =" WHERE id= $opsi";
   
   } else{
    $opsi=0;
    $where="";
   }
?>
<div class="mt-4 mb-4">
<?php
$row=$db->getALL("SELECT * FROM barang ORDER BY kategori ASC");
   
?>
  <form action="" method="post">
    <select name="opsi" id="" onchange="this.form.submit()">
    <?php foreach($row as $r): ?>
        <option <?php if($r['id']==$opsi)echo "selected"; ?> value="<?php echo $r['id']?>"><?php echo $r['kategori']?></option>
    </select>
  </form>
</div>
<?php
$jumlahdata=$db->rowCOUNT("SELECT id FROM barang $where");
$banyak=3;
$halaman=$ceil($jumlahdata/$banyak);
  $sql="SELECT * FROM barang $where ORDER BY id ASC LIMIT $mulai,$banyak";
  $row=$db->getALL($sql);
  $no=1+$mulai;
  
?>

<table class="table table-bordered w-80">
    <thead>
        <tr>
           
            <th>menu</th>
            <th>harga</th>
            <th>gambar</th>
            <th>delete</th>
            <th>update</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)){?>
        <?php foreach($row as $r): ?>
        <tr>
           
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><img style="width:80px;" src="../upload/<?php echo $r['gambar']?>" alt=""></td>
            <td><a href="href="?f=menu&m=delete&id=<?php echo $r['id']?>">delete</td>
            <td><a href="href="?f=menu&m=update&id=<?php echo $r['id']?>">update</td>
        </tr>
        <?php endforeach ?>
        <?php }?>
    </tbody>
</table>
<?php
for ($i=1; $i <=$halaman ; $i++) { 
    echo '<a href="?f=menu&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
?>
