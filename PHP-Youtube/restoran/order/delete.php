<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM barang WHERE id=$id";
    $db->runSQL($sql);
    header("location:?f=barang&m=select");
  
?>