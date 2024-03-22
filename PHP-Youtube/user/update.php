<?php
  if(isset['id']){
    $id=$_GET['id'];
    $row=$db->getITEM("SELECT * FROM user WHERE id=$id");
    if($row['aktif']==0){
        $aktif=1;
    }else{
        $aktif=0;
    }
    $aktif=1;
    $sql= "UPDATE user SET aktif=$aktif WHERE id=$id";
    $db->runSQL($sql);
    header("location:?f=user&m=select");
  }
?>