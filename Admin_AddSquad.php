<?php
include("Header_Admin.php");
include("DBConnect.php")
?>

<style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
    <!-- <h4>GET IN TOUCH</h4>
    <p>Our goal is to provide the best customer service and to answer all of your questions in a timely manner.</p> -->
    <div class="form_section">
        <br />
        <br />
        <br />
        <br />
        <form class="contact-bottom">
            <center>

                <input class="field_custom" placeholder="Squad Name" type="text" required name="sqname" />
                <br />



                <input class="field_custom" placeholder="contact" type="text" required name="contact" maxlength="10" pattern="[7-9]{1}[0-9]{9}" title="please enter 10 numbers only" />
                <br />

                <input class="field_custom" placeholder="Password" type="text" required name="upass" />

                <div><input type="submit" class="button" value="REGISTER SQUAD" name="regbtn"></div>
                <br />
                <br />
                <br />
                <br />
                <!-- </div> -->
            </center>
        </form>
    </div>
</div>

<?php

if (isset($_REQUEST['regbtn'])) {

    $uname = $_REQUEST['sqname'];
    $ucontact = $_REQUEST['contact'];
    $upass = $_REQUEST['upass'];

    $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM `tb_squad` WHERE `sqcontact`='$ucontact'");

    $rs = mysqli_fetch_array($res);

    if ($rs['cnt'] > 0) {
        echo "<script>alert('Contact Already Exists')</script>";
        // echo "<script>window.location.href='customerRegistration.php';</script>";
    } else {
        mysqli_query($conn, "INSERT INTO `tb_squad` (`sqname`,`sqcontact`,`sqpass`) VALUES('$uname','$ucontact','$upass')");
        $QRY2 = "INSERT INTO `tb_login` (`reg_id`,`usertype`,`user_phone`,`user_pass`)values((SELECT max(`squad_id`) from `tb_squad`),'SQUAD','$ucontact','$upass')";

        // echo $QRY2;
        mysqli_query($conn, $QRY2);
        echo "<script>alert('REGISTRATION SUCCESSFULL')</script>";
        echo "<script>window.location.href='Admin_ViewSquad.php';</script>";
    }
}

?>
<?php
include("Footer.php");
?>