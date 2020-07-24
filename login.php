<?php
session_start();
include("Header.php");
include("DBConnect.php")
?>
<center>
    <div class="contact-bottom" weight="800px">
        <form>
            <input type="text" name="phone" placeholder="Phone">
            <input type="text" name="pass" placeholder="Password">
            <input type="submit" name="loginbtn" value="Log In">
        </form>
    </div>
</center>

<?php

if (isset($_REQUEST['loginbtn'])) {

    $phone = $_REQUEST['phone'];
    $upass = $_REQUEST['pass'];


    $res = mysqli_query($conn, "SELECT count(*) as cnt,`usertype`,`reg_id`  from `tb_login` where `user_phone`='$phone' and `user_pass`='$upass'");

    $rs = mysqli_fetch_array($res);

    $_SESSION['userphone'] = $phone;
    $_SESSION['usertype'] = $rs["usertype"];

    $_SESSION['reg_id'] = $rs["reg_id"];


    if ($rs['cnt'] > 0 && $rs["usertype"] == "SQUAD") {
        echo "<script>alert('LOGIN SUCCESS')</script>";
        echo "<script>window.location.href='SquadHome.php';</script>";
    }
    if ($rs['cnt'] > 0 && $rs["usertype"] == "ADMIN") {
        echo "<script>alert('LOGIN SUCCESS')</script>";
        echo "<script>window.location.href='AdminHome.php';</script>";
    }
    if ($rs['cnt'] > 0 && $rs["usertype"] == "PUBLIC") {
        echo "<script>alert('LOGIN SUCCESS')</script>";
        echo "<script>window.location.href='PublicHome.php';</script>";
    }
    if ($rs['cnt'] <= 0) {
        echo "<script>alert('Login Failed')</script>";

        echo "<script>window.location.href='login.php';</script>";
    }
}

?>
<?php
include("Footer.php");

?>