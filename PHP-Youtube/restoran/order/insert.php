<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="SELECT * FROM barang WHERE id=$id";
  $item=$db->getITEM($sql);
  $id=$item['id'];
 
 
 
}
   $row=$db->getALL("SELECT * FROM barang ORDER BY kategori ASC");
 ?>  

<h1>insert pesan</h1>
<h3>insert pesan</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
          <label for="">kategori</label>
           <select name="id" id="">
            <?php foreach($row as $r) :?>
           <option <?php if($id==$r['id']) echo "selected"?> value="<?php echo $row['id'] ?>"><?php echo $row['kategori'] ?></option>
           <?php endforeach?>
</select>
        </div>
        <div class="form-group w-50">
            <label for="">nama pesan</label>
            <input type="text" name="pesan" required value="<?php echo %item['menu'] ?>" class="form-control">
        </div>
        <div class="form-group w-50">
           <label for="harga"></label>
           <input type="text" name="harga" number required value="<?php echo $item['harga'] ?>" class="form-control">
        </div>
        <div class="form-group w-50">
             <label for="gambar"></label>
             <input type="file" name="gambar">
        </div>
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
</form>
</div>
<?php
 if(isset($_POST['simpan'])){
   $id=$_POST['id'];
   $pesan=$_POST['pesan'];
   $harga=$_POST['harga'];
   $gambar=$['gambar'];
  //  $gambar=$_FILES['gambar']['name'];
   $temp=$_FILES['gambar']['tmpfile'];
   if(!empty($temp)){
    $gambar=$_FILES['gambar']['name'];
    move_uploaded_file($temp,'../upload/',$gambar);
   }
   $sql="UPDATE barang SET id=$id, pesan='pesan',
   gambar='$gambar', harga=$harga WHERE id=$id";
     $db->runSQL($sql);
     header("location:?f=pesan&m=select");
  
 }
?>