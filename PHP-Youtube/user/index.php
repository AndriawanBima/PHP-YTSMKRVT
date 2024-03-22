<?php
session_start();
  require_once "dbcontroller.php";
  $db=new DB;
  $sql="SELECT * FROM tblkategori ORDER BY kategori";
  $row=$db->getALL($sql);
  if(isset($_GET['log'])){
    session_destroy();
    header("location:index.php")
  }
   function cart(){
    global $db;
    $cart =0;
    foreach ($_SESSION as $key=> $value){
        id($key<> 'pelanggan' && $key<> 'idpelanggan' && $key<> 'user' && $key<> 'level' && $key<> 'iduser'){
            $id=substr($key,1);
            $sql="SELECT * FROM tblmenu WHERE id=$id";
            $row=$db->getALL($sql);
            foreach ($row as $r){
              $cart++;
            }
           
        }
    }
   return $cart;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOKO KU | aplikasi toko smk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
       <div class="row">
        <h2><a href="index.php">TOKO KU</a></h2>
        <div class="col-md-3">
            <h3>toko</h3>
        </div>
        <div class="col-md-9">
           
        <?php
        if(isset($_SESSION['pelanggan'])){
            echo '
            <div class="float-right mt-4"><a href="?log=logout">logout</div>
            <div class="float-right mt-4 mr-4">pelanggan : '.$_SESSION['pelanggan'].'</div>
            <div class="float-right mt-4 mr-4">cart ( :<a href="?f=home&m=beli"> '.cart().'</a>)</div>
            <div class="float-right mt-4 mr-4"><a href ="?f=home&m=history"></a>history</a></div>
            ';
            ';
        }else{
            echo '
            <div class="float-right mt-4 mr-4"><a href="?f=home&m=login">login</a></div>
            <div class="float-right mt-4 mr-4"><a href="?f=home&m=daftar">daftar</a></div>
            ';
        }
        ?>

        </div>
       </div>
       <div class="row mt-5">
        <div class="col-md-3">
            <h3>kategori</h3>
            <hr>
            <?php if(!empty($row)){ ?>
            <ul class="nav flex-column">
                
                <?php foreach($row as $r) : ?>
                <li class="nav-item"><a class="nav-link" href="?f=home&m=produk&id="<?php echo $r['idkategri']?>"><?php echo $r['kategori']?></a></li>
                <?php endforeach ?>
            </ul>
            <?php }  ?>
        </div>
        <div class="col-md-9">
            <?php
if (isset($_GET['f']) && isset($_GET['m'])){
    $f=$_GET['f'];
    $m=$_GET['m'];
    $file=$f.'/'.$m.'php';
    require_once $file;
}else{
    require_once "home/produk.php";
}
            ?>
        </div>
        <div class="col-md-9">
            <?php
            echo "<h1>DAFTAR BARANG</h1>"
            ?>
        </div>
       </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="text-center">2024 - copyright@bintangrahmad.com</p>
        </div>
    </div>
</body>
</html>