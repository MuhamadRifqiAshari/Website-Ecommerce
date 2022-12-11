<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include("koneksi.php");

    ob_start();
    session_start();
    ob_end_clean();

    $password=$_POST["password"];

    $sql = "select password,role from login where password = '$password'";
    $query = mysqli_query($konek, $sql);

    $sql8 = "select count(*) jumlah from login where password = '$password'";
    $query8 = mysqli_query($konek, $sql8);

    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $ip = $_SERVER['REMOTE_ADDR'];
    if($ip == $ip)
    {
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
                $sql4 = "update login set ip = '$ip', mac = '$_HASIL', status = 'login', timelogin = now() where password = '$password'";
                $sql5 = "insert into absensi select a.id,b.nama,timelogin,'','' from login a,siswa b where password = '$password' and a.id = b.id";
                } else {
        $_PERINTAH = "arp -a $ip";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
        ob_clean();
        $_PECAH = strstr($_HASIL, $ip);
        $_PECAH_STRING = explode($ip, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
                $sql4 = "update login set ip = '$ip', mac = '$_HASIL', status = 'login', timelogin = now() where password = '$password'";
                $sql5 = "insert into absensi select a.id,b.nama,timelogin,'','' from login a,siswa b where password = '$password' and a.id = b.id";
               }

    while($values = mysqli_fetch_array($query)){

    if($password==$values[password] AND $values[role]=='Siswa')
    {
        $query4 = mysqli_query($konek, $sql4);
        $query5 = mysqli_query($konek, $sql5);
        //header("location:dataabsen.php");
        header("location:absenfotoupload.php");

    }
    else if($password==$values[password] AND $values[role]=='Guru')
    {
        $query4 = mysqli_query($konek, $sql4);
        header("location:add-payments.php");

    }
    else if($password==$values[password] AND $values[role]=='Admin')
    {
        $query4 = mysqli_query($konek, $sql4);
        header("location:add-payments.php");

    }
    else if($password==$values[password] AND $values[role]=='Wali Kelas')
    {
        $query4 = mysqli_query($konek, $sql4);
        header("location:add-payments.php");

    }
    else if($password==$values[password] AND $values[role]=='Owner')
    {
        $query4 = mysqli_query($konek, $sql4);
        header("location:add-payments.php");

    }
    else if($password==$values[password] AND $values[role]=='HeadTeller')
    {
        $query4 = mysqli_query($konek, $sql4);
        header("location:add-payments.php");

    }
    else if($password==$values[password] AND $values[role]=='Teller')
    {
        $query4 = mysqli_query($konek, $sql4);
        header("location:add-payments.php");

    }
    }

    while($values = mysqli_fetch_array($query8)){
    if($values[jumlah]==0)
        {
            echo '<script>alert("Maaf, password yang anda masukan salah atau tidak terdaftar!"); window.location.replace = \'http://localhost/ppmart_apps/admin/login.html\'; window.location.href = \'http://localhost/ppmart_apps/admin/login.html\';</script>';
        }
}
?>