<?php
  if(isset['id']){
    $id=$_GET['id'];
    $row=$db->getITEM("SELECT * FROM pelanggan WHERE id=$id");
    if($row['aktif']==0){
        $aktif=1;
    }else{
        $aktif=0;
    }
    $aktif=1;
    $sql= "UPDATE pelanggan SET aktif=$aktif WHERE id=$id";
    $db->runSQL($sql);
    header("location:?f=pelanggan&m=select");
  }
?>