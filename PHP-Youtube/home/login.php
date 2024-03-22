<div class="row">
            <div class="col-4 mx-auto">

            </div>
            <div class="form-group">
                <form action="" method="post">
                    <div>
                        <h3>LOGIN PELANGGAN</h3>
                    </div>
                    <div class="form-group">
                        <label for="">GMAIL</label>
                        <input type="email" name="email" require class="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="email" name="password" require class="password" class="form-control">>

                    </div>
                    <div>
                        <input type="submit" name="simpan" value="login" class="btn btn-primary>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php
if(isset($_POST['login']){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
    $count=$db->rowCOUNT($sql);
    if($count== 0){
        echo "<center><h3>EMAIL ATAU PASSWORD SALAH</h3></center>";
    }else {
        $sql="SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password'";
        $row=$db->getITEM($sql);
        $_SESSION['pelanggan']=$row['email'];

        $_SESSION['idpelanggan']=$row['idpelanggan'];
        header("location:index.php");
    }
    
})
?>