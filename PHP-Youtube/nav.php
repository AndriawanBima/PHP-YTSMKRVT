<nav>
    <ul>
        <li> <a href="kontak"></a>Kontak</li>
        <li> <a href="sejarah"></a>Sejarah</li>
        <li> <a href="jurusan"></a>Jurusan</li>
    </ul>
</nav>

<?php

    if (isset ($_GET['menu'])) {

        $menu = $_GET ['menu'];

        require_once $menu.'.php';
    }
   
?>