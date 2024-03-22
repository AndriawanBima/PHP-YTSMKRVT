<?php
   $row=$db->getALL("SELECT * FROM barang ORDER BY kategori ASC");
 ?>  


<h3>insert pesan</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
          <label for="">kategori</label>
           <select name="id" id="">
            <?php foreach($row as $r) :?>
           <option value="<?php echo $row['id'] ?>"><?php echo $row['kategori'] ?></option>
           <?php endforeach?>
</select>
        </div>
        <div class="form-group w-50">
            <label for="">nama pesan</label>
            <input type="text" name="pesan" required placeholder="isi pesan" class="form-control">
        </div>
        <div class="form-group w-50">
           <label for="harga"></label>
           <input type="text" name="harga" number required placeholder="isi harga" class="form-control">
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
   $gambar=$_FILES['gambar']['name'];
   $temp=$_FILES['gambar']['tmpfile'];
   if(empty($gambar)){
    echo "<h3>empty image</h3>";
   } else{

    $sql="INSERT INTO barang VALUES ('',$id,'$pesan','$gambar',$harga)";}
    move_uploaded_file($temp,'../upload/',$gambar);
    $db->runSQL($sql);
    header("location:?f=pesan&m=select");
   }
 }
?>