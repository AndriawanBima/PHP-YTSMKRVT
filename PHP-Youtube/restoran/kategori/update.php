<?php
if(isset($_GET['id'])){
     $id=$_GET['id'];
     $sql="SELECT * FROM barang WHERE id=$id";
    $row=$db->getITEM($sql);
}
?><h3>update kategori</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">nama kategori</label>
            <input type="text" name="kategori" required value="i<?php echo $row['kategori']?>"class="form-control">
        </div>
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>
<?php
 if(isset($_POST['simpan'])){
    $kategri=$_POST['kategori'];
    $sql="UPDATE barang SET kategori='$kategori' WHERE id=$id";
    // $db->runSQL($sql);
    // header("location:?f=kategori&m=select");
 }
?>