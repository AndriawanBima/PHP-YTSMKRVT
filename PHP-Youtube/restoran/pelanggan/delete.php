<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM pelanggan WHERE id=$id";
    $db->runSQL($sql);
    header("location:?f=pelanggan&m=select");
  
?>