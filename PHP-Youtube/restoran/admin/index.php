<?php
session_start();
  require_once "../dbcontroller.php";
  $db=new DB;
  if (!isset($session['user'])){
    header("location:login.php");
  }
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin page | aplikasi toko smk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
       <div class="row">
        <div class="col-md-3">
           <a href="index.php"> <h3>toko</h3></a>
        </div>
        <div class="col-md-9">
             <div class="float-right mt-4"><a href="?log=logout">logout</a></div>
             <div class="float-right mt-4 mr-4">user : <a href ="?f=user&m=updateuser&id"> <?php echo $_SESSION['iduser'] ?></a></div>
             <div class="float-right mt-4" mr-4>LEVEL : <?php echo $_SESSION['level'] ?></div>
             <?php var_dump($_SESSION); ?>
        </div>
       </div>
       <div class="row mt-5">
        <div class="col-md-3">
            <ul class="nav flex-column">
                <?php
                $level=$_SESSION['level'];
            
                switch ($level){
                    case 'admin':
                   echo '
                    <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select">kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=order&m=select">order</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">orderdetail</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=user&m=select">user</a></li>
                   
                    ';
                    break;
                    case 'kasir' :
                          echo '
                          <li class="nav-item"><a class="nav-link" href="?f=order&m=select">order</a></li>
                          <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">orderdetail</a></li>
                          ';
                          break;
                          echo 'koki' ;
                          echo '
                        
                          <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">orderdetail</a></li>
                          ';
                          break
                    }
                    default:
                          echo 'tidak ada menu';
                    break;
                }
                
            </ul>
        </div>
        <div class= <"col-md-9">
            <?php
if (isset($_GET['f']) && isset($_GET['m'])){
    $f=$_GET['f'];
    $m=$_GET['m'];
    $file='../'.$f.'/'.$m.'.php';
    require_once $file;
}
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