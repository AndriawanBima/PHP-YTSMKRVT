<?php
  if(isset($_GET['total'])){
   $total=$_GET['total'];
   $idorder=idorder();
   $idpelanggan=$_SESSION['idpelanggan'];
   $tgl=date('Y-m-d');
  $sql="SELECT * FROM tbloder WHERE idorder=$idorder";
  $count =$db->rowCOUNT($sql);
  if($count==0){
    inserOrder($idorder,$idpelanggan,$tgl,$total);
    inserTOrderDetail($idorder);
  }else{
    insertOrderDetail($idorder);
  }
  kosongkanSession();
  header("location:?fhome&m=checkout");
  }else{
    info();
  }
  function idorder($sql){
    global $db;
    $sql="SELECT idorder FROM tblorder ORDER BY idorder DESC";
    $jumlah =$db->rowCOUNT($sql);
    if($jumlah==0){
        $idorder=1;
    }else{
        $item=$db->getITEM($sql);
        $id=$item['idorder']+1;
    }
    return $id;
  }
  function inserOrder($idorder, $idpelanggan, $tgl, $total){
    global $db;
    $sql="INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total,0,0,0)"
    echo $sql;
    $db->runSQL($sql);
  }
  function insertOrderDetail($idorder=1){
    global $db;
    foreach ($_SESSION as $key=> $value){
        id($key<> 'pelanggan' && $key<> 'idpelanggan' && $key<> 'user' && $key<> 'level' && $key<> 'iduser'){
           
          $id=substr($key,1);
            $sql="SELECT * FROM tblmenu WHERE id=$id";
            $row=$db->getALL($sql);
            foreach ($row as $r){
                $idmenu=$r['menu'];
                $harga=$r['harga'];
                $sql="INSERT INTO tblorderdetail VALUES ('',$idorder,$idmenu,$value,$harga)";
               $db->runSQL($sql);
            }
           
        }
    }
  }
  function kosongkanSession(){
    foreach ($_SESSION as $key=> $value){
        id($key<> 'pelanggan' && $key<> 'idpelanggan'){
            $id=substr($key,1);
            unset ($_SESSION['_'.$id]);
         
           
        }
    }
  }
?>