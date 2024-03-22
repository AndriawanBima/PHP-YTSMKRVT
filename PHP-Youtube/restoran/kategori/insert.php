<h3>insert kategori</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">nama kategori</label>
            <input type="text" name="kategori" required placeholder="isi kategori" class="form-control">
        </div>
        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
</form>
</div>
<?php
 if(isset($_POST['simpan'])){
    $kategri=$_POST['kategori'];
    $sql="INSERT INTO barang VALUES ('','$kategori')";
    $db->runSQL($sql);
    header("location:?f=kategori&m=select");
 }
?>